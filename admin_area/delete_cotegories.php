<?php @session_start();
if(isset($_SESSION['admin_user'])){
	 
 }
 else{
	 echo"<script> window.open('index.php','_self')</script>";
 }
?>
<?php
							include_once('includes/db_connection.php');
							
							if(isset($_GET['delete_cotegories'])){
								
								$delete_id= $_GET['delete_cotegories'];
								
								$delete_ac ="DELETE FROM `categories` WHERE cat_id = '$delete_id' ";
								
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									
									echo"<script> category Has Been Delete </script>";
				                  echo "<script>window.open('admin.php?view_cotegories','_self')</script>";
			
								}
								
							}
							
							?>
			