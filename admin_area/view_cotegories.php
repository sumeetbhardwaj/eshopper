 <?php 

include_once('includes/db_connection.php');

?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>VIEW ALL CATEGORY</h2>   
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
							<td >CATEGORY ID</td>
							<td >CATEGORY TITLE</td>
							<td >EDIT</td>
							<td >DELETE</td>
						</tr>
					</thead>
					<?php
					 $i=0;
					   $get_cat= "SELECT * FROM `categories` ";
					   $query = mysqli_query($con,$get_cat);
					   while($view_row= mysqli_fetch_array($query)){
						   
						   $cat_id =$view_row['cat_id'];
						   $cat_title =$view_row['cat_title'];
						   $i++;
					   
		?>
					<tbody >
						<tr class=" text-center">
							<td>
								<h4><?php echo $i;?></h4> 		
							</td>
							<td>
								<h4><?php echo $cat_title;?></h4>
							</td>
							<td ><h4><a href="admin.php?edit_cotegories=<?php echo $cat_id;?>">EDIT</a></h4></td>
							<td ><h4><a href="admin.php?delete_cotegories=<?php echo $cat_id;?>">DELETE</a></h4></td>
							
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
             