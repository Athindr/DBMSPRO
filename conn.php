<?php
$username='Localhost';
$mail='root';
$pwd='';
 if($con=mysql_connect($username,$mail,$pwd))
 {
	$db='dbmspro';
	if(!mysql_select_db($db))
	{
	 die("Not connected!");
    }
 }
 else
 {
	die("Not connected!");
 }
?>
