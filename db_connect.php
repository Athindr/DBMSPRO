<?php

DEFINE ('USER','test');
DEFINE ('PASS','ags');
DEFINE ('HOST','localhost');
DEFINE ('DB','DBMSPRO');
 
$dbc=@mysqli_connect(HOST,USER,PASS,DB);
OR die('Couldn\'t connect to mysqlserver' . mysql_error());
 
?>