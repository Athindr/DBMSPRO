<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>Supplier Addition</title>
  <link rel="stylesheet" href="Layout.css">
  <meta charset="utf-8"/>
</head>
<body>
  <div id="content">
    <?php
	$str=$_POST["sno"];
	$values = explode(" ",$str);
    require_once('db_connect.php');
	$ins='INSERT INTO supplier_branch(sid,bno,Iid) VALUES(?,?,?)';
	$stm=mysqli_prepare($dbc,$ins);
	mysqli_stmt_bind_param($stm,"sii",$values[0],$_SESSION['bno'],intval($values[1]));
	mysqli_stmt_execute($stm);
	$affected_rows=mysqli_stmt_affected_rows($stm);
	if(($affected_rows==1))
	{
	    echo '<header>'
            . '<h2>Success!</h2>'
            . '</header>'
		    . '<div id="meat">'
            . '<div id="main_section">'
            . '<section>'
			. '<header>'
            . '<h3 class="success">Supplier has been successfully added!</h3>'
			. '</header>'
			. '<article>'
			. '<h3>Details</h3>';
		$supdet="SELECT sid,sname,location,contact,Iid,item_name,price from suppliers NATURAL JOIN supplier_branch NATURAL JOIN item_details where sid=\"".$values[0]."\" and bno=".$_SESSION['bno']." and Iid=".$values[1];
		$resp=@mysqli_query($dbc,$supdet);
		if($resp)
		{
			$row=mysqli_fetch_array($resp);
			echo '<p>Supplier No : '.$row["sid"].'</p>'
			. '<p>Supplier Name : '.$row["sname"].'</p>'
			. '<p>Supplier Location : '.$row["location"].'</p>'
			. '<p>Supplier Contact : '.$row["contact"].'</p>'
			. '<p>Item ID : '.$row["Iid"].'</p>'
			. '<p>Item Supplied : '.$row["item_name"].'</p>'
			. '<p>Item Price : '.$row["price"].'</p>'
	        . '<a href="SelectSupplier.php">Go back to Supplier page</a>'
            . '</section>'
		    . '</div>'
		    . '</div>';
			
		}
	} 
	else
	{
	    echo '<p class="error">Error :' . mysqli_error($dbc) . '</p>';
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
				echo '<option value='.$row2["sid"].$row["item_name"].'>'.$row2["item_name"].' from '.$row2["sid"].'</option>';
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
    mysqli_close($dbc);
    ?>
    <footer>
    <h5>Copyright &copy</h5>
    </footer>
  </div>
</body>
</html>
