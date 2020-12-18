<?php @session_start();
if(isset($_SESSION['admin_user'])){
	 
 }
 else{
	 echo"<script> window.open('index.php','_self')</script>";
 }
?>
<?php
							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_customers'])){
								
								$delete_id= $_GET['delete_customers'];
								
								$delete_ac ="DELETE FROM `customers` WHERE  custom_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> customer Has Been Delete </script>";
				                  echo "<script>window.open('admin.php?view_customers','_self')</script>";
			
								}
								
							}
							
							?>
			