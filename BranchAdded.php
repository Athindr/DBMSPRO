<!doctype html>
<html lang="en">
<head>
  <title> Enter Title Here(title bar) </title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <?php
    require_once('db_connect.php');
    if(!empty($_POST))
    {
	  $missing=array();
	  if(!$_POST["bno"])
	  {
		  $missing[]="Branch Number";
	  }
	  else
	  {
		  $bno=$_POST["bno"];
	  }
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
		  $missing[]="Contact Number";
	  }
	  else
	  {
		  $con=$_POST["contact"];
	  }
	  if(!empty($missing))
	  {
		  foreach($missing as $miss)
		  {
			  echo '<p class="error" id="important">Enter ' . $miss . '</p><br/>';
		  }
		  echo '<header>'
               . '<h3>Enter Branch Details</h3>'
               . '</header>'
			   . '<div id="meat">'
               . '<div id="main_section">'
		       . '<section>'
               . '<form action="BranchAdded.php" method="post">'
			   . '<div class="bdet" id="bno">'
	           . '<h4>Enter Branch Number</h4>'
	           . '<input type="text" name="bno" size="5"/>'
	           . '</div>'
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
               . '</section>'
			   .'</div>'
			   .'</div>';
	  }
	  else
	  {
		  $ins='INSERT INTO branch_details(bno,location,contact) VALUES(?,?,?)';
		  $stm=mysqli_prepare($dbc,$ins);
		  mysqli_stmt_bind_param($stm,"iss",$bno,$loc,$con);
		  mysqli_stmt_execute($stm);
		  $affected_rows=mysqli_stmt_affected_rows($stm);
		  if($affected_rows==1)
		  {
			  echo '<header>'
                   . '<h2>Success</h2>'
                   . '</header>'
				   . '<div id="meat">'
                   . '<div id="main_section">'
                   . '<section>'
                   . '<p class="success">Branch has been successfully added!</p>'
	               . '<a href="MainPage.php">Go back to main page</a>'
                   . '</section>'
				   . '</div>'
				   . '</div>';
		  }
		  else
		  {
			  echo '<p class="error">Error :' . mysqli_error($dbc) . '</p>';
			  echo '<header>'
               . '<h2>Enter Branch Details</h2>'
               . '</header>'
			   . '<div id="meat">'
               . '<div id="main_section">'
		       . '<section>'
               . '<form action="BranchAdded.php" method="post">'
			   . '<div class="bdet" id="bno">'
	           . '<h4>Enter Branch Number</h4>'
	           . '<input type="text" name="bno" size="5"/>'
	           . '</div>'
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
               . '</section>'
               . '</div>'
               . '</div>';			   
		  }
	  }
    }
    mysqli_close($dbc);
    ?>
    <footer>
    <h5> Footer </h5>
    </footer>
  </div>
</body>
</html>