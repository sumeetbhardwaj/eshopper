 <?php 
include_once('includes/db_connection.php');

 @session_start();
if(isset($_SESSION['admin_user'])){
	 
 }
 else{
	 echo"<script> window.open('index.php','_self')</script>";
 }
?>
	

 <div class="row">
                    <div class="col-md-12">
                     <h2>INSERT NEW TOP COTEGORY</h2>   
                    </div>
                </div>
                  <hr />  
				  <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
						 <form action="" method="POST" enctype="multipart/form-data" width="400px" class="success"  >
							  <table class="table table-bordered table-hover" >
							  <tr class="success"><td align="right"> Top Title</td>
								<td class="success"><input type="text" name="hums_title" size="50"/></td></tr>
								<tr class="success"><th colspan="2"><input type="submit"  name="hum_Update" style="margin-left:400px;" value="Upload "/></th></tr>
						  
							</table>
							  </form>
	<?php
	if(isset($_POST['hum_Update'])){
	 $hums_title = mysqli_real_escape_string($con,$_POST['hums_title']);

	if($hums_title == ""){
		echo "<script> alert('Please Enter Category_title')</script>";
	}
		 		 
		 $insert =  "INSERT INTO `humnes_cats` (`hum_title`) VALUES ('$hums_title');";
		 $query = mysqli_query($con,$insert);
	
	if($query){
		
		echo "<script>alert('Successfull Insret Top Category')</script>";
		
	}
	else{
		echo "registration failed try again";
	}
}
		

	?>

                         </div>
						 
                    </div>
					 </div>	
             