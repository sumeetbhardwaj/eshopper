		

<div class="col-sm-8 col-sm-offset-2">
<h4 class=" text-center" style="color:#FE980F;"> Change your Password</h4>
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							  <div class="form-group">
								 <input style="height:40px" type="password" name="password" value="<?php ?>"placeholder="Enter Your Old Password" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="password" name="new_pass" value="<?php ?>"placeholder="Enter Your New Password"  class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="password" name="new_pass_again" value="<?php ?>" placeholder="Enter Your Again New Password"  class="form-control" required>
							 </div>
							
							 <div class="form-group pull-left">
								<button class="btn btn-success" name="ch_pass" style="width:150px;" >Change Password</button>
							 </div>
						 </form>
                            </div>
							
							<?php 
@session_start();
include_once('includes/connection.php');
	
	       $email= $_SESSION['custom_email'];
		   
		   if(isset($_POST['ch_pass'])){
			   
			   $password= $_POST['password'];
			   $new_password= $_POST['new_pass'];
			   $new_password_again= $_POST['new_pass_again'];
		   
		    $select_customer="SELECT * FROM `customers` WHERE custom_password ='$password'";
			$select_query= mysqli_query($con,$select_customer);
			$update= mysqli_num_rows($select_query);
			if($update==0){
				echo"<script>alert('Password is not vailed Try agian')</script>";
				exit();
				
			}
			if($new_password!=$new_password_again)
			{
				echo"<script>alert('Password is not match Try agian')</script>";
				exit();
			}else{
				$update_pass="UPDATE `customers` SET custom_password='$new_password' WHERE custom_email='$email'";
				$query=mysqli_query($con,$update_pass);
				echo"<script>alert('Password is successflly update')</script>";
				echo"<script>window.open('customer_my_account.php','_self')</script>";
			}			
	
	
}
    
?>