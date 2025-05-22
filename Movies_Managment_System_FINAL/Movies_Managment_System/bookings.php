<?php 
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['is_admin'])) {
    header("Location: login.php");
    exit();
}

include_once('config.php');

$user_id = $_SESSION['id'];
$is_admin = $_SESSION['is_admin'];

// Optional: Create is_approved column if missing (safe to run multiple times)
$conn->exec("ALTER TABLE bookings ADD COLUMN IF NOT EXISTS is_approved TINYINT(1) DEFAULT 0");

// Approve or decline logic inside this file
if ($is_admin == 'true' && isset($_GET['action']) && isset($_GET['id'])) {
    $bookingId = intval($_GET['id']);
    $action = $_GET['action'] === 'approve' ? 1 : 0;

    $stmt = $conn->prepare("UPDATE bookings SET is_approved = :status WHERE id = :id");
    $stmt->bindParam(':status', $action);
    $stmt->bindParam(':id', $bookingId);
    $stmt->execute();

    // Redirect to avoid re-approval on refresh
    header("Location: dashboard.php");
    exit();
}

// Fetch bookings
try {
    if ($is_admin == 'true') {
        $sql = "SELECT movies.movie_name, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time 
                FROM movies
                INNER JOIN bookings ON movies.id = bookings.movie_id
                INNER JOIN users ON users.id = bookings.user_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        $sql = "SELECT movies.movie_name, users.email, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time
                FROM movies 
                INNER JOIN bookings ON movies.id = bookings.movie_id 
                INNER JOIN users ON users.id = bookings.user_id 
                WHERE bookings.user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

    $bookings_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <span class="navbar-brand">Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a class="btn btn-light" href="logout.php">Logout</a>
    </div>
</header>

<div class="container-fluid mt-3">
    <div class="row">
        <nav class="col-md-3 bg-light p-3">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <?php if ($is_admin == 'true'): ?>
                    <li class="nav-item"><a class="nav-link" href="list_movies.php">Movies</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookings.php">Bookings</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <main class="col-md-9 p-4">
            <h2>Movie Bookings</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th>User Email</th>
                            <th>Tickets</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <?php if ($is_admin == 'true'): ?>
                                <th>Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings_data as $booking): ?>
                        <tr>
                            <td><?= htmlspecialchars($booking['movie_name']) ?></td>
                            <td><?= htmlspecialchars($booking['email']) ?></td>
                            <td><?= htmlspecialchars($booking['nr_tickets']) ?></td>
                            <td><?= htmlspecialchars($booking['date']) ?></td>
                            <td><?= htmlspecialchars($booking['time']) ?></td>
                            <td><?= $booking['is_approved'] ? 'Approved' : 'Pending' ?></td>
                            <?php if ($is_admin == 'true'): ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="dashboard.php?action=approve&id=<?= $booking['id'] ?>">Approve</a>
                                    <a class="btn btn-danger btn-sm" href="dashboard.php?action=decline&id=<?= $booking['id'] ?>">Decline</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

</body>
</html>
