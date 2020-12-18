<?php 
@session_start();
include_once('includes/connection.php');
include_once('functions/function.php');


    $cm=$_SESSION['custom_email'];
	$get_cm="SELECT * FROM `customers` WHERE custom_email='$cm'";
	$run_cm=mysqli_query($con,$get_cm);
	$row_cm=mysqli_fetch_array($run_cm);
		$customer_id=$row_cm['custom_id'];
		
?>
<h4 class=" text-center" style="color:#FE980F;"> All Orders Detailes</h4>
<div class="table-responsive cart_info">
			<form action="" method="post" enctype="multipart/form-date">
				<table class="table table-bordered">
					<thead class=" info text-info text-center">
						<tr class="cart_menu" style="background:#FE980F;color:#fff;height:50px">
							<td >Order No</td>
							<td >Due Amount</td>
							<td >Invoice No</td>
							<td >Total Products</td>
							<td >Order Date</td>
							<td >Paid/Unpaid</td>
							<td >Status </td>
						</tr>
					</thead>
					<?php
					
					   $get_order= "SELECT * FROM `customer_order` WHERE custom_id='$customer_id'";
					   $query = mysqli_query($con,$get_order);
					   $i = 0;
					   while($order_row= mysqli_fetch_array($query)){
						   $order_id= $order_row['order_id'];
						   $due_amount= $order_row['due_amount'];
						   $invoice_no= $order_row['invoice_no'];
						   $products= $order_row['total_products'];
						   $date= $order_row['order_date'];
						   $status= $order_row['order_status'];
						   $order_id= $order_row['order_id'];
						   $i++;
					   if($status=='Panding'){
						   $status='Unpaid';
					   }
					   else{
						   $status='Paid';
					   }
		?>
					<tbody class=" text-center">
						<tr>
							<td>
								<?php echo $i;?> 		
							</td>
							<td>
								<h4>$<?php echo $due_amount;?></h4>
							</td>
							<td>
								<p><?php echo $invoice_no;?></p>
							</td>
							<td>
									<?php echo $products;?></div>
							</td>
							
							<td>
								<p class="cart_total_price"><?php echo $date;?></p>
							</td>
							<td>
								<p class="cart_total_price"><?php echo $status;?></p>
							</td>
							<td>
								<?php echo"<a href='confirm.php?order_id=$order_id'>Confirm If paid</a>";?>
							</td>
							</tr>
							
						
						<?php }?>
						
					</tbody>
				</table>
				
				</form>
			</div>
			