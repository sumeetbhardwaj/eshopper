<?php @session_start();
if(isset($_SESSION['admin_user'])){
	echo"<script> window.open('admin.php','_self')</script>"; 
 }
 else{
	 
 }
?>
	

<!DOCTYPE html>
<html lang="en">
<head>
<title>E-shoper  | Admin Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="all" />
<!--// css -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
</head>
<body>
	<div class="login">
	<?php
					 @session_start();
					 include_once('includes/connection.php');
					 
						 if(isset($_POST['admin_login'])){
							  $admin_user = $_POST['admin_user'];
							  $password = $_POST['admin_pass'];
							  $insert="SELECT * FROM `admin` WHERE admin_user = '$admin_user' AND admin_pass = '$password'";
							  $query = mysqli_query($con,$insert);
							  $check_data = mysqli_num_rows($query);
							  if($check_data==1){
								 $_SESSION['admin_user'] = "$admin_user";
		                        echo"<script> window.open('admin.php','_self')</script>";
							  }}
	?>
	
	
	
	
	
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Admin Login</h3>
					<form action="#" method="post">
						<div class="key">
							<input  type="text" name="admin_user" required="" placeholder="Admin User">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<input  type="password" name="admin_pass" required="" placeholder="Password">
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="admin_login" value="Admin Login">
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>