<?php 

function plot($n){
    if(($n % 2)== 0){
        return "$n numri eshte i plotepjestueshem me 2";
    }else{
        return "$n numri nuk  eshte i plotepjestueshem me 2";
    }
    }

    print_r(plot(10). "<br>");
?>
