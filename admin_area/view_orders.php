 <?php 

include_once('includes/db_connection.php');



?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>VIEW ALL ORDERS</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
						 <form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
		  <div class="table table-responsive table-hover" >
		  <table class="table table-bordered">
					<thead class=" info text-info ">
						<tr class="cart_menu text-center" style="background:#FE980F;color:#fff;height:50px">
							<td >ORDER NO</td>
							<td >CUSTOMER </td>
							<td >INVOICE NO</td>
							<td >PRODUCT ID</td>
							<td >QTY</td>
							<td >STATUS</td>
							<td >Delete</td>
						</tr>
					</thead>
					<?php

					
			$select_order_panding="SELECT * FROM `pandding_order` ";
			$select_query= mysqli_query($con,$select_order_panding);
			$i=0;
			while($update= mysqli_fetch_array($select_query)){
			$i++;
			$order_id= $update['order_id'];
	        $custom_id= $update['custom_id'];
			$invoice= $update['invoice_no'];
			$product_id= $update['product_id'];
			$qty= $update['qty'];
			$status= $update['order_status'];
			
			
			
					   
		?>
					<tbody >
						<tr class=" text-center">
							<td><h4><?php echo $i;?></h4></td>
							<td><h4><?php echo $custom_id; ?></h4></td>
							<td><h4><?php echo $invoice?></h4></td>
							<td ><h4><?php echo $product_id?></h4></td>
							<td ><h4><?php echo $qty ?></h4></td>
							<td ><h4><?php if($status =='Panding'){echo  $status="Panding";} else {echo $status="Complete";}?></h4> </td>
							<td ><h4><a href="admin.php?delete_orders=<?php echo $order_id;?>">Delete</a></h4></td>
							
							</tr>
					</tbody>
					<?php }?>
				</table>
				</div>
		  </form>
	<?php 

?>
                         </div>
						 
                    </div>
					 </div>	
             