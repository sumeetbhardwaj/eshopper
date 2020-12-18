<?php @session_start();
if(isset($_SESSION['admin_user'])){
	 
 }
 else{
	 echo"<script> window.open('index.php','_self')</script>";
 }
?>
					 
					 
<?php include_once('head.php');?>
    <div id="wrapper">
        <?php include_once('topnav.php');?>
		<?php include_once('sidenav.php');?>
           <div id="page-wrapper" >
            <div id="page-inner">
						<?php
					 if(!isset($_GET['insert_products'])){
							 if(!isset($_GET['views_products'])){
							 if(!isset($_GET['edit_products'])){
							 if(!isset($_GET['delete_products'])){
							 
							 if(!isset($_GET['insert_hums_cotegory'])){
							 if(!isset($_GET['view_hums_cotegory'])){
							if(!isset($_GET['edit_hums_cotegory'])){
						 if(!isset($_GET['delete_hums_cotegory'])){
						 
							 if(!isset($_GET['insert_cotegories'])){
							 if(!isset($_GET['view_cotegories'])){
							 if(!isset($_GET['edit_cotegories'])){
							 if(!isset($_GET['delete_cotegories'])){
							
						
						if(!isset($_GET['insert_brands'])){
							 if(!isset($_GET['view_brands'])){
							 if(!isset($_GET['edit_brands'])){
							 if(!isset($_GET['delete_brands'])){
							
						
						
						 if(!isset($_GET['view_customers'])){
							 if(!isset($_GET['delete_customers'])){
							
						
						if(!isset($_GET['view_orders'])){
							 if(!isset($_GET['delete_orders'])){
							
						
						if(!isset($_GET['view_payments'])){
						 
							include_once('welcom.php');
					 }}}}}}}}}}}}}}}}}}}}}
						  ?>
			
			
			
			
						<?php if(isset($_GET['insert_products'])){
							include_once('insert_products.php');
						}?>
						<?php if(isset($_GET['views_products'])){
							include_once('views_products.php');
						}?>
						<?php if(isset($_GET['edit_products'])){
							include_once('edit_products.php');
						}?>
						<?php if(isset($_GET['delete_products'])){
							include_once('delete_products.php');
						}?>
						
						<?php if(isset($_GET['insert_hums_cotegory'])){
							include_once('insert_humens.php');
						}?>
						<?php if(isset($_GET['view_hums_cotegory'])){
							include_once('view_hums_cotegory.php');
						}?>
						<?php if(isset($_GET['edit_hums_cotegory'])){
							include_once('edit_hums_cotegory.php');
						}?>
						<?php if(isset($_GET['delete_hums_cotegory'])){
							include_once('delete_hums_cotegory.php');
						}?>
						
						<?php if(isset($_GET['insert_cotegories'])){
							include_once('insert_cotegories.php');
						}?>
						<?php if(isset($_GET['view_cotegories'])){
							include_once('view_cotegories.php');
						}?>
						<?php if(isset($_GET['edit_cotegories'])){
							include_once('edit_cotegories.php');
						}?>
						<?php if(isset($_GET['delete_cotegories'])){
							include_once('delete_cotegories.php');
						}?>
						
						<?php if(isset($_GET['insert_brands'])){
							include_once('insert_brands.php');
						}?>
						<?php if(isset($_GET['view_brands'])){
							include_once('view_brands.php');
						}?>
						<?php if(isset($_GET['edit_brands'])){
							include_once('edit_brands.php');
						}?>
						<?php if(isset($_GET['delete_brands'])){
							include_once('delete_brands.php');
						}?>
						
						
						
						<?php if(isset($_GET['view_customers'])){
							include_once('view_customers.php');
						}?>
						<?php if(isset($_GET['delete_customers'])){
							include_once('delete_customers.php');
						}?>
						
						
						<?php if(isset($_GET['view_orders'])){
							include_once('view_orders.php');
						}?>
						<?php if(isset($_GET['delete_orders'])){
							include_once('delete_orders.php');
						}?>
						
						
						<?php if(isset($_GET['view_payments'])){
							include_once('view_payments.php');
						}?>
						
						
						
						
                  
    </div>
            </div>
        </div>
   <?php include_once('foot.php');?>