<?php
## Main Navigation

?><head>

<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
<link rel="stylesheet" href="./css/liquid-slider.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="./js/jquery.easing.1.3.js"></script>
<script src="./js/jquery.touchSwipe.min.js"></script>
<script src="./js/jquery.liquid-slider.min.js"></script>
<script>
/* If installing in the footer, you won't need $(function() {} */
$(function(){
     $('#slider-id').liquidSlider();
});
</script>

</head>

<div class="container">
      <div class="masthead">
        <h3 class="text-muted">Navigation</h3>
        <ul class="nav nav-justified">
          <li class="active"><a href="index.php?page=home">Home</a></li>
          <li><a href="index.php?page=products">Gallery</a></li>
          <li><a href="index.php?page=order">Order</a></li>
            <?php if (!(isset($_SESSION['Email']))) {
				
          echo "<li><a href=\"index.php?page=register\">Register</a></li>";
		  
			}
		  ?>

      
          <?php // Create a login/logout link:
    if ( (isset($_SESSION['Email']))) {
			echo "<li><a href=index.php?page=view_cart>Cart</a></li>";
           echo "<li><a href=index.php?page=logout>Logout</a></li>";
        } else {
            echo "<li><a href=index.php?page=login>Login</a></li>";
        }
		?>
        
           <?php
	
		 if(isset($_SESSION['Email'])){
			 
			 if($_SESSION['Email'] == "admin@uncw.edu"){
			 
			 echo "<li><a href=admin/dashboard.php>Admin</a></li>";
			 
			 }//end if
			 
		 }//end if
		 
		 ?>
        </ul>
      </div>
                        