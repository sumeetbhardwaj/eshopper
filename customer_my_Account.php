<?php include_once('head.php');?>
<body>
<?php include_once('templates/my_accountheader.php');?>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						 <div class="panel panel-default">
						<div class='panel-heading '>
						 
								 <h4 class='panel-title'><b><?php
										  $customer_session= $_SESSION['custom_email'];
										  $get_customer_image="SELECT * FROM `customers` WHERE custom_email='$customer_session'";
										  $run_customer=mysqli_query($con,$get_customer_image);
										  $customer_pic=mysqli_fetch_array($run_customer);
										  $custom_image=$customer_pic['custom_image'];
										  echo"<img src='customer/customer_images/$custom_image' style='width:200px;height:200px;'><br>";
										  ?>
									</b></h4>
							 </div>
					
						 </div>
						  
						</div>
						
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						 <div class="panel panel-default">
						 <div class='panel-heading '>
						 
								 <h4 class='panel-title'><b>
								 
										<ul style="font-size:20px;">
										     
											<li style="margin-top:10px;"><a href="customer_my_account.php?my_order">My Order</a></li>
											<li style="margin-top:5px;"><a href="customer_my_account.php?edit_account">Edit Account</a></li>
											<li style="margin-top:5px;"><a href="customer_my_account.php?change_password">Change Password</a></li>
											<li style="margin-top:5px;"><a href="customer_my_account.php?delete">Delete Account</a></li>
											<li style="margin-top:5px;"><a href="logout.php">Logout</a></li>
											</ul>
									</b></h4>
							 </div>
						 </div>
						  
						</div>
						<?php if(isset($_GET['my_order'])){
							
						}else{
						echo"<div class='shipping text-center'>
							<img src='images/home/shipping.jpg' alt='' />
						</div>";}
					?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Account Manage  </h2>
						<div class="panel panel-primary" style="margin-top:30px;">
                        <div class="panel-body" >
						<?php 
						if(!isset($_GET['my_order'])){
							if(!isset($_GET['edit_account'])){
									if(!isset($_GET['change_password'])){
										if(!isset($_GET['delete'])){
						getDefault();}}}}?>
						<?php if(isset($_GET['my_order'])){
							include_once('my_order.php');
						}

						if(isset($_GET['order_id'])){
							include_once('confirm.php');
						}
						if(isset($_GET['edit_account'])){
							include_once('edit_account.php');
						}
						if(isset($_GET['change_password'])){
							include_once('change_password.php');
						}
						if(isset($_GET['delete'])){
							include_once('delete_account.php');
						}?>
						
						
                            </div>
                        <div class="panel-footer" style="height:50px">
							     
						</div>
                    </div></div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
	<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	

  
    