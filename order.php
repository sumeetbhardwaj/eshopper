<?php 
@session_start();
include_once('includes/connection.php');
include_once('functions/function.php');

if(isset($_GET['custom_id'])){
	$customer_id= $_GET['custom_id'];
	
	 $insert="SELECT * FROM `customers` WHERE custom_id = '$customer_id'";
	 
	$select_query=mysqli_query($con,$insert);
	$show_costomer= mysqli_fetch_array($select_query);
	$custome_name=$show_costomer['custom_name'];
	$custome_email=$show_costomer['custom_email'];
}

       $ip_add = getRealIpAddr();
		$total=0;
		
		$get_price = "select * from cart where ip_add = '$ip_add'";
		$run_price = mysqli_query($con,$get_price);
		$status='Panding';
		$invoice_no= mt_rand();
		$i=0;
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
		$insert="INSERT INTO `customer_order` ( `custom_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`)
		VALUES ( '$customer_id', '$sub_total', '$invoice_no', '$count_pro', CURRENT_TIMESTAMP, '$status')";
		$query=mysqli_query($con,$insert);
		
			echo"<script> window.open('customer_my_account.php','_self')</script>";
			
			
			
			$insert_to_panding_order="INSERT INTO `pandding_order` (`custom_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES ('$customer_id', '$invoice_no', '$pro_id', '$qty', '$status')";
			$run_panding_order=mysqli_query($con,$insert_to_panding_order);
			
			$empty_cart="DELETE FROM `cart` WHERE ip_add='$ip_add'";
			$run_empty=mysqli_query($con,$empty_cart);
		
									$to = "$custome_email";
									$subject= "Order Details";
									$message ="<html>
									<table class='table table-bordered'>
					              <thead class='info text-info text-center'>
						<tr class='cart_menu' style='background:#FE980F;color:#fff;height:50px'>
							<td >Sr.No</td>
							<td > Products Name</td>
							<td >Quantity</td>
							<td >total Price</td>
							<td >Invoice No</td>
							
						</tr>
					</thead>
					ody class='text-center'>
						<tr>
							<td>
								<?php $i;?> 		
							</td>
							<td>
								<h4>$ $product_name;</h4>
							</td>
							<td>
								<p> $qty;</p>
							</td>
							<td>
								<p>  $sub_total;</p>	
							</td>
							<td>
								<p> $invoice_no ;</p>	
							</td>
							</tr>
							
						
						<?php }?>
						
					</tbody>
				</table>
</html";
									$headers= "From:E-Shoper<info@echoper.com>";
									if(mail($to,$subject,$message,$headers)){
										 echo"<script>window.open('customer_my_Account.php','_self')</script>";
									}									
 ?>