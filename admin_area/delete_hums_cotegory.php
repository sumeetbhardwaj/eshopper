<?php

							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_hums_cotegory'])){
								
								$delete_id= $_GET['delete_hums_cotegory'];
								
								$delete_ac ="DELETE FROM `humnes_cats` WHERE  hum_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> Tp category Has Been Delete </script>";
				                  echo "<script>window.open('admin.php?view_hums_cotegory','_self')</script>";
			
								}
								
							}
							
							?>
			