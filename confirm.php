<?php 
@session_start();
include_once('includes/connection.php');
include_once('functions/function.php');

if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id'];
}


?>
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
										  echo"<img src='customer/customer_images/$custom_image' style='width:200px;height:200px;'><br>
										  <a href='change_pic.php' style='margin-left:40px;'> change Photo</a>";
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
											<li style="margin-top:5px;"><a href="customer_my_account.php?delet account">Delet Account</a></li>
											<li style="margin-top:5px;"><a href="customer_logout.php">Logout</a></li>
											</ul>
									</b></h4>
							 </div>
						 </div>
						  
						</div>
						<?php if(isset($_GET['order_id'])){
							
						}else{
						echo"<div class='shipping text-center'>
							<img src='images/home/shipping.jpg' alt='' />
						</div>";}
					?>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right" >
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Account Manage  </h2> 
						<div class="row" style="margin-top:80px;">
						<div class="col-sm-2"></div>

<div class="table-responsive cart_info">
			<form action="" method="post" enctype="multipart/form-date">
				<table class="table table-bordered" style="width:600px;">
					<thead class=" info text-info text-center">
						<tr class="cart_menu" style="background:#FE980F;color:#fff;height:50px">
							<td colspan="2">Please Confirm Your Payments</td>
							
						</tr>
					</thead>
					<tbody class=" text-center">
					
						<tr >
							<td >Invoice No:</td>
							<td class=" text-left"><input type="text" name="invoice_No" style="width:250px;"/></td>
						</tr>
						<tr>
							<td >Amount Sent:</td>
							<td class=" text-left"><input type="text" name="amount" style="width:250px;"/></td>
						</tr>
						<tr>
							<td >Select Payment Mode:</td>
							<td class=" text-left"><select name="payment_method" style="width:250px;">
							<option>Select Payment</option>
							<option>Bank Transfar</option>
							<option>Net Banking</option>
							<option>Cash</option>
							<option>Paypal</option>
							</select></td>
						</tr>
						<tr>
							<td >Transaction/Refference ID:</td>
							<td class=" text-left"><input type="text" name="tr" style="width:250px;"/></td>
						</tr>
						<tr>
							<td >Easy Paisa/UBL Omini code:</td>
							<td class=" text-left"><input type="text" name="code" style="width:250px;"/></td>
						</tr>
						<tr>
							<td >Payment Date:</td>
							<td class=" text-left"><input type="text" name="date" style="width:250px;"/></td>
						</tr>
						 
						 <tr>
							<td colspan="2"><input type="submit" name="confirm" class="btn btn-info" value="Confirm Payment"/></td>
						 </tr>
							
					</tbody>
				</table>
				
				</form>
			</div>
			</div>
                    </div></div><!--features_items-->
					<?php
					if(isset($_POST['confirm'])){
						
						
						
						$invoice_No=$_POST['invoice_No'];
						$amount=$_POST['amount'];
						$payment_mode=$_POST['payment_method'];
						$Transaction_id=$_POST['tr'];
						$Easy_Paisa=$_POST['code'];
						$date = $_POST['date'];
						$complete= "complete";
						
						$insert= "INSERT INTO `payments` (`invoice_No`, `amount`, `payment_method`, `tr`, `code`, `date`) 
						VALUES ( '$invoice_No', '$amount', '$payment_mode', '$Transaction_id', '$Easy_Paisa', '$date');";
						$query= mysqli_query($con,$insert);
						
						
						$update_order="UPDATE `customer_order` SET  order_status ='$complete' WHERE order_id='$order_id'";
						$run_order=mysqli_query($con,$update_order);
						
						if($query){
							echo"<script>alert('Payment Received,Your Order will be Completed with in 24 hrs')</script> ";
							echo"<script>window.open('customer_my_account.php','_self')</script>";
						}
						
					}
					
					
					
					?>
					
					
				</div>
			</div>
		</div>
	</section>
	<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	

  
    