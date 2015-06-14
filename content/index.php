<?php
// Setup document:
// Kavy Rattana
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


    <title>The Cupcake Factory</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
<body>
	<div>   
    	<?php
	echo 'Working;';
	include('template/header.php');  ?>   
        
	</div>
    
    <div class="nav_main temp_block">
	   	<?php include('template/nav_main.php'); ?>
    </div>
        
    <div class="content temp_block">
   		 <?php include('content/'.$pg.'.php'); ?>
     </div>
    
	<div class="footer temp_block">
    	<?php include('template/footer.php'); ?>
    </div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>