<!doctype html>
<html lang="en">
<head>
  <title>TITLE</title>
  <link rel="stylesheet" href="Layout.css"/>
  <meta charset="utf-8"/>
</head>
<body>
  <?php
  require_once('db_connect.php');
  if(!empty($_POST))
  {
	$missing=array();
	if(!$_POST["location"])
	{
		$missing[]="Location";
	}
	else
	{
		$loc=$_POST["location"];
	}
	if(!$_POST["contact"])
	{
		$missing[]="Contact";
	}
	else
	{
		$con=$_POST["contact"];
	}
	if(!empty($missing))
	{
		echo 'Enter ';
		foreach($missing as $miss)
		{
			echo $miss . " ";
		}
		echo '<header>'
             . '<h2>Enter Branch Details</h2>'
             . '</header>'
		     . '<section>'
             . '<form action="BranchAdded.php" method="post">'
	         . '<div class="bdet" id="bloc">'
	         . '<h4>Enter Branch Location</h4>'
	         . '<input type="text" name="location" size="40"/>'
	         . '</div>'
	         . '<div class="bdet" id="bcon">'
	         . '<h4>Enter Contact No.</h4>'
		     . '<input type="text" name="contact" size="10"/>'
	         . '</div>'
	         . '<input type="submit" name="Enter" value="Enter"/>'
	         . '</form>'
             . '</section>';
	}
	else
	{
		$ins='INSERT INTO branch_details(location,contact) VALUES(?,?)';
		$stm=mysqli_prepare($dbc,$ins);
		mysqli_stmt_bind_param($stm,"ss",$loc,$con);
		mysqli_stmt_execute($stm);
		$affected_rows=mysqli_stmt_affected_rows($stm);
		if($affected_rows==1)
		{
			echo '<header>'
                 . '<h2>Success</h2>'
                 . '</header>'
                 . '<section>'
                 . '<p>Branch has been successfully added!</p>'
	             . '<a href="MainPage.php">Go back to main page</a>'
                 . '</section>';
		}
		else
		{
			echo 'Error :' . mysqli_error($dbc);
			echo '<header>'
             . '<h2>Enter Branch Details</h2>'
             . '</header>'
		     . '<section>'
             . '<form action="BranchAdded.php" method="post">'
	         . '<div class="bdet" id="bloc">'
	         . '<h4>Enter Branch Location</h4>'
	         . '<input type="text" name="location" size="40"/>'
	         . '</div>'
	         . '<div class="bdet" id="bcon">'
	         . '<h4>Enter Contact No.</h4>'
		     . '<input type="text" name="contact" size="10"/>'
	         . '</div>'
	         . '<input type="submit" name="Enter" value="Enter"/>'
	         . '</form>'
             . '</section>';
			
		}
	}
  }
  mysqli_close($dbc);
  ?>
  <footer>
  </footer>
</body>
</html>