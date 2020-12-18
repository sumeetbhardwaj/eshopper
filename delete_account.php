		

<div class="col-sm-8 col-sm-offset-2">
<h4 class=" text-center" style="color:#FE980F;"> Delete Your Account</h4>
							<div class="table-responsive cart_info">
			<form action="" method="post" enctype="multipart/form-date">
				<table class="table table-condensed text-center">
					<tbody>
						<tr>
							 <td colspan="2">Do You Want Delete Your Account</button></td>
							 
						</tr>
						<tr>
							 <td ><button class="btn btn-primary" name="yes" type="submit">Yes</button></td>
							 <td  ><button class="btn btn-primary" name="no" type="submit">No</button></td>
						</tr>
					</tbody>
				</table>
				
				</form>
			</div>
						</div>	
							
							<?php
							include_once('includes/connection.php');
                            
							$email= $_SESSION['custom_email'];
							
							if(isset($_POST['yes'])){
								$delete_ac="DELETE FROM `customers` WHERE custom_email='$email' ";
								$run_dlt=mysqli_query($con,$delete_ac);
								if($run_dlt){
									@session_destroy();
									echo"<script> Your Account Has Been Delete </script>";
				                   echo"<script>window.open('index.php','_self')</script>";
			
								}
								
							}
							if(isset($_POST['no'])){
							echo"<script>window.open('customer_my_account.php','_self')</script>";
			
							}
							?>
							
							
							
							
							
							
							
							
							
							
							
							
						