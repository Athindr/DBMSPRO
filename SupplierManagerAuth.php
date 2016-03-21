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
	 if(isset($_POST['supplier']))
	   {
	     $_SESSION['supplier']=$_POST['supplier'];
		 echo '<header>'
           . '<h3>Authorization</h3>'
           . '</header>'
		   . '<div id="meat">'
           . '<div id="main_section">'
	       . '<section>'
           . '<form method="post">'
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
	  else
	  {
		 if((!empty($_POST['user'])&& !empty($_POST['pass'])&& isset($_SESSION['supplier'])) ||(isset($_SESSION['user'])&& isset($_SESSION['pass'])&&isset($_GET['x'])))
		   {
			   $flag=0;
			   if(!empty($_POST['user'])&& !empty($_POST['pass'])&& isset($_SESSION['supplier']))
                {
	              echo "First place ";
				  $user=$_POST['user'];//storing user name in $user variable
	              $pass=$_POST['pass'];//storing pass name in $pass variable
	              $sup= $_SESSION['supplier']; //storing the value of sid into $sup
                  $_SESSION['user']=$user;
                  $_SESSION['pass']=$pass;
                }
               else
			  {
			   $flag=1;
               $user=$_SESSION['user'];
               $pass=$_SESSION['pass'];
			   $sup= $_SESSION['supplier'];
             }
			   $query="SELECT * FROM `supplier_sid_auth` WHERE user='$user' and pass='$pass' and sid='$sup' ";
			   $result=mysql_query($query);
			   if($result)
			   {
					if(mysql_num_rows($result)==1)//if authorized
					{
						$query2="select item_name, i.Iid , quantity from item_details i, supplier_stock s where i.Iid=s.Iid and sid='$sup'";
			            $res=mysql_query($query2);
	                    echo '<header>'
                        .  '<h3>Updatation</h3>'
                        . '</header>'
				        . '<div id="meat">'
                        . '<div id="main_section">'
		                . '<section>'
						. '<form action="update.php" method="post">';
						  $row=mysql_num_rows($res);
						  $_SESSION['rows']=$row;
						  if($row==0)
							  die('<p class="error">Empty Result!</p>');
						    echo '<div class="sdet" id="sid">'
							 . '<header><h4>Update your stock</h4></header>'
							 . '<article>';
							 if($flag==1)
							  echo "<p class='error'>Enter atleast one element's quantity </p>";
						   echo "<table border='2' style='padding:4px; margin:4px;' >"
								  ."<tr>"
								  ."<td style='text-align:center;padding:2px; width:100px; margin:5px;'>iid</td>"
								  ."<td style='text-align:center;padding:5px; width:200px; margin:10px;'>item_name</td>"
								  ."<td style='text-align:center;padding:5px; width:200px; margin:10px;'>Select</td>"
								  ."</tr>";
				   
						   for($j=0;$j<$row;$j++)
					       {
							   echo "<tr>";
							   $_SESSION["iid$j"]=mysql_result($res,$j,'iid');
							   echo "<td style='text-align:center'>".mysql_result($res,$j,'iid')."</td><td style='text-align:center'>".mysql_result($res,$j,'item_name')."</td>";
							   echo "<td style='text-align:center'><input type='number' name='number$j' min=0 /></td>"; 
							   echo "</tr>";			
							}
							echo "</table>"
							. '</article>'
							. '</div>'
							. '<div class="sdet">'
							. '<button type="submit" name="Update" value="Update" class="button" id="sdadd">Update</button>'
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
	                 . '<h3 class="error">Authorization Failed, Invalid Username</h3>'
	                 . '</section>'
		             . '<section>'
                     .'<form action="SupplierManagerAuth.php" method="post">'
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
		}       }
    }
	   
	?>
	 
    <footer>
    <h5>Copyright &copy </h5>
    </footer>
  </div>
</body>
</html>