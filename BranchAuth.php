<!doctype html>
<html lang="en">
<head>
  <title>Authorization</title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
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
	               . '<div class="bdet">'
	               . '<button type="submit" name="Enter" value="Enter" class="button" id="bdadd">Enter</button>'
			       . '</div>'
	               . '</form>'
                   . '</section>'
				   . '</div>'
				   . '</div>';
		    }
		    else
		    {
			   echo '<header>'
               . '<h3>Authorization</h3>'
               . '</header>'
			   . '<div id="meat">'
               . '<div id="main_section">'
	           . '<section>'
	           . '<h3 class="error">Authorization Failed, Invalid Password</h3>'
	           . '</section>'
		       . '<section>'
               . '<form action="BranchAuth.php" method="post">'
	           . '<div class="adet" id="ausn">'
	           . '<h4>Enter Username</h4>'
		       . '<input type="text" name="user"/>'
		       . '</div>'
	           . '<div class="adet" id="apass">'
		       . '<h4>Enter Password</h4>'
		       . '<input type="password" name="pass"/>'
		       . '</div>'
			   . '<div class="adet">'
		       . '<button type="submit" name="Authorize" value="Authorize" class="button" id="abt">Authorize</button>'
			   . '</div>'
	           . '</form>'
               . '</section>'
			   . '</div>'
			   . '</div>'; 
		    }
	      }
	      else
	      {
	          echo '<header>'
               . '<h3>Authorization</h3>'
               . '</header>'
			   . '<div id="meat">'
               . '<div id="main_section">'
	           . '<section>'
	           . '<h3 class="error">Authorization Failed, Invalid Username</h3>'
	           . '</section>'
		       . '<section>'
               . '<form action="BranchAuth.php" method="post">'
	           . '<div class="adet" id="ausn">'
	           . '<h4>Enter Username</h4>'
		       . '<input type="text" name="user"/>'
		       . '</div>'
	           . '<div class="adet" id="apass">'
		       . '<h4>Enter Password</h4>'
		       . '<input type="password" name="pass"/>'
		       . '</div>'
		       . '<div class="adet">'
		       . '<button type="submit" name="Authorize" value="Authorize" class="button" id="abt">Authorize</button>'
			   . '</div>'
	           . '</form>'
               . '</section>'
			   . '</div>'
			   . '</div>';
	      }
	  }	
	  else
	  {
		  echo '<h3 class="error">Error has occoured</h3>';
	  }
    }
    else
    {
      echo '<header>'
           . '<h3>Authorization</h3>'
           . '</header>'
		   . '<div id="meat">'
           . '<div id="main_section">'
	       . '<section>'
           . '<form action="BranchAuth.php" method="post">'
	       . '<div class="adet" id="ausn">'
	       . '<h4>Enter Username</h4>'
		   . '<input type="text" name="user"/>'
		   . '</div>'
	       . '<div class="adet" id="apass">'
		   . '<h4>Enter Password</h4>'
		   . '<input type="password" name="pass"/>'
		   . '</div>'
		   . '<div class="adet">'
		   . '<button type="submit" name="Authorize" value="Authorize" class="button" id="abt">Authorize</button>'
		   . '</div>'
	       . '</form>'
           . '</section>'
		   . '</div>'
		   . '</div>';
    }
    mysqli_close($dbc);
    ?>
    <footer>
    <h5>Copyright &copy</h5>
    </footer>
  </div>
</body>
</html>