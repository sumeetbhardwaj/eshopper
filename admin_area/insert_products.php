 <?php 

include_once('includes/db_connection.php');

?>
<?php @session_start();
if(isset($_SESSION['admin_user'])){
	 
 }
 else{
	 echo"<script> window.open('index.php','_self')</script>";
 }
?>
	

 <div class="row">
                    <div class="col-md-12">
                     <h2>INSERT NEW PRODECTS</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
						 <form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
		  <table class="table table-bordered table-hover" >
				<tr class="success"><td align="right"> Product Title</td>
				<td class="success"><input type="text" name="pro_title" size="50"/></td></tr>
				<tr class="success"><td align="right"> Top Products </td>
				<td ><select name="pro_hum">
				<option> Select Categories</option>
				<?php
				      $get_hum_cats = "SELECT * FROM `humnes_cats`"; 
						 $run_hum_cats = mysqli_query($con,$get_hum_cats);
					      while ($row_hum_cats = mysqli_fetch_array($run_hum_cats)){
							  $hum_id = $row_hum_cats['hum_id'];
							  $hum_title = $row_hum_cats['hum_title'];
							 echo "<option value='$hum_id'>$hum_title</option>";
					 
					 }
					 ?>
					 
				
				
				</select></td></tr>
				<tr class="success"><td align="right"> Product Categories</td>
				<td ><select name="pro_cat">
				<option> Select Categories</option>
				<?php
				      $get_cats = "SELECT * FROM  `categories`"; 
						 $run_cats = mysqli_query($con,$get_cats);
					      while ($row_cats = mysqli_fetch_array($run_cats)){
							  $cat_id = $row_cats['cat_id'];
							  $cat_title = $row_cats['cat_title'];
							 echo "<option value='$cat_id'>$cat_title</option>";
					 
					 }
					 ?>
					 
				
				
				</select></td></tr>
				<tr class="success"><td align="right"> Product Brands</td>
				<td><select name="pro_brand">
					<option>Select Brands</option>
					<?php
					 
					
						 $get_brands = "SELECT * FROM  `brands`"; 
						 $run_brands = mysqli_query($con,$get_brands);
					      while ($row_brands = mysqli_fetch_array($run_brands)){
							  $brand_id = $row_brands['brand_id'];
							  $brand_title = $row_brands['brand_title'];
							 echo "<option value = $brand_id'>$brand_title</option>";
					 
					 }
					 ?>
				</select></td></tr>
				<tr class="success"><td align="right"> Product Image 1</td>
				<td><input type="file" name="pro_img1"/></td></tr>
				<tr class="success"><td align="right"> Product Image 2</td>
				<td><input type="file" name="pro_img2"/></td></tr>
				<tr class="success"><td align="right"> Product Image 3</td>
				<td><input type="file" name="pro_img3"/></td></tr>
				<tr class="success"><td align="right"> Product Price</td>
				<td><input type="text" name="pro_price"/></td></tr>
				<tr class="success"><td align="right"> Product descrpsion</td>
				<td><textarea rows="10" cols="50" name="Pro_desc"></textarea ></td></tr>
				<tr class="success"><td align="right" > Product Keyword</td>
				<td><input type="text" name="pro_keyword" size="50"/></td></tr>
				<tr class="success"><th colspan="2"><input type="submit"  name="insert_data" style="margin-left:400px;" value="Upload Product"/></th></tr>
		  </table>
		  </form>
	<?php 



if(isset($_POST['insert_data'])){
	
	 $product_title = mysqli_real_escape_string($con,$_POST['pro_title']);
	  $product_hum = mysqli_real_escape_string($con,$_POST['pro_hum']);
	 $product_cat = mysqli_real_escape_string($con,$_POST['pro_cat']);
		$product_brand = mysqli_real_escape_string($con,$_POST['pro_brand']);
	 $product_price = mysqli_real_escape_string($con,$_POST['pro_price']);
	 $product_desc = mysqli_real_escape_string($con,$_POST['Pro_desc']);
	 $product_keyword = mysqli_real_escape_string($con,$_POST['pro_keyword']);
	 $status = 'on';
	
	 $product_img1 = $_FILES['pro_img1']['name'];
	 $product_img2 = $_FILES['pro_img2']['name'];
	 $product_img3 = $_FILES['pro_img3']['name'];
	 
	 $temp_name1 = $_FILES['pro_img1']['tmp_name'];
	 $temp_name2 = $_FILES['pro_img2']['tmp_name'];
	 $temp_name3 = $_FILES['pro_img3']['tmp_name'];
	 
	      move_uploaded_file($temp_name1,"product_images/$product_img1");
		  move_uploaded_file($temp_name2,"product_images/$product_img2");
		  move_uploaded_file($temp_name3,"product_images/$product_img3");

	
	if($product_title == ""){
		echo "<script> alert('Please Enter product_title')</script>";
		
	}
	if(	 $product_cat == ""){
		echo "<script> alert('Please Select product_cat')</script>";
		
	}
	if($product_brand == ""){
		echo "<script> alert('Please Select product_brand')</script>";
		exit();
		
	}    
    
	if( $product_price == ""){
		echo "<script> alert('Please Enter product_price')</script>";
		
	}
	if($product_desc == ""){
		echo "<script> alert('Please Enter Your Gander')</script>";
		
	}
	if(	 $product_keyword == ""){
		echo "<script> alert(' Please Enter product_keyword')</script>";
		
	}
		 		 
		 $insert =  "INSERT INTO `product` ( `pro_hum`,`pro_cat`, `pro_brand`, `date`, `pro_title`,`pro_img1`,`pro_img2`,`pro_img3`, `pro_price`, `Pro_desc`, `status`,`pro_keyword`)
		 VALUES ('$product_hum','$product_cat', '$product_brand', NOW(), '$product_title','$product_img1','$product_img2','$product_img3', '$product_price', '$product_desc','$status', '$product_keyword')";
		 $query = mysqli_query($con,$insert);
	
	if($query){
		
		echo "<script>alert('Successfull Insert Products')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		
	
	
	
	
	


?>
                         </div>
						 
                    </div>
					 </div>	
             