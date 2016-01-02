<!doctype html>
<html lang="en">
<head>
  <title> Enter Title Here </title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <header>
    <h1>Title</h1>
  </header>
  <section>
    <?php
	  require_once('db_connect.php');
	  $bnames='SELECT branch_name from BRANCH_DETAILS';
	  $response=@mysqli_query($dbc,$bnames);
	  if($response)
	  {
	    while($row=mysqli_fetch_array($response))
	    {
		   echo '<div>'
	       . '<a>' . $row["branch_name"] . '</a>'
	       . '</div>';
	    }
	  }
	  mysqli_close($dbc);
	 ?>
	<input type="button" value="Add New Branch +"/>
  </section>
  <aside>
    <h2> Previous Transactions </h2>
  </aside>
  <footer>
  <p> Enter a footer here </p>
  </footer>
</body>
</html>