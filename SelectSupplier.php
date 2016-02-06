<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title> BRANCH</title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <header>
      <h1>Branch</h1>
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
            <h3>Select Supplier</h3>
		  </header>
		  <article>
		    <?php
	        require_once('db_connect.php');
			if(!empty($_POST))
			  $_SESSION['bno']=$_POST['branch'];
	        $bnames="SELECT DISTINCT s.sid from suppliers s,supplier_branch b where b.bno=".$_SESSION['bno']." and b.sid=s.sid";
	        $response=@mysqli_query($dbc,$bnames);
	        if($response)
	        {
			  echo '<article>'
		      . '<form action="Supplier.php" method="post">';
	          while($row=mysqli_fetch_array($response))
	          {
		         echo '<div class="supplier" id=\"' . $row["sid"] . '\">'
	             . '<input type="radio" name="supplier" value="' . $row["sid"] . '">' . $row["sid"]
	             . '</div>';
	          }
			  echo '<button type="submit" value="Select Supplier" name="Submit" class="button" id="selbra">Select Supplier</button>';
		      echo '</form>'
			  . '</article>';
	        }
	        mysqli_close($dbc);
	      ?>
		  </article>
        </section>
		<section>
		  <article>
              <a href="SupplierAuth.php"><button class="button" id="anbra">Add New Supplier</button></a>
          </article>
		</section>
	  </div>
     
    </div>
    <footer>
    <h5> Footer </h5>
    </footer>
  </div>
</body>
</html>
