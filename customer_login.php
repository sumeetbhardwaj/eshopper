<?php include_once('head.php');?>
<body>
<?php include_once('templates/loginheader.php');?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
				
						<div class="panel panel-primary" style="margin-top:10px;">
                        <div class="panel-body" style="margin-top:20px;">
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_email" value=""placeholder="customer@abc.com" class="form-control">
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="password" name="custom_password" value="" placeholder="*********" class="form-control">
							 </div>
							 <div class="form-group pull-left">
								<button class="btn btn-success" name="login" style="width:100px;" >Login</button>
							 </div>
							 <div class="form-group pull-right">
							     <a href="customer_forget_password.php">Forget Password</a>
							 </div>

						 </form>
                            </div>
                        <div class="panel-footer" style="height:50px">
							     
						</div>
                    </div>
						

					</div><!--/login form-->
					<?php
					 @session_start();
					 include_once('includes/connection.php');
						 if(isset($_POST['login'])){
							  $email = $_POST['custom_email'];
							  $password = $_POST['custom_password'];
							  $insert="SELECT * FROM `customers` WHERE custom_email = '$email' AND custom_password = '$password'";
							  $query = mysqli_query($con,$insert);
							  $check_data = mysqli_num_rows($query);
							  
							  if($check_data==0){ 
								  echo"<script>alert('Email And Password is wrong please Try again !')</script>";
								  exit();
							  }
							  if($check_data==1 ){
								   $get_ip = getAllProducts();
							       $sel_cart ="SELECT * FROM `cart` WHERE ip_add = '$get_ip'";
							      $run_cart = mysqli_query($con,$sel_cart);
							      $check_cart = mysqli_num_rows($run_cart);
								  if($check_cart==0 ){

								  $_SESSION['custom_email']= $email;
								  
								  echo"<script>window.open('customer_my_account.php','_self')</script>";
							  					  
							     }
								 else{
									 $_SESSION['custom_email']= $email;
									  echo"<script>window.open('checkout.php','_self')</script>";
							  }}
						 }
					 ?>

				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						 <div class="panel panel-primary" style="margin-top:10px;">
                        <div class="panel-body" style="margin-top:20px;">
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							  <div class="form-group">
								 <input style="height:40px" type="text" name="custom_name" value=""placeholder="Enter Your Full Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_email" value=""placeholder="customer@abc.com" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="password" name="custom_password" value="" placeholder="*********" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_country" value=""placeholder="Enter Your Country Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_city" value=""placeholder="Enter Your City Name" class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_mob" value=""placeholder="Enter Your Contact No." class="form-control" required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="text" name="custom_address" value=""placeholder="Enter Your Address" class="form-control"required>
							 </div>
							 <div class="form-group">
								 <input style="height:40px" type="file" name="custom_image" class="form-control"required>
							 </div>
							 <div class="form-group pull-left">
								<button class="btn btn-success" name="sigin_up" style="width:150px;" >Create Account</button>
							 </div>
						 </form>
                            </div>
                       
                    </div>
					</div><!--/sign up form-->
					<?php
		if(isset($_POST['sigin_up'])){
			$custom_name= $_POST['custom_name'];
			$email= $_POST['custom_email'];
			$password= $_POST['custom_password'];
			$custom_country= $_POST['custom_country'];
			$custom_city= $_POST['custom_city'];
			$custom_mob= $_POST['custom_mob'];
			$custom_address= $_POST['custom_address'];
			$custom_image= $_FILES['custom_image']['name'];
			$custom_image_tmp= $_FILES['custom_image']['tmp_name'];
			
			$custom_ip=getRealIpAddr();
			
			$insert ="INSERT INTO `customers` (`custom_name`, `custom_email`, `custom_password`, `custom_country`, `custom_city`, `custom_mob`, `custom_address`, `custom_image`, `custom_ip`)
			VALUES ('$custom_name', '$email', '$password', '$custom_country', '$custom_city', '$custom_mob', '$custom_address', '$custom_image', 'custom_ip')";
			$query= mysqli_query($con,$insert);
			
			move_uploaded_file($custom_image_tmp,"customer\customer_images/$custom_image");
			
			                  $sel_cart ="SELECT * FROM `cart` WHERE ip_add = '$custom_ip'";
							  $run_cart = mysqli_query($con,$sel_cart);
							  $check_cart = mysqli_num_rows($run_cart);
				if($check_cart>0){
					$_SESSION['custom_email']= $email;
					echo"<script> window.open('checkout.php','_self')</script>";
				}else{
					$_SESSION['custom_email']= $email;
					echo"<script> window.open('index.php','_self')</script>";
				}
		}
		
		?>
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	

  
    