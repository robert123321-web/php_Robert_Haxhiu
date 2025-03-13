<?php

$x = 4;

function localVariable(){
    global $x;
    $y = 10;
    echo $x;
    echo $y;
}



localVariable();

?>