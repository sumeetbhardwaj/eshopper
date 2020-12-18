<?php include_once('head.php');?>
<body>
<?php include_once('templates/cartheader.php');?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
						 
				  <h2 class="text-center text-success"> Payments Options For You</h2>
						<div class="panel panel-primary" style="margin-top:10px;">
                        <div class="panel-body" style="margin-top:20px;">
						<?php
						
						$get_customer_image="SELECT * FROM `customers` WHERE custom_email='$customer_session'";
						$run_customer=mysqli_query($con,$get_customer_image);
						$customer_pic=mysqli_fetch_array($run_customer);
						$custom_id=$customer_pic['custom_id'];
						
						$ip_add = getRealIpAddr();
		$total=0;
		$i=0;
		$get_price = "select * from cart where ip_add = '$ip_add'";
		$run_price = mysqli_query($con,$get_price);
		$status='Panding';
		$invoice_no= mt_rand();
		$count_pro= mysqli_num_rows($run_price);
		while($count = mysqli_fetch_array($run_price )){
			$pro_id= $count['p_id'];
			$pro_price = "SELECT * FROM `product` WHERE pro_id='$pro_id'";
			$run_pro_price = mysqli_query($con,$pro_price);
			while($p_price = mysqli_fetch_array($run_pro_price)){
				$product_name=$p_price['pro_title'];
				$product_price=array($p_price['pro_price']);
				$values = array_sum($product_price);
				$total+=$values;
				$i++;
			}
		}
		
		
		$get_cart="SELECT * FROM `cart`";
		$run_cart= mysqli_query($con,$get_cart);
		$get_query=mysqli_fetch_array($run_cart);
		$qty=$get_query['qty']; 
		if($qty==0){
			$qty=1; 
			$sub_total=$total;
		}
		else{
			$qty=$qty;
			$sub_total=$total*$qty;
		}

						
						
						
						
						?>
						<div class="col-sm-5">
						<h2 class="text-left text-info">Onlin Payments With Paypal</h2>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="bussinesstest@eshoper.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_name;?>">
  <input type="hidden" name="amount" value="<?php echo $sub_total;?>">
  <input type="hidden" name="currency_code" value="USD">

  <!-- Display the payment button. -->
  <input type="image" class="btn" name="submit" border="0"
  src="images/home/OnlinePay_Button.jpg""
  style="width:400px;height:230px" alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
                       </div >
					    <div class="col-md-2">
					<img src="images/home/OR-Button.png" style="width:100px;height:100px" align="center" alt=""/>
				 </div>
				 <div class="col-sm-5">
				 <h2 class="text-left text-info">Offline Payments </h2>
					<a href="order.php?custom_id=<?php echo $custom_id;?>" style="font-size:20px;">
						 <img  class="btn" src="images/home/apply_offline_payment.jpg" style="width:400px;height:230px" alt=""/></a><br>
						 <b>If you selected "pay offline" then please check your email or account to find the Invoice No for you order</b>
						 
                           
                    </div>
				 
				 
                    </div>
					
			</div>
			</div>		
			</div>
		</div>
	</section><!--/form-->
	<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	

  
    