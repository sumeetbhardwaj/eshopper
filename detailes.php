<?php include_once('head.php');?>
<body>
<?php include_once('templates/productheader.php');?>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<div class="left-sidebar">
						<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						 <div class="panel panel-default">
						 <?php
						 getCat();
					 ?>
					
						 </div>
						  
						</div>
						
						<h2>Brands</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						 <div class="panel panel-default">
						 <?php
						 getBrand();
					 ?>
					
						 </div>
						  
						</div>
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<?php
							   getDetailes();
							   
							   ?>
						
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
	</section>
	<?php include_once('templates/footer.php');
	include_once('foot.php');?>
	
