<?php include_once('head.php');?>
<body>
<?php include_once('templates/cartheader.php');?>
	
	<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
			<form action="cart.php" method="post" enctype="multipart/form-date">
				<table class="table table-condensed text-center">
					<thead >
						<tr class="cart_menu">
							<td >Item</td>
							<td >description</td>
							<td >Price</td>
							<td >Quantity</td>
							<td >Total</td>
							<td >Remove</td>
							<td></td>
						</tr>
					</thead>
					<?php
					   $ip_add = getRealIpAddr();
						$sn_total=0;	
		$get_price = "select * from cart where ip_add = '$ip_add'";
		$run_price = mysqli_query($con,$get_price);
		while($count = mysqli_fetch_array($run_price )){
			$pro_id= $count['p_id'];
			$qty= $count['qty'];
			
			$check_price = "SELECT * FROM `product` WHERE pro_id='$pro_id'";
			$run_pro_price = mysqli_query($con,$check_price);
			while($single_price = mysqli_fetch_array($run_pro_price)){
				$only_product_price = $single_price['pro_price'];
				
				
		}
		$sn_total = $only_product_price*$qty;
		
		}
					
					
					$ip_add = getRealIpAddr();
							$total=0;
							$s_total=0;
		$get_price = "select * from cart where ip_add = '$ip_add'";
		$run_price = mysqli_query($con,$get_price);
		while($count = mysqli_fetch_array($run_price )){
			$pro_id= $count['p_id'];
			$qty= $count['qty'];
			$pro_price = "SELECT * FROM `product` WHERE pro_id='$pro_id'";
			$run_pro_price = mysqli_query($con,$pro_price);
			while($p_price = mysqli_fetch_array($run_pro_price)){
				$product_price=array($p_price['pro_price']);
				$product_title = $p_price['pro_title'];
				$product_image = $p_price['pro_img1'];
				$values = array_sum($product_price);
				$s_total=$values*$qty;
				$total+=$s_total;
				
		?>
					<tbody>
						<tr>
							<td >
								<a href=""><img src="admin_area/product_images/<?php echo $product_image;?>" style="width:120px;hieght:120px;" alt=""></a>		
							</td>
							<td >
								<h4><a href="" ><?php echo $product_title;?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td >
								<p><?php echo "$".$values;;?></p>
							</td>
							<td >
							  <input class="cart_quantity_input" type="text" name="qty" value="<?php echo $qty;?>" autocomplete="off" size="2">
							</td>
							
							<td >
								<p class="cart_total_price">$<?php echo $s_total;?></p>
							</td>
							<td >
								<input class="cart_quantity_delete text-center" style="width:50px;"type="checkbox"name="remove[]" value="<?php echo $pro_id; ?>"/></i>
							</td>
							</tr>
							
						<?php
									if(isset($_POST['update'])){
										$qty =$_POST['qty'];
										$only_product_price = $p_price['pro_price'];
										$qty_update = "UPDATE `cart` SET `qty` = '$qty' WHERE ip_add = '$ip_add'";
										$run_qyery = mysqli_query($con,$qty_update);
										if($run_qyery){
										$total = $total*$qty;
										echo"<script>window.open('cart.php','_self')</script>";}
									}
									?> 
						<?php }}?>
						<tr>
							
								 <td colspan="2"><button class="btn btn-primary" name="update" type="submit">Update </button></td>
							 <td colspan="2" ><button class="btn btn-primary" name="continue" type="submit">Continue</button></td>
							 <td colspan="2" ><a href="checkout.php" class="btn btn-primary">Chack Out</a></td>
							
						</tr>
					</tbody>
				</table>
				
				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<button class="btn btn-default check_out" name="continue" type="submit">Continue </button>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php echo $total;?></span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo $total;?></span></li>
						</ul>
						   <form action="cart.php" method="post" enctype="multipart/form-date">
							<button class="btn btn-default update" name="update" type="submit">Update </button>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
							<button class="btn btn-default check_out" name="continue" type="submit">Continue </button>
							</form>
							
							<?php 
						
						echo @$cart_update=cartupdate();
							?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	
