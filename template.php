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
      <h1>Item Details</h1>
	  <?php require_once 'db_connect.php';
	  ?>
			
    </header>
    <div id="meat">
      <div id="main_section">
        <section>
		  <header>
		  </header>
		  <article>
		    <?php require_once 'eval_input.php' ?>
		  </article>
        </section>
		<section>
		</section>
	  </div>
      <div id="side_section">
        <aside>
		  <header>
		     <h3>Fill the values and submit</h3>
		  </header>
		  <article>
		   <?php
                echo "<form method='get'>";
				echo "enter sid : <input type='text' style='width:100px' padding:10px; height:30px;' name='sid' placeholder='ex: S1'/><br/><br/>";
				echo "enter bid : <input type='number' style='width:100px' padding:10px; ' name='bid' max='5' min='0'/><br/><br/>";
				echo "<button class='button' type='submit' name='submit' value='submit!'>Submit</button>";
				echo "</form>";
			?>
		  </article>
        </aside>
	  </div>
    </div>
    <footer>
	   <?php include_once 'transaction.php' ?>
    </footer>
  </div>
</body>
</html>
