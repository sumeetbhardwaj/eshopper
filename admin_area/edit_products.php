 <?php 

include_once('includes/db_connection.php');

?>


 <div class="row">
                    <div class="col-md-12">
                     <h2>EDIT PRODECTS</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
			<?php 
			if(isset($_GET['edit_products'])){
				$edit_id = $_GET['edit_products'];
				
			 $get_pro="SELECT * FROM `product` WHERE pro_id='$edit_id'";
			 $run_pro= mysqli_query($con,$get_pro);
			 $row_pro=mysqli_fetch_array($run_pro);
			   $product_id=$row_pro['pro_id'];
			   $product_title=$row_pro['pro_title'];
			   $product_hum=$row_pro['pro_hum'];
			   $product_cat=$row_pro['pro_cat'];
			   $product_brand=$row_pro['pro_brand'];
			   $product_img1=$row_pro['pro_img1'];
			   $product_img2=$row_pro['pro_img2'];
			   $product_img3=$row_pro['pro_img3'];
			   $product_price=$row_pro['pro_price'];
			   $product_desc=$row_pro['pro_desc'];
			   $product_status=$row_pro['status'];
			   $product_keyword=$row_pro['pro_keyword'];
			   $hum_title=$product_hum;
			}
			$get_hum = "SELECT * FROM `humnes_cats` WHERE hum_id = '$product_hum'";
			$run_hum=mysqli_query($con,$get_hum);
			$row_hum= mysqli_fetch_array($run_hum);
		      $hum_title = $row_hum['hum_title'];
			  
			  $get_cat = "SELECT * FROM `categories` WHERE cat_id = '$product_cat'";
			$run_cat=mysqli_query($con,$get_cat);
			$row_cat= mysqli_fetch_array($run_cat);
		      $cat_title = $row_cat['cat_title'];
			  
			  $get_brand = "SELECT * FROM `brands` WHERE brand_id = '$product_brand'";
			$run_brand=mysqli_query($con,$get_brand);
			$row_brand= mysqli_fetch_array($run_brand);
		      $brand_title = $row_brand['brand_title'];
			
			
			?> 
		  <table class="table table-bordered table-hover" >
				<tr class="success"><td align="right"> Product Title</td>
				<td class="success"><input type="text" name="pro_title" value="<?php echo $product_title ;?>"size="50"/></td></tr>
				<tr class="success"><td align="right"> Top Products </td>
				<td ><select name="pro_hum" >
				<option value="<?php echo $product_hum;?>"><?php echo $hum_title ;?></option>
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
				<option value="<?php echo $product_cat ;?>"> <?php echo $cat_title ;?></option>
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
					<option value="<?php echo $product_brand;?>"><?php echo $brand_title ;?></option>
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
				<td><input type="file" name="pro_img1"/><img src="product_images/<?php echo $product_img1 ;?> " style="width:80px;height:80px;"required/></td></tr>
				<tr class="success"><td align="right"> Product Image 2</td>
				<td><input type="file" name="pro_img2"/><img src="product_images/<?php echo $product_img2 ;?> " style="width:80px;height:80px;"required/></td></tr>
				<tr class="success"><td align="right"> Product Image 3</td>
				<td><input type="file" name="pro_img3"/><img src="product_images/<?php echo $product_img3 ;?> " style="width:80px;height:80px;" required/></td></tr>
				<tr class="success"><td align="right"> Product Price</td>
				<td><input type="text" name="pro_price" value="<?php echo $product_price ;?>"/></td></tr>
				<tr class="success"><td align="right"> Product descrpsion</td>
				<td><textarea rows="10" cols="50" name="Pro_desc"><?php echo $product_desc ;?></textarea ></td></tr>
				<tr class="success"><td align="right" > Product Keyword</td>
				<td><input type="text" name="pro_keyword" value="<?php echo $product_keyword ;?>" size="50"/></td></tr>
				<tr class="success"><th colspan="2"><input type="submit"  name="edit_pro" style="margin-left:400px;" value="Upload Product"/></th></tr>
		  </table>
		  </form>
	<?php 



if(isset($_POST['edit_pro'])){
	
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

		 $update = " UPDATE `product` SET pro_hum='$product_hum',pro_cat='$product_cat',
		 pro_brand='$product_brand',date=now(),pro_title='$product_title',pro_img1='$product_img1',pro_img2='$product_img2',
		 pro_img3='$product_img3',pro_price='$product_price',pro_desc='$product_desc',status='$status',pro_keyword='$product_keyword' WHERE pro_id=$product_id ";
		 $query = mysqli_query($con,$update);
	
	if($query){
		
		echo "<script>alert('Successfull update Products')</script>";
		echo "<script>window.open('admin.php?views_products','_self')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		
	
	
	
	
	


?>
                         </div>
						 
                    </div>
					 </div>	
             