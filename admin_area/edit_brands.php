 <?php 

include_once('includes/db_connection.php');

?>

 <div class="row">
                    <div class="col-md-12">
                     <h2>EDIT  CATEGORY</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
			<?php 
			if(isset($_GET['edit_brands'])){
				$edit_id = $_GET['edit_brands'];
				
			 $get_brand="SELECT * FROM `brands` WHERE brand_id='$edit_id'";
			 $run_brand= mysqli_query($con,$get_brand);
			 $row_brand=mysqli_fetch_array($run_brand);
			   $brand_id=$row_brand['brand_id'];
			   $brand_title=$row_brand['brand_title'];
			   }
			?> 
		  <table class="table table-bordered table-hover" >
				<tr class="success"><td align="right"> Brand Title</td>
				<td class="success"><input type="text" name="brand_title" value="<?php echo $brand_title ;?>"size="50"/></td></tr>
				<tr class="success"><th colspan="2"><input type="submit"  name="edit_brand" style="margin-left:400px;" value="Upload Top Category"/></th></tr>
		  </table>
		  </form>
	<?php 



if(isset($_POST['edit_brand'])){
	
	 $brand_title = mysqli_real_escape_string($con,$_POST['brand_title']);
	 
		 $update = " UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id=$brand_id ";
		 $query = mysqli_query($con,$update);
	
	if($query){
		
		echo "<script>alert('Successfull update brand')</script>";
		echo "<script>window.open('admin.php?view_brands','_self')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		
	
	
	
	
	


?>
                         </div>
						 
                    </div>
					 </div>	
             