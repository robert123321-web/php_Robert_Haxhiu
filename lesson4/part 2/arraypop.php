<?php

$sports = array ("football" , "basketball" ,"volleyball");

array_pop($sports);

array_push($sports, "handball");

for($i = 0; $i<3; $i++){
    echo $sports[$i];
}

?>