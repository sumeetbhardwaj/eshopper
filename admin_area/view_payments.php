 <?php 

include_once('includes/db_connection.php');



?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>VIEW ALL PAYMENTS</h2>   
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
							<td >Payment Id</td>
							<td >Invoice No </td>
							<td >Amount Paid</td>
							<td >Payment Method</td>
							<td >Transaction</td>
							<td >Code</td>
							<td >Payment Date</td>
							
						</tr>
					</thead>
					<?php

					
			$select_payment="SELECT * FROM `payments`";
			$select_query= mysqli_query($con,$select_payment);
			$i=0;
			while($update= mysqli_fetch_array($select_query)){
			$i++;
			$payment_id= $update['payment_id'];
	        $invoice= $update['invoice_No'];
			$amount= $update['amount'];
			$method= $update['payment_method'];
			$transaction= $update['tr'];
			$code= $update['code'];
			$date= $update['date'];
			
			
			
					   
		?>
					<tbody >
						<tr class=" text-center">
							<td><h4><?php echo $i;?></h4></td>
							<td><h4><?php echo $invoice ?></h4></td>
							<td><h4><?php echo $amount?></h4></td>
							<td ><h4><?php echo $method?></h4></td>
							<td ><h4><?php echo $transaction ?></h4></td>
							<td ><h4><?php echo $code ?></h4></td>
							<td ><h4><?php echo $date ?></h4></td>
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
             