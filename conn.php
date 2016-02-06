<?php
$username='localhost';
$mail='root';
$pwd='abcd1234';
 if($con=mysql_connect($username,$mail,$pwd))
 {
	$db='dbmspro1';
	if(!mysql_select_db($db))
	{
	 die("Not connected!");
    }
 }
 else
 {
	die("Not connected!");
 }
 echo "connected";
?>
