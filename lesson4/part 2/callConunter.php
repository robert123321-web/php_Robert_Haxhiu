<?php

function callCounter(){
 static $counter=0;
 $counter++;
 echo"the number is $counter <br>"
    
}
  
callCounter();
callCounter();

callCounter();
callCounter();

callCounter();
callCounter();

callCounter();
callCounter();

callCounter();
callCounter();



?>