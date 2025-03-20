<?php

$myfile = fopen("ds.txt","w")


//$filesize = filesize($myfile);


$filename ="ds.txt";


$myfile = fopen($filename,'w');

$myText = "lorem ipsum sfdfdfdfdfdfdfddfdf";


fwrite($myfile,$myText)

$myfile2 = fopen('myfile2.txt','w');

fwrite($myfile2,'only 2 sekond')


$myfile3 = fopen('myfile3.txt','w');

fwrite($myfile3,'/n  only 3 sekond');

fclose();

?>