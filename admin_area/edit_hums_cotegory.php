 <?php 

include_once('includes/db_connection.php');

?>


 <div class="row">
                    <div class="col-md-12">
                     <h2>EDIT TOP CATEGORY</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
			<?php 
			if(isset($_GET['edit_hums_cotegory'])){
				$edit_id = $_GET['edit_hums_cotegory'];
				
			 $get_hum="SELECT * FROM `humnes_cats` WHERE hum_id='$edit_id'";
			 $run_hum= mysqli_query($con,$get_hum);
			 $row_hum=mysqli_fetch_array($run_hum);
			   $hum_id=$row_hum['hum_id'];
			   $hum_title=$row_hum['hum_title'];
			   }
			?> 
		  <table class="table table-bordered table-hover" >
				<tr class="success"><td align="right"> Top Category Title</td>
				<td class="success"><input type="text" name="hum_title" value="<?php echo $hum_title ;?>"size="50"/></td></tr>
				<tr class="success"><th colspan="2"><input type="submit"  name="edit_hum" style="margin-left:400px;" value="Upload Top Category"/></th></tr>
		  </table>
		  </form>
	<?php 



if(isset($_POST['edit_hum'])){
	
	 $hum_title = mysqli_real_escape_string($con,$_POST['hum_title']);
	 
		 $update = " UPDATE `humnes_cats` SET hum_title='$hum_title' WHERE hum_id=$hum_id ";
		 $query = mysqli_query($con,$update);
	
	if($query){
		
		echo "<script>alert('Successfull update Top Category')</script>";
		echo "<script>window.open('admin.php?view_hums_cotegory','_self')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		
	
	
	
	
	


?>
                         </div>
						 
                    </div>
					 </div>	
             