<?php include_once('head.php');?>
<body>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3"style="margin-top:80px;">
					<div class="login-form"><!--login form-->
						<div class="panel panel-primary" style="margin-top:10px;">
                        <div class="panel-body" style="margin-top:20px;">
						<form class="form" action="" method="POST" enctype="multipart/form-data">
							 <div class="form-group">
								 <input style="height:40px" type="text" name="forget_email" value=""placeholder="Please Enter Your Vailed Email" class="form-control">
							 </div>
							 <div class="form-group" align="center">
								<button class="btn btn-success" name="forg_passet" style="width:100px;" >Submit</button>
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
						 if(isset($_POST['forg_passet'])){
						 
							  $email = $_POST['forget_email'];
							  $insert="SELECT * FROM `customers` WHERE custom_email = '$email'";
							  $query = mysqli_query($con,$insert);
							  $check_data = mysqli_num_rows($query);
							  
							  
							  $select_query=mysqli_query($con,$insert);
							  $show_costomer= mysqli_fetch_array($select_query);
							  $custome_name=$show_costomer['custom_name'];
							  $custome_pass=$show_costomer['custom_password'];
							  if($check_data==0){ 
								  echo"<script>alert('Your Email wrong please Try again !')</script>";
								  exit();
							  }
							  else
								 
									$to = "$email";
									$subject= "Your Password";
									$message =" Dear $custome_name Your Your Password is =".$custome_pass;
									$headers= "From: E-shoper<info@echoper.com>";
									if(mail($to,$subject,$message,$headers)){
										 echo"<script>alert('Your Email successfully sent !')</script>";
										 echo"<script> window.open('checkout.php','_self')</script>";
									}
								  
							  }
					 ?>
			</div>
		</div>
	</section><!--/form-->
	<?php include_once('foot.php');?>
	

  
    