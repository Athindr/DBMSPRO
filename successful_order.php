<!doctype html>
<html lang="en">
<head>
  <title> Supplier List </title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <header>
      <h1>Order Details</h1>
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
            <h3></h3>
			<?php require_once 'db_connect.php';?>
		  </header>
		  <article>
		  <p></p>
		  <?php
		    session_start();
			if(isset($_SESSION['rows'])&&isset($_SESSION['sid'])&&isset($_SESSION['bid']))
	        {
			  $rows=$_SESSION['rows']." ";
			  $sid=$_SESSION['sid']." ";
			  $bid=$_SESSION['bid']."<br/>";
			  
			  echo "<p class='success'>successful order for branch_id $bid with supplier_id $sid </p><br/>";
		      echo "<p class='success'>order_details are</p>";
			  
			  echo "<table border='2' style='padding:4px; margin:4px;' >";
	          echo "<tr>";
	          echo "<td style='text-align:center;padding:2px; width:100px; margin:5px;'>iid</td>";
	          echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>qty</td>";
	          echo "</tr>";
	 
			  for($j=0;$j<$rows;$j++)
			  {
				  $sql="select iid,quantity from order_details where order_no=(select max(order_no) from order_details)-$j";
				  $res=mysql_query($sql);
				  if(!$res)
					  die("<p class='error'>Something went wrong! ".mysql_error()."</p>");
				  
				     echo "<tr>";
					 echo "<td style='text-align:center; padding:2px; width:100px; margin:5px;'>
					       <input type='button' value=".mysql_result($res,0,'iid')." style='width:70px;' />
						   </td> ";
					 echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>
						   <input type='button' value=".mysql_result($res,0,'quantity')." style='width:150px;' />
						   </td>";
					 echo "</tr>"; 
			  }
			  echo "</table>";
		      session_destroy();
			}
			else
				Header('Location: template.php');
		 ?>
		  </article>
        </section>
		<section>
		</section>
	  </div>
      <div id="side_section">
        <aside>
		  <header>
            <h3></h3>
		  </header>
		  <article>
		  <p></p>
		  </article>
        </aside>
	  </div>
    </div>
    <footer>
    <h5>  </h5>
    </footer>
  </div>
</body>
</html>
