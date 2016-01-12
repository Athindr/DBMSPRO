<?php
		  if(isset($_GET['submit1']))
		  {
			session_start();
			if(isset($_SESSION['rows'])&&isset($_SESSION['sid'])&&isset($_SESSION['bid']))
			{
			  $rows=$_SESSION['rows'];
			  $sid=$_SESSION['sid'];
			  $bid=$_SESSION['bid'];
		      $k=0;
	    	 for($j=0;$j<$rows;$j++)
			 {
			  $iid=$_SESSION["iid$j"];
			  $qty=$_GET["qty$j"];
			  if($qty!=0)
			  {
					$debug=0;
					if(!$res=mysql_query('SET AUTOCOMMIT=0',$con))
						die("set autocommit error ".mysql_error());
					
					if(!$res=mysql_query('start transaction',$con))
						die("start xact error ".mysql_error());
					
					if(!$res=mysql_query("savepoint sp1",$con))
						die("savepoint creation error ".mysql_error());
					
					$sql="update supplier_stock set quantity=quantity-$qty where sid='$sid' and iid=$iid";
						 
					if(!mysql_query($sql))
					{
					   echo "<p class='error' error!".mysql_error()."</p>";
					   $res=mysql_query("rollback to sp1")
					   or die('could not rollback '.mysql_error());
					   echo ' rolled back <br/>';
					   die('error!'.mysql_error()); 
					}
					echo "updaing supplier_stock executed $debug <br/>";
					$sql = "select count(*) from orders";
					$res=mysql_query($sql);
						
					if(!$res)
					{
						echo "<p class='error' error!".mysql_error()."</p>";
						$res=mysql_query("rollback to sp1")
						or die('could not rollback '.mysql_error());
					    echo ' rolled back <br/>';
						die("<p class='error'>error in finding count !".mysql_error()."</p>");
					}
					echo "finding count executed <br/>";
					
					$count=mysql_result($res,0,'count(*)');
					$count=$count+1;
					
					$sql = "insert into orders(order_no,bno) values('$count','$bid')";		
					if(!mysql_query($sql))
					{
						echo "<p class='error' error!".mysql_error()."</p>";
						$res=mysql_query("rollback to sp1")
						or die('could not rollback '.mysql_error());
					    echo ' rolled back <br/>';
						die("<p class='error'>error in inserting to orders !".mysql_error()."</p>");  
					}
					echo "inserting to orders executed <br/>";
					
					$sql = "insert into order_details(order_no,iid,quantity) values('$count','$iid','$qty')";		
					if(!mysql_query($sql))
					{
					   echo "<p class='error' error!".mysql_error()."</p>";
					   $res=mysql_query("rollback to sp1")
					   or die('could not rollback '.mysql_error());
					   echo ' rolled back <br/>';
					   die('<p class="error">error in inserting order_details!'.mysql_error().'</p>'); 
					}
					echo "inserting to order_details executed <br/>";
					$sql = "update branch_items set quantity=quantity+$qty where bno=$bid and iid=$iid";
				 
					if(!mysql_query($sql))
					{
					   echo "<p class='error' error!".mysql_error()."</p>";
					   $res=mysql_query("rollback to sp1")
					   or die('could not rollback '.mysql_error());
					   echo '<p class="error"> changes have been rolled back </p> <br/>';
					}
					else
					{
					  $res=mysql_query('COMMIT')
					  or die('could not commit'.mysql_error());
					  echo 'committed <br/>';
					  $debug=1;
                    }					  
					$k=$k+1;
		         }
				else
				{
					continue;
				}	  
		      }
			   if($debug)
			   {
			    $_SESSION['rows']=$k;
			     Header('Location: successful_order.php');
			   }
		    }
	    }
       ?>
