<?php

//error_reporting(E_ERROR);
global $link;

$servername='localhost';
$dbname='fyp';
$dbusername='root';
$dbpassword='';


$link = mysql_connect($servername,$dbusername,$dbpassword);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}
else 
{
mysql_select_db($dbname,$link) or die ("could not open db".mysql_error());
//echo 'Connected successfully';
}
?>  

