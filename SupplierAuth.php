<?php
session_start();
?>
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
     require_once('conn.php');
	 require_once('db_connect.php');
     if(!empty($_POST['user'])&& !empty($_POST['pass']))//if both user and password values have been entered
     {
	  $user=$_POST['user'];//storing user name in $user variable
	  $pass=$_POST['pass'];//storing pass name in $pass variable
	  $sql = "SELECT * FROM `supplier_auth` WHERE user='$user' and pass='$pass'";
	  $response=mysql_query($sql);
	  if($response)//if response==1 which means query is executed 
	  { 
          if(mysql_num_rows($response)==1)//if authorized
	      {
			  $query2="SELECT sid ,item_name,Iid from suppliers NATURAL JOIN supplier_stock NATURAL JOIN item_details WHERE NOT EXISTS(SELECT sid,Iid from supplier_branch sb where bno=".$_SESSION['bno']." and item_details.Iid=sb.Iid and suppliers.sid=sb.sid)";
			  $resp2=@mysqli_query($dbc,$query2);
	            echo '<header>'
                   . '<h3>Choose Supplier</h3>'
                   . '</header>'
				   . '<div id="meat">'
                   . '<div id="main_section">'
		           . '<section>'
                   . '<form action="SupplierAdded.php" method="post">'
				   . '<div class="sdet" id="sid">'
	               . '<h4>Choose Supplier</h4>'
	               . '<select name="sno">';
				 if($resp2) 
				 {
					 while($row2=mysqli_fetch_array($resp2))
				    {
					    echo '<option value="'.$row2["sid"].' '.$row2["Iid"].'">'.$row2["item_name"].' from '.$row2["sid"].'</option>';
				    }
				 }
	             echo '</select>'
   				   . '</div>'
	               . '<div class="sdet">'
	               . '<button type="submit" name="Enter" value="Enter" class="button" id="sdadd">Enter</button>'
			       . '</div>'
	               . '</form>'
                   . '</section>'
				   . '</div>'
				   . '</div>';
		  }
		   else // the account does not exist // not authorized
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
               . '<form action="SupplierAuth.php" method="post">'
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
		  echo "<h3 class='error'>Error has occoured".mysql_error()."</h3>";
	  }
    }
    else//in the begining this part is displayed
    {
      echo '<header>'
           . '<h3>Authorization</h3>'
           . '</header>'
		   . '<div id="meat">'
           . '<div id="main_section">'
	       . '<section>'
           . '<form action="SupplierAuth.php" method="post">'
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
    ?>
    <footer>
    <h5>Copyright &copy</h5>
    </footer>
  </div>
</body>
</html>
