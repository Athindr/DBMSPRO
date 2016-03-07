<!doctype html>
<html lang="en">
<head>
  <title> Enter Title Here(title bar) </title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <header>
      <h1>Supplier</h1>
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
            <h3>Select your ID to go proceed</h3>
		  </header>
		  <?php
		   session_start();
		   if(!empty($_SESSION))
		   {
			   session_destroy();
		   }
		   
			require_once('db_connect.php');
	        $bnames='SELECT * from suppliers';
	        $response=@mysqli_query($dbc,$bnames);
	        if($response)
	        {
			  echo '<article>'
		      . '<form action="SupplierManagerAuth.php" method="post">';
	           if(isset($_GET['supplier_set']))
			   {
			     echo "<p class='error'>Select Supplier First </p>";
			   }
			  while($row=mysqli_fetch_array($response))
	          {
		         echo '<div class="supplier" id=\"' .$row["sid"] . '\">'
	             . '<input type="radio" name="supplier" value="' . $row["sid"] . '">' . $row["sid"]
	             . '</div>';
	          }
			  echo '<button type="submit" value="Select Supplier" name="Submit" class="button" id="selbra">Select Supplier</button>';
		      echo '</form>'
			  . '</article>';
	        }
	        mysqli_close($dbc);
	      ?>
        </section>
		<section>
		</section>
	  </div>
    </div>
    <footer>
    <h5> Copyright &copy </h5>
    </footer>
  </div>
</body>
</html>