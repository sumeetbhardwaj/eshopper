<?php

							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_orders'])){
								
								$delete_id= $_GET['delete_orders'];
								
								$delete_ac ="DELETE FROM `pandding_order` WHERE order_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> OrderHas Been Delete </script>";
				                  echo "<script>window.open('admin.php?view_orders','_self')</script>";
			
								}
								
							}
							
							?>
			