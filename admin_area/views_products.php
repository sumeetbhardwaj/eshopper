 <?php 

include_once('includes/db_connection.php');

?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>VIEW ALL PRODECTS</h2>   
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
							<td >Product Id</td>
							<td >Product Titel</td>
							<td >Product Image</td>
							<td >Price</td>
							<td >Total Sold</td>
							<td >Status </td>
							<td >Edit</td>
							<td >Delete</td>
						</tr>
					</thead>
					<?php
					 $i=0;
					   $get_product= "SELECT * FROM `product`";
					   $query = mysqli_query($con,$get_product);
					   while($view_row= mysqli_fetch_array($query)){
						   
						   $product_id =$view_row['pro_id'];
						   $product_title =$view_row['pro_title'];
						   $product_img1 =$view_row['pro_img1'];
						   $product_price =$view_row['pro_price'];
						   $status =$view_row['status'];
						   $product_id =$view_row['pro_id'];
						   $i++;
					   
		?>
					<tbody >
						<tr class=" text-center">
							<td>
								<h4><?php echo $i;?></h4> 		
							</td>
							<td>
								<h4><?php echo $product_title;?></h4>
							</td>
							<td>
								<p><img src="product_images/<?php echo $product_img1?>" style="width:80px;height:80px"/></p>
							</td>
							<td>
									<h4>$<?php echo $product_price?></h4>
							</td>
							<td ><h4><?php
							$get_sold ="SELECT * FROM `pandding_order` WHERE product_id='$product_id'";
							$run_sold=mysqli_query($con,$get_sold);
							$count = mysqli_num_rows($run_sold);
							echo $count;
							?></h4></td>
							<td ><h4><?php echo $status ?></h4> </td>
							<td ><h4><a href="admin.php?edit_products=<?php echo $product_id;?>">Edit</a></h4></td>
							<td ><h4><a href="admin.php?delete_products=<?php echo $product_id;?>">Delete</a></h4></td>
							
							</tr>
							
						
						<?php }?>
						
					</tbody>
				</table>
				</div>
		  </form>
	<?php 

?>
                         </div>
						 
                    </div>
					 </div>	
             