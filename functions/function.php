<?php

$con = mysqli_connect("localhost","root","","e-shoper") or die(mysqli_error());


function getRealIpAddr(){
	
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}


function cart(){
	  global $con; 
	if(isset($_GET['add_cart'])){ 
		$p_id = $_GET['add_cart'];
	   $ip_add = getRealIpAddr();
	   
	   $check_pro = "SELECT * FROM `cart` WHERE  p_id= '$p_id' AND ip_add= '$ip_add'";
	   $run_check = mysqli_query($con,$check_pro);
	   
	   if(mysqli_num_rows($run_check)>0){
		   echo"";
	   }
	   else{
		   
		   $query = "INSERT INTO `cart` (`p_id`, `ip_add`,`qty`) VALUES ('$p_id', '$ip_add','1')";
		   $run_query = mysqli_query($con,$query);
		   echo "<script>window.open('index.php','_self')</script>";
		   
	   }
	}
}
function cartupdate(){
	global $con;
		if(isset($_POST['update'])){
			foreach($_POST['remove'] as $remove_id){
			$delete_product ="DELETE FROM `cart` WHERE `cart`.`p_id` = '$remove_id'";
			$run_delete= mysqli_query($con,$delete_product);
			if($run_delete){
				echo"<script>window.open('cart.php','_self')</script>";
				}
							}
						}
				if(isset($_POST['continue'])){
				echo"<script>window.open('index.php','_self')</script>";
							}
						}
						
						
function itmes(){
	
	
	if(isset($_GET['add_cart'])){
		global $con;
		$ip_add = getRealIpAddr();
		
		$get_itmes = "select * from cart where ip_add = '$ip_add'";
		$run_items = mysqli_query($con,$get_itmes);
		$count = mysqli_num_rows($run_items);
	}
	else{
		global $con;
		
		$ip_add = getRealIpAddr();
		
		$get_itmes = "select * from cart where ip_add = '$ip_add'";
		$run_items = mysqli_query($con,$get_itmes);
		$count = mysqli_num_rows($run_items);
		
	}
		echo $count;
	
}


function Totalprice(){
	
		global $con;
		$ip_add = getRealIpAddr();
		$total=0;
		
		$get_price = "select * from cart where ip_add = '$ip_add'";
		$run_price = mysqli_query($con,$get_price);
		while($count = mysqli_fetch_array($run_price )){
			$pro_id= $count['p_id'];
			$pro_price = "SELECT * FROM `product` WHERE pro_id='$pro_id'";
			$run_pro_price = mysqli_query($con,$pro_price);
			while($p_price = mysqli_fetch_array($run_pro_price)){
				$product_price=array($p_price['pro_price']);
				$values = array_sum($product_price);
				$total+=$values;
			}
		}
		echo "$".$total;
	}

