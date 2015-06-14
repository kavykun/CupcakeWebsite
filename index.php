<?php
// Setup document:
// Kavy Rattana

session_start();

include('config/setup.php');


		$pg = 'home';
		if (isset($_GET['page'])) {
			
    		if ($_GET['page'] ==  ''){
				
				$pg = $_GET['page'];
				
		} else {
			
			$pg = $_GET['page'];
			

			
			}//end else 
		}//end if
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
  <link rel="image_src" href="/images/interactive_bg_image.png" />
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Henny+Penny' rel='stylesheet' type=			'text/css'>

   <style>
		* {font-family: Henny Penny; color:#eee; }
		body {background:#333;}


	</style>
    
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">

    </head>
<body>
 
 	<div class="head">
    	<?php
	include('template/header.php');  ?>   
        
	</div>
    
    <div class="nav_main temp_block">
	   	<?php include('template/nav_main.php'); ?>
    </div>
        
    <div class="content temp_block <?php if($pg == "order" || $pg== "view_cart") { echo 'divScroll';} ?>" align="center">
   		 <?php include('content/'.$pg.'.php'); ?>
     </div>
    
	<div class="footer temp_block">
    	<?php include('template/footer.php'); ?>
    </div>
    
</body>
</html>