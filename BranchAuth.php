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
    $src='SELECT * FROM branch_auth WHERE user="' . $_POST["user"] . '"';
	$response=@mysqli_query($dbc,$src);
	if($response)
	{ 
      if(mysqli_num_rows($response)>0)
	    {
	      $row=mysqli_fetch_array($response);
	      if($_POST["user"]==$row["user"] && $_POST["pass"]==$row["pass"])
	      {
	        echo '<header>'
                 . '<h2>Enter Branch Details</h2>'
                 . '</header>'
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
                 . '</section>';
		  }
		  else
		  {
			 echo '<header>'
             . '<h2>Authorization</h2>'
             . '</header>'
	         . '<section>'
	         . '<h3>Authorization Failed, Invalid Password</h3>'
	         . '</section>'
		     . '<section>'
             . '<form action="BranchAuth.php" method="post">'
	         . '<div class="adet" id="ausn">'
	         . '<h4>Enter Username</h4>'
		     . '<input type="text" name="user"/>'
		     . '</div>'
	         . '<div class="adte" id="apass">'
		     . '<h4>Enter Password</h4>'
		     . '<input type="password" name="pass"/>'
		     . '</div>'
		     . '<input type="submit" name="Authorize" value="Authorize"/>'
	         . '</form>'
             . '</section>'; 
		  }
	    }
	    else
	    {
	        echo '<header>'
             . '<h2>Authorization</h2>'
             . '</header>'
	         . '<section>'
	         . '<h3>Authorization Failed, Invalid Username</h3>'
	         . '</section>'
		     . '<section>'
             . '<form action="BranchAuth.php" method="post">'
	         . '<div class="adet" id="ausn">'
	         . '<h4>Enter Username</h4>'
		     . '<input type="text" name="user"/>'
		     . '</div>'
	         . '<div class="adte" id="apass">'
		     . '<h4>Enter Password</h4>'
		     . '<input type="password" name="pass"/>'
		     . '</div>'
		     . '<input type="submit" name="Authorize" value="Authorize"/>'
	         . '</form>'
             . '</section>';
	    }
	}	
	else
	{
		echo 'Error has occoured';
	}
  }
  else
  {
    echo '<header>'
         . '<h2>Authorization</h2>'
         . '</header>'
	     . '<section>'
         . '<form action="BranchAuth.php" method="post">'
	     . '<div class="adet" id="ausn">'
	     . '<h4>Enter Username</h4>'
		 . '<input type="text" name="user"/>'
		 . '</div>'
	     . '<div class="adte" id="apass">'
		 . '<h4>Enter Password</h4>'
		 . '<input type="password" name="pass"/>'
		 . '</div>'
		 . '<input type="submit" name="Authorize" value="Authorize"/>'
	     . '</form>'
         . '</section>';
  }
  mysqli_close($dbc);
  ?>
  <footer>
  </footer>
</body>
</html>