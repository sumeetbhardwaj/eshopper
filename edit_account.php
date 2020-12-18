<?php 
@session_start();
include_once('includes/connection.php');
include_once('functions/function.php');

if(isset($_GET['edit_account'])){
	
	       $email= $_SESSION['custom_email'];
		   
		    $select_customer="SELECT * FROM `customers` WHERE custom_email ='$email'";
			$select_query= mysqli_query($con,$select_customer);
			$update= mysqli_fetch_array($select_query);
			
			$custom_id= $update['custom_id'];
	        $custom_name= $update['custom_name'];
			$email= $update['custom_email'];
			$password= $update['custom_password'];
			$custom_country= $update['custom_country'];
			$custom_city= $update['custom_city'];
			$custom_mob= $update['custom_mob'];
			$custom_address= $update['custom_address'];
			$custom_image= $update['custom_image'];
						
	
	
}
    
		
?>
<div class="col-sm-8 col-sm-offset-2">
<h4 class=" text-center" style="color:#FE980F;"> Update Your Account</h4>
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							  <div class="form-group">
								 <input style="height:40px" type="text" name="custom_name" value="<?php echo $custom_name;?>"placeholder="Enter Your Full Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_email" value="<?php echo $email;?>"placeholder="customer@abc.com" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="password" name="custom_password" value="<?php echo $password;?>" placeholder="*********" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_country" value="<?php echo $custom_country;?>"placeholder="Enter Your Country Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_city" value="<?php echo $custom_city;?>"placeholder="Enter Your City Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_mob" value="<?php echo $custom_mob;?>"placeholder="Enter Your Contact No." class="form-control" required>
							 </div>
							 <div class="form-group">
								 <textarea style="height:40px" name="custom_address" col="10" rows="25" value=""placeholder="Enter Your Address" class="form-control"required><?php echo $custom_address;?></textarea>
							 </div>
							 <div class="form-group">
								<img  style="height:200px" src="customer/customer_images/<?php echo $custom_image;?>"/> <input style="height:40px" type="file" name="custom_image" class="form-control"required>
							 </div>
							 <div class="form-group pull-left">
								<button class="btn btn-success" name="update_ac" style="width:150px;" >Update Account</button>
							 </div>
						 </form>
                            </div>
							<?php
							if(isset($_POST['update_ac'])){
								$update_id = $custom_id;
			$custom_name= $_POST['custom_name'];
			$email= $_POST['custom_email'];
			$password= $_POST['custom_password'];
			$custom_country= $_POST['custom_country'];
			$custom_city= $_POST['custom_city'];
			$custom_mob= $_POST['custom_mob'];
			$custom_address= $_POST['custom_address'];
			$custom_image= $_FILES['custom_image']['name'];
			$custom_image_tmp= $_FILES['custom_image']['tmp_name'];
			
			move_uploaded_file($custom_image_tmp,"customer\customer_images/$custom_image");
			$ac_update="UPDATE `customers` SET custom_name ='$custom_name', custom_email ='$email',
			custom_password ='$password',custom_country='$custom_country',custom_city='$custom_city',custom_mob='$custom_mob',
			custom_address='$custom_address',custom_image='$custom_image' WHERE custom_id='$update_id '";
			$update_query=mysqli_query($con,$ac_update);
			if($update_query){
				echo"<script> Your Account Has Been Update Thank U</script>";
				echo"<script>window.open('customer_my_account.php','_self')</script>";
			}
							}
							
							
							?>