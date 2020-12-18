
<?php

							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_products'])){
								
								$delete_id= $_GET['delete_products'];
								
								$delete_ac ="DELETE FROM `product` WHERE  pro_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> Product Has Been Delete </script>";
				                  echo "<script>window.open('admin.php?views_products','_self')</script>";
			
								}
								
							}
							
							?>
			