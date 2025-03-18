<?php

$cats=array(array('tabby cat','Europe','25'),("siamesse cat","UK","15"),("shorthairs","USA","20"))

/*
echo $cats [0][0]."origjina".$cats [0][1]."lifespan".$cats[0][2]."<br>";
echo $cats [1][0]."origjina".$cats [1][1]."lifespan".$cats[1][2]."<br>";
echo $c

ats [2][0]."origjina".$cats [2][1]."lifespan".$cats[2][2]."<br>";
*/

for($row = 0; $row<4; $row++){

    echo "<p>Row number $row   </p>";
    echo "<ul>";

    for($col=0; $col<3; $col++){
        echo "<li>".$cats[$row][$col]."</li>";
    }  ;
    
    

    echo"</ul>"
}



for($i =0;$i<3;$i++){
    echo $i. "<br>";
    for($j  = 0;$j<3;$j++){
        echo $j."numri mbrenda elementit <br>"
    }

}






?>  