 <?php 

include_once('includes/db_connection.php');

?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>VIEW ALL CUSTOMERS</h2>   
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
							<td >SR. NO</td>
							<td >CUSTOMER NAME</td>
							<td >CUSTOMER EMAIL</td>
							<td >CUSTOMER IMAGE</td>
							<td >CUSTOMER COUNTRY</td>
							<td >CUSTOMER ADDRESS</td>
							<td >CUSTOMER MOBILE NO</td>
							<td >Delete</td>
						</tr>
					</thead>
					<?php
					 $i=0;
			$select_customer="SELECT * FROM `customers`";
			$select_query= mysqli_query($con,$select_customer);
			while($update= mysqli_fetch_array($select_query)){
			
			$custom_id= $update['custom_id'];
	        $custom_name= $update['custom_name'];
			$email= $update['custom_email'];
			$custom_country= $update['custom_country'];
			$custom_mob= $update['custom_mob'];
			$custom_address= $update['custom_address'];
			$custom_image= $update['custom_image'];
						   $i++;
					   
		?>
					<tbody >
						<tr class=" text-center">
							<td>
								<h4><?php echo $i;?></h4> 		
							</td>
							<td>
								<h4><?php echo $custom_name?></h4>
							</td>
							<td>
									<h4><?php echo $email?></h4>
							</td>
							<td>
								<p><img src="../customer/customer_images/<?php echo $custom_image?>" style="width:80px;height:80px"/></p>
							</td>
							
							<td ><h4><?php echo $custom_country ?></h4> </td>
							<td ><h4><?php echo $custom_address ?></h4></td>
							<td ><h4><?php echo $custom_mob ?></h4> </td>
							<td ><h4><a href="admin.php?delete_customers=<?php echo $custom_id;?>">Delete</a></h4></td>
							
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
             