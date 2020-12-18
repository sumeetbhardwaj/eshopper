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
			if(isset($_GET['edit_cotegories'])){
				$edit_id = $_GET['edit_cotegories'];
				
			 $get_cat="SELECT * FROM `categories` WHERE cat_id='$edit_id'";
			 $run_cat= mysqli_query($con,$get_cat);
			 $row_cat=mysqli_fetch_array($run_cat);
			   $cat_id=$row_cat['cat_id'];
			   $cat_title=$row_cat['cat_title'];
			   }
			?> 
		  <table class="table table-bordered table-hover" >
				<tr class="success"><td align="right"> Category Title</td>
				<td class="success"><input type="text" name="cat_title" value="<?php echo $cat_title ;?>"size="50"/></td></tr>
				<tr class="success"><th colspan="2"><input type="submit"  name="edit_cat" style="margin-left:400px;" value="Upload Top Category"/></th></tr>
		  </table>
		  </form>
	<?php 



if(isset($_POST['edit_cat'])){
	
	 $cat_title = mysqli_real_escape_string($con,$_POST['cat_title']);
	 
		 $update = " UPDATE `categories` SET cat_title='$cat_title' WHERE cat_id=$cat_id ";
		 $query = mysqli_query($con,$update);
	
	if($query){
		
		echo "<script>alert('Successfull update  Category')</script>";
		echo "<script>window.open('admin.php?view_cotegories','_self')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		
	
	
	
	
	


?>
                         </div>
						 
                    </div>
					 </div>	
             