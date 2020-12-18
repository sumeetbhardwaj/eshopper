<?php @session_start();
include_once('includes/connection.php');
include_once('functions/function.php');
 ?>
<header id="header" style="margin-bottom:15px;"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12">
						<div class="navbar-header navbar-top-fixed">
						<a class="navbar-brand" href="index.php"><img src="images/home/logo.png" alt="" /></a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="margin-top:20px;">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-right" style="margin-top:30px;">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="">Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									<li class="text-center"><a href="products.php">All Products</a></li>
                                        <?php getHum();?>
                                    </ul>
                                </li> 
								<?php
					 if(isset($_SESSION['custom_email'])){
						echo" <li><a href='customer_my_Account.php'>My Account</a></li>";
					 }else{
						 echo"<li><a href='customer_login.php'>My Account</a></li>";
					 }?>
					 <li><a href="404.html">Shopping</a></li>
								<li><a href="contact-us.php">Contact</a></li>
								<li><a href="cart.html">About Us</a></li> 
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		</header><!--/header-->
		<?php include_once('slider.php');?>
		<header id="header" tyle="margin-bottom:15px;"><!--header-->
	
		<div class="header-bottom " ><!--header-bottom-->
		 <div class="container" style="background:#000;padding:10px; border-radius:5px;" >
			 <div class="row" >
				 <div class="col-sm-4">
				 <form action="results.php" method="get" enctype="multipart/form-date">
					 <div class="input-group">
						 <input type="text" name="search" class="form-control" placeholder="Search for...">
						 <span class="input-group-btn">
							 <button class="btn btn-success" name="search_btn" type="submit">Search</button>
						 </span>
					 </div><!-- /input-group -->
					 </form>
				 </div><!-- /.col-lg-4 -->
				 <div class="col-sm-8 text-center">
					 <h6 style="color:#fff;font-size:15px;">
					 <?php
					 if(!isset($_SESSION['custom_email'])){
					 echo"<b> Wel Come &nbsp Guest !</b>"." "."<b style='color:yellow'>Shopping Cart-</b>";
					 }else{
						 $customer_session= $_SESSION['custom_email'];
										  $get_customer_image="SELECT * FROM `customers` WHERE custom_email='$customer_session'";
										  $run_customer=mysqli_query($con,$get_customer_image);
										  $customer_pic=mysqli_fetch_array($run_customer);
										  $custom_name=$customer_pic['custom_name'];
										  $custom_image=$customer_pic['custom_image'];

						 echo"<b style='font-size:18px;color:#FE980F'> Wel Come</b>"."<b style='font-size:18px;'> ".$custom_name. "</b>"." "."<b style='color:yellow'>Your Shopping Cart-</b>";
					 }
					 ?>
					 &nbsp
					 
					 <?php cart();?>
					 <span>- Total Item: <?php itmes();?> &nbsp Total Price: <?php Totalprice();?> &nbsp <a href="cart.php" style="color:#FE980F; underline:none;">Go to Cart</a> 
					 &nbsp<?php
					 if(!isset($_SESSION['custom_email'])){
					 echo"<a href='checkout.php' style='color:#fff; underline:none;'>Login</a>";
					 }else{
						 echo"<a href='logout.php' style='color:#fff; underline:none;'>Logout</a>";
					 }
					 ?>
					 </span></h6>
				 </div><!-- /.col-lg-8 -->
			 </div><!-- /.row -->
		 </div>
	 </div><!--/header-bottom-->
	</header><!--/header-->
	