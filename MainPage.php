<!doctype html>
<html lang="en">
<head>
  <title> Enter Title Here </title>
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
	        $bnames='SELECT location from branch_details';
	        $response=@mysqli_query($dbc,$bnames);
	        if($response)
	        {
		      echo '<form action="SelectSupplier.php" method="post">';
	          while($row=mysqli_fetch_array($response))
	          {
		         echo '<div class="Branch" id=\"' . $row["location"] . '\">'
	             . '<a href=".">' . $row["location"] . '</a>'
	             . '</div>';
	          }
		      echo '</form>';
	        }
	        mysqli_close($dbc);
	      ?>
        </section>
        <section>
	      <a href="BranchAuth.php"><input type="button" value="Add New Branch +"/></a>
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
    <p> Enter a footer here </p>
    </footer>
  </div>
</body>
</html>