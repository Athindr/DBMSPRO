<!doctype html>
<html lang="en">
<head>
  <title>Welcome!</title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <header>
      <h1>Title</h1>
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
            <h2>Select Branch</h2>
		  </header>
          <?php
	        require_once('db_connect.php');
	        $bnames='SELECT * from branch_details';
	        $response=@mysqli_query($dbc,$bnames);
	        if($response)
	        {
			  echo '<article>'
		      . '<form action="SelectSupplier.php" method="post">';
	          while($row=mysqli_fetch_array($response))
	          {
		         echo '<div class="branch" id=\"' . $row["location"] . '\">'
	             . '<input type="radio" name="branch" value="' . $row["bno"] . '">' . $row["location"]
	             . '</div>';
	          }
			  echo '<button type="submit" value="Select Branch" name="Submit" class="button" id="selbra">Select Branch</button>';
		      echo '</form>'
			  . '</article>';
	        }
	        mysqli_close($dbc);
	      ?>
        </section>
        <section>
		  <article>
	        <a href="BranchAuth.php"><button class="button" id="anbra">Add New Branch +</button></a>
		  </article>
        </section>
	  </div>
      <div id="side_section">
        <aside>
		  <header>
            <h2> Previous Transactions </h2>
		  </header>
        </aside>
	  </div>
    </div>
    <footer>
    <p>Copyright &copy</p>
    </footer>
  </div>
</body>
</html>