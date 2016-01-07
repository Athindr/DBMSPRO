<?php
                if(isset($_GET['submit'])&&isset($_GET['sid'])&&$_GET['bid']!=0)
				{
				 
				 session_start();
				 $_SESSION['sid']=$_GET['sid'];
				 $_SESSION['bid']=$_GET['bid'];

				 $sid=$_SESSION['sid'];
				 $bid=$_SESSION['bid'];
				 
				 $sql = "select id.iid,id.item_name,ss.quantity from 
				 branch_details bd,suppliers s,supplier_branch sb,item_details id,supplier_stock ss 
				 where bd.bno=sb.bno and s.sid=sb.sid and sb.iid=id.iid and id.iid=ss.iid 
				 and ss.sid=s.sid and s.sid='$sid' and bd.bno=$bid";
                 
				 $res=mysql_query($sql);
				   if(!$res)
					 die('Failid!'.mysql_error());
				   echo "<h3>Executed!</h3>";
				   $rows=mysql_num_rows($res);
				   if($rows==0)
					 die('Empty Result');
				   $_SESSION['rows']=$rows;
			    
				   echo "<table border='2' style='padding:4px; margin:4px;' >";
				   echo "<tr>";
				   echo "<td style='text-align:center;padding:2px; width:100px; margin:5px;'>iid</td>";
				   echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>item_name</td>";
				   echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>qty</td>";
				   echo "</tr>";
				   echo "<form method='get'>";
				   
				   for($j=0;$j<$rows;$j++)
					  {
						 echo "<tr>";
						 echo "<td style='text-align:center;padding:2px; width:100px; margin:5px;'>
							  <input type='button' style='width:70px;' name='iid$j' value=".mysql_result($res,$j,'iid').">
							  </td>";
						 $_SESSION["iid$j"]=mysql_result($res,$j,'iid');
						 echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>
							  <input style='width:150px; padding:4px; ' type='button' value=".mysql_result($res,$j,'item_name').">
							  </td>";
						 
						 echo "<td style='text-align:center;padding:5px; width:200px; margin:10px;'>
							   <input name='qty$j' 
								style='width:150px; padding:4px; text-align:center;' type='number' value='0' min='0' autofocus  max=".mysql_result($res,$j,'quantity').">
							   </td>";
						 echo "</tr>";
					  }
					  echo "</table>";
					  echo "<hr/>";
					  echo "<input type='submit' name='submit1' value='place order'>";
					  echo "<hr/>";
					  echo "</form>";
				}
				else
				{
					echo "<p class='error'>Fill the values</p>";
				}
		 ?>
