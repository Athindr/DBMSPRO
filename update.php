<!doctype html>
<html lang="en">
<head>
  <title> Updation complete </title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <header>
      <h1>Updated stocks</h1>
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
            <h3></h3>
			<?php session_start();
				  require_once('conn.php');
				  require_once('db_connect.php');
			?>
  </header>
  <article>
  <p></p>
  <?php
	  if(isset($_POST['Update']))
	  {
		   $flag=0; 
		if(isset($_SESSION['rows']))
	    {  
		   for($j=0;$j<$_SESSION['rows'];$j++)
           {			   
		    if($_POST["number$j"]==0)
				continue;
			$flag=$flag+1;
			$num=$_POST["number$j"];
			$sid=$_SESSION['supplier'];
		    $iid=$_SESSION["iid$j"];
			$_SESSION[$j]=$iid;
			$query1= "update supplier_stock set quantity=quantity+$num where Iid='$iid'and sid='$sid'";
			if(!mysqli_query($dbc,$query1))
				  Die('Dinn work'+mysql_error());
		    }
			if($flag)
			{
				  echo "<table border='2' style='padding:4px; margin:4px;' >"
								  ."<tr>"
								  ."<td style='text-align:center;padding:2px; width:100px; margin:5px;'>iid</td>"
								  ."<td style='text-align:center;padding:5px; width:200px; margin:10px;'>updated stock</td>"
								  ."</tr>";
				  for($j=0;$j<$_SESSION['rows'];$j++)
				  {
					  if(isset($_SESSION[$j]))
					  {
						  $query2= "select Iid, quantity from supplier_stock Where iid=$_SESSION[$j] and sid='$sid'";
						  $resp2=@mysqli_query($dbc,$query2);
						  if($resp2)
						  {
							echo "<tr>";
							$row=mysqli_fetch_array($resp2);
							echo "<td style='text-align:center'>".$row["Iid"]."</td>"
							. "<td style='text-align:center'>".$row["quantity"]."</td>";
							echo "</tr>";
						  }
                      }
				  }
				 echo "</table>";
              }
			  else
			  {
				  header("Location: SupplierManagerAuth.php?x=0");   
			  }
			   echo  '<a href="SupplierM.php"><button class="button" id="anbra">Go to Supplier Manager</button></a>'
			   .   '</article>'
			   .  '<article>'
			   .  '<a href="MainPage.html"><button class="button" id="anbra">Go to MainPage</button></a>';
	    }
		else
		{
				  Header("Refresh: SupplierManagerAuth.php?x=0");
		}
	  }
		else
		{
			echo '<article>'
					 . '<p class="error">No Updation Made!</p>'
					 . '<p class="error">Redirecting...</p>';
					 Header("Refresh:3;url='SupplierM.php'");
					 echo '</article>';
		}
	?>

     </article>
        </section>
	  </div>
    </div>
    <footer>
    <h5>Copyright &copy </h5>
    </footer>
  </div>
</body>
</html>