function getPro(){
	 
	 global $con;
	if(!isset($_GET['hum'])){
	 if(!isset($_GET['cat'])){
		 
		 if(!isset($_GET['brand'])){
			 
						$get_products ="select * from product order by rand() LIMIT 0,6";
						 $run_products = mysqli_query($con,$get_products);
						 
						 while($row_products = mysqli_fetch_array($run_products)){
							 
							 $product_id = $row_products['pro_id'];
							 $product_title = $row_products['pro_title'];
							 $product_hum = $row_products['pro_hum'];
							 $product_cat = $row_products['pro_cat'];
							 $product_brand = $row_products['pro_brand'];
							 $product_price = $row_products['pro_price'];
							 $product_image = $row_products['pro_img1'];
							 
							 echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
	 }
}
						 
	
}}
function getHumPro(){
	 
	 global $con;
	 if(isset($_GET['hum'])){
		 
		            $hum_id = $_GET['hum'];
			 
						$get_hum_pro ="select * from product where pro_hum = '$hum_id'";
						 $run_hum_pro = mysqli_query($con,$get_hum_pro);
						 
						 
						 $count = mysqli_num_rows($run_hum_pro);
							 
							 if($count==0){
								 echo "
										<h5 style='margin-top:100px;'class='text-danger'> No found products !</h5>";
							 }
						 
						 while($row_hum_pro = mysqli_fetch_array($run_hum_pro)){
							 
							 $product_id = $row_hum_pro['pro_id'];
							 $product_title = $row_hum_pro['pro_title'];
							 $product_hum = $row_hum_pro['pro_hum'];
							 $product_cat = $row_hum_pro['pro_cat'];
							 $product_brand = $row_hum_pro['pro_brand'];
							 $product_price = $row_hum_pro['pro_price'];
							 $product_image = $row_hum_pro['pro_img1'];
							 
							 echo"<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
	 }
}

function getCatPro(){
	 
	 global $con;
	 
	 
	 
	 if(isset($_GET['cat'])){
		 
		            $cat_id = $_GET['cat'];
			 
						$get_cat_pro ="select * from product where pro_cat = '$cat_id'";
						 $run_cat_pro = mysqli_query($con,$get_cat_pro);
						 
						 
						 $count = mysqli_num_rows($run_cat_pro);
							 
							 if($count==0){
								 echo " <h5 style='margin-top:20px; font-size:20px;'  class='text-danger text-center'> No found products !</h5>";
							 }
						 
						 while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
							 
							 $product_id = $row_cat_pro['pro_id'];
							 $product_title = $row_cat_pro['pro_title'];
							 $product_hum = $row_cat_pro['pro_hum'];
							 $product_cat = $row_cat_pro['pro_cat'];
							 $product_brand = $row_cat_pro['pro_brand'];
							 $product_price = $row_cat_pro['pro_price'];
							 $product_image = $row_cat_pro['pro_img1'];
							 
							  echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
	 }
}

function getBrandPro(){
	 
	 global $con;
	 
	 
	 
	 if(isset($_GET['brand'])){
		 
		            $brand_id = $_GET['brand'];
			 
						$get_brand_pro ="select * from product where pro_brand = '$brand_id'";
						 $run_brand_pro = mysqli_query($con,$get_brand_pro);
						 
						 
						 $count = mysqli_num_rows($run_brand_pro);
							 
							 if($count==0){
								 
								 echo "<h5 style='margin-top:100px;'class='text-danger'> No found products !</h5>";
							 }
						 
						 while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
							 
							 $product_id = $row_brand_pro['pro_id'];
							 $product_title = $row_brand_pro['pro_title'];
							 $product_hum = $row_brand_pro['pro_hum'];
							 $product_cat = $row_brand_pro['pro_cat'];
							 $product_brand = $row_brand_pro['pro_brand'];
							 $product_price = $row_brand_pro['pro_price'];
							 $product_image = $row_brand_pro['pro_img1'];
							 
							echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
	 }
	 }

	/*hum cat brnd */

	function getHum(){
	global $con;
	
	$get_hum_cats = "SELECT * FROM `humnes_cats`"; 
						 $run_hum_cats = mysqli_query($con,$get_hum_cats);
					      while ($row_hum_cats = mysqli_fetch_array($run_hum_cats)){
							  $hum_id = $row_hum_cats['hum_id'];
							  $hum_title = $row_hum_cats['hum_title'];
							   echo "<li class='text-center'><a href='index.php?hum= $hum_id'>$hum_title</a></li>";
					 }
	
}	
function getCat(){
	global $con;
	
	                     $get_cats = "SELECT * FROM  `categories`"; 
						 $run_cats = mysqli_query($con,$get_cats);
					      while ($row_cats = mysqli_fetch_array($run_cats)){
							  $cat_id = $row_cats['cat_id'];
							  $cat_title = $row_cats['cat_title'];
							  echo "<div class='panel-heading text-center'>
								 <h4 class='panel-title'><a href='index.php?cat= $cat_id'>$cat_title</a></h4>
							 </div>";
							 }
	
}	

function getBrand(){
	global $con;	
	
	                   $get_brands = "SELECT * FROM  `brands`"; 
						 $run_brands = mysqli_query($con,$get_brands);
					      while ($row_brands = mysqli_fetch_array($run_brands)){
							  $brand_id = $row_brands['brand_id'];
							  $brand_title = $row_brands['brand_title'];
							  echo "<div class='panel-heading text-center'>
								 <h4 class='panel-title'><a href='index.php?brand= $brand_id'>$brand_title</a></h4>
							 </div>";
							 }
	
}



function getDetailes(){
	global $con;

if(isset($_GET['pro_id'])){
							 
							 $product_id = $_GET['pro_id'];
							 
							 $get_products ="select * from product where pro_id = '$product_id'";
						 $run_products = mysqli_query($con,$get_products);
						 
						 while($row_products = mysqli_fetch_array($run_products)){
							 
							 
							 
							 
							 $product_id = $row_products['pro_id'];
							 $product_title = $row_products['pro_title'];
							 $product_cat = $row_products['pro_cat'];
							 $product_brand = $row_products['pro_brand'];
							 $product_price = $row_products['pro_price'];
							 $product_desc = $row_products['pro_desc'];
							 $product_image1 = $row_products['pro_img1'];
							 $product_image2 = $row_products['pro_img2'];
							 $product_image3 = $row_products['pro_img3'];
							 
							 echo "
							 <h5 class='text-info text-center'style='margin-top:10px; font-size:18px;'>$product_title</h5>
							<div class='col-sm-5'>
							<div class='view-product'>
							
								<img src='admin_area/product_images/$product_image2' class='img-responsive' alt='' />
								 	
							</div>
						</div>
						<div class='col-sm-7'>
							<div class='product-information'>
							<div class='col-sm-12'>
								<p class='text-left'style='margin-left:50px;margin-right:35px;'>$product_desc</p>
								</div>
								<div class='col-sm-12' style='margin-top:10px'>
								<div class='col-sm-4'>
								<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart' ><i class='fa fa-shopping-cart'></i>Add to cart</a>
								</div>
								<div class='col-sm-4 text-center'>
								<h2>$ $product_price</h2>
								</div>
								<div class='col-sm-4'>
								<a href='index.php?pro_id=$product_id' class='btn btn-default add-to-cart' ><i class='fa fa-home'></i>Go Home</a>
								</div>
								</div>
								</div><!--/product-information-->
						</div>
						<div class='col-sm-12'>
							      <div class='product-image-wrapper'>
								  <div class='single-products'>
							                <div class='productinfo text-center'>
											<img src='admin_area/product_images/$product_image1' class='img-responsive ' alt='' style='padding:15px;width:200px;height:200px; display:inline' />
											<img src='admin_area/product_images/$product_image2' class='img-responsive' alt='' style='padding:15px;width:200px;height:200px; display:inline' />
											<img src='admin_area/product_images/$product_image3' class='img-responsive ' alt='' style='padding:15px;width:200px;height:200px; display:inline' />
											</div>
											</div>
							   </div>
							</div>";
						 }
						 }
						 
					}
					
					
					
function getAllProducts(){
	global $con;					
					$get_products ="select * from product order by rand()";
						 $run_products = mysqli_query($con,$get_products);
						 
						 while($row_products = mysqli_fetch_array($run_products)){
							 
							 $product_id = $row_products['pro_id'];
							 $product_title = $row_products['pro_title'];
							 $product_hum = $row_products['pro_hum'];
							 $product_cat = $row_products['pro_cat'];
							 $product_brand = $row_products['pro_brand'];
							 $product_price = $row_products['pro_price'];
							 $product_image = $row_products['pro_img1'];
							 
							 echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
						 }
						 
function getSearch(){
	global $con;	 
						 
 if(isset($_GET['search_btn'])){
							 
							 $user_search = $_GET['search'];
							 
							$get_products ="select * from product where pro_keyword like '%$user_search%'";
						 $run_products = mysqli_query($con,$get_products);
						 
						 while($row_products = mysqli_fetch_array($run_products)){
							 $product_id = $row_products['pro_id'];
							 $product_title = $row_products['pro_title'];
							 $product_cat = $row_products['pro_cat'];
							 $product_brand = $row_products['pro_brand'];
							 $product_price = $row_products['pro_price'];
							 $product_desc = $row_products['pro_desc'];
							 $product_image = $row_products['pro_img1'];
							 echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>$product_title</h5>
											<img src='admin_area/product_images/$product_image' class='img-responsive' alt='' style='padding:15px;height:250px;' />
											<h5>$$product_price</h5>
											<a href='detailes.php?pro_id=$product_id' class='btn btn-default add-to-cart' style='flot:left;'>Details</a>
											<a href='index.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										 	</div>
											</div>
							</div>
						 </div>";
						 }
						 }
						 else{
							 echo "<div class='col-sm-4'>
							<div class='product-image-wrapper'>
								<div class='single-products'>
							 <div class='productinfo text-center'>
											 <h5 style='margin-top:10px;'>No Found Products !</h5>
											</div>
											</div>
							</div>
						 </div>";
						 }
						 }			

function getDefault(){
	global $con;
	$cm=$_SESSION['custom_email'];
	$get_cm="SELECT * FROM `customers` WHERE custom_email='$cm'";
	$run_cm=mysqli_query($con,$get_cm);
	$row_cm=mysqli_fetch_array($run_cm);
		$customer_id=$row_cm['custom_id'];
		
		if(!isset($_GET['my_order'])){
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['change_password'])){
					if(!isset($_GET['delet account'])){
						$get_order="SELECT * FROM `customer_order` WHERE custom_id='$customer_id' AND order_status='panding'";
						$run_order=mysqli_query($con,$get_order);
						$count_order=mysqli_num_rows($run_order);
						if($count_order>0){
							echo"<div align='center'>
							<h1 class='text-danger' style='text-decoration:underline'> IMPORTANT !</h1>
							<h2 class='text-success'>You have $count_order Pandding orders</h2>
							<h3 > Plz see ur order detailes by clicking this <a href='customer_my_Account.php?my_order'>Link</a><br>OR You can <a href='checkout.php'>Payments</a></h3>
							
							</div>";
						}else{
								echo"<div align='center'>
							<h1 class='text-danger' style='text-decoration:underline'> IMPORTANT !</h1>
							<h2 class='text-success'>You have no Pandding orders</h2>
							<h3 > u can see ur ordered Histroy by clicking this <a href='custmer_my_account.php?my_order'>Link</a></h3>
							
							</div>";						
						}
	}
	}}}}
						 
?>