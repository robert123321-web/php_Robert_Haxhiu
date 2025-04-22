<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>



  <div class="signup">
    <form action=""  class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>



        <label for="inputEmail"  class="sr-only"Username></label>
        <input type="text" id="inputEmail" class="form-control"
        placeholder="username"  name="username"  require autofocus>

        <label for="inputPassword"  class="sr-only"Password></label>
        <input type="text" id="inputPassword" class="form-control"
        placeholder="password"  name="password"  require >


        <label for="inputEmail"  class="sr-only"Username></label>
        <input type="text" id="inputEmail" class="form-control"
        placeholder="username"  name="username"  require autofocus>

        <label for="inputPassword"  class="sr-only"Name></label>
        <input type="text" id="inputName" class="form-control"
        placeholder="name"  name="name"  require >


        <button type="button" class="btn btn-primary btn-lg">Sign Up</button>
        
        <small>Already have an account?  <a href="login.php"></a></small> 
    </form>
  </div>
</html>