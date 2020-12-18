<?php @session_start();
include_once('includes/connection.php');
include_once('functions/function.php');
 ?>
 <?php 


					   	 if(isset($_SESSION['custom_email'])){
							 
							  
							 include_once('payment_options.php'); 
							 
						 }
						 else{
							include_once ('customer_login.php');
						 }
							 ?>