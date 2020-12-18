
<?php
							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_brands'])){
								
								$delete_id= $_GET['delete_brands'];
								
								$delete_ac ="DELETE FROM `brands` WHERE brand_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> Brand Has Been Delete </script>";
				                  echo "<script>window.open('admin.php?view_brands','_self')</script>";
			
								}
								
							}
							
							?>
			