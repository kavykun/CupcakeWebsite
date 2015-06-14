<?php ## Home Page Content
	// Register the user in the database...
	require ('./model/mysqli_connect.php'); // Connect to the db.

 ?><head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.devrama.slider-0.9.4.js"></script>
        <style type="text/css">
            .example-animation {
                color: #FFF;
                font-size: 60px;
            }
			
			.bold {
			
				   color: black;
   -webkit-text-fill-color: white; /* Will override color (regardless of order) */
   -webkit-text-stroke-width: 1px;
   -webkit-text-stroke-color: black;
				
			}
			
			.title {
				
				color:#39F;
				text-outline:#000;
				
				
			}
		
   		</style>
</head>
      <!-- Jumbotron -->  
      

<div class="jumbotron">
        <h1>Best Cupcakes on the East Coast!</h1>
        <p class="lead" style="color:#39F" >We have a diverse selection to meet your sugar craving needs.</p>
        <p><a class="btn btn-lg btn-success" href="index.php?page=order" role="button">Order Now</a></p>
          <div class="example-animation">
            <div data-lazy-background="./images/cupcake1.jpg">
                <h3  class="bold" data-pos="['0%', '110%', '0%', '5%']" data-duration="700" data-effect="move">
                   Homemade!
                </h3>
                <div  class="bold" data-pos="['-30%', '25%', '40%', '25%']" data-duration="700" data-effect="move">
                    Many Flavors!
                </div>
                <div  class="bold" data-pos="['56%', '-40%', '56%', '11%']" data-duration="700" data-effect="move">
                    Glutten Free Options!
                </div>
                <div  class="bold" data-pos="['23%', '110%', '23%', '42%']" data-duration="700" data-effect="move">
                   
                </div>
            </div>
            <div data-lazy-background="./images/cupcake2.jpg">
                <h3  class="bold" data-pos="['0%', '8%']" data-duration="1000" data-effect="fadein">
                    Non-Fat!
                </h3>
                <div  class="bold" data-pos="['44%', '15%']" data-duration="700" data-effect="fadein">
                    Sugar-Free!
                </div>
                <div  class="bold" data-pos="['66%', '11%']" data-duration="700" data-effect="fadein">
                    Dairy-Free!
                </div>
                <div data-pos="['29%', '46%']" data-duration="700" data-delay="500" data-effect="fadein">
                  
                </div>
            </div>
              <div data-lazy-background="./images/cupcake3.jpg">
                <h3  class="bold" data-pos="['-10%', '110%', '0%', '5%']" data-duration="700" data-effect="move">
                    Free Shipping!
                </h3>
                <div  class="bold" data-pos="['-20%', '25%', '30%', '25%']" data-duration="700" data-effect="move">
                    Free International Shipping!
                </div>
                <div  class="bold" data-pos="['56%', '-20%', '80%', '11%']" data-duration="700" data-effect="move">
                    Delivered by our drones!
                </div>
                <div data-pos="['23%', '110%', '23%', '42%']" data-duration="700" data-effect="move">
                   
                </div>
            </div>
            <div data-lazy-background="./images/cupcake4.jpg">
                <h3  class="bold" data-pos="['0%', '8%']" data-duration="1000" data-effect="fadein">
                    Variety!
                </h3>
                <div  class="bold" data-pos="['44%', '15%']" data-duration="700" data-effect="fadein">
                    Custom Order!
                </div>
                <div  class="bold" data-pos="['66%', '11%']" data-duration="700" data-effect="fadein">
                    Make your own!
                </div>
                <div data-pos="['29%', '46%']" data-duration="700" data-delay="500" data-effect="fadein">
                  
                </div>
            </div>
             
        </div>
         
        <script type="text/javascript">
            $(document).ready(function(){
                $('.example-animation').DrSlider(); //Yes! that's it!
            });
        </script>

      </div>

      <!-- Example row of columns -->
      <div class="row" align="center">
        <div class="col-lg-4">
          <h2 class="title">Our Best Seller!</h2>
          
          <?php
		
		
		$q = "select Flavor, Description, count(order_no) as total_sales from sales natural join inventory natural join cupcakes group by description limit 10;";	
		
		echo $q;	
		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		 $obj = $r->fetch_object();
			 
		$bestSeller[0] = $obj->Flavor;
		 
        
		  ?>
          <h2><?php echo $bestSeller[0] ?></h2>
          
          <?php
		  
		  
        $t = "select ImageBin from images where Image_Name = \"".$bestSeller[0]."\";";
		echo $t;
		
		$b = @mysqli_query($dbc, $t); // Run the query.
	
		$row = mysqli_fetch_array($b);
		
		echo '<img src="data:image/jpeg;base64,' . base64_encode($row['ImageBin']).'" height="300" width="300" />';
		
		?>
       
          <p><?php echo $obj->Description; ?></p>
          <p><a class="btn btn-primary" href="#" role="button">Buy Now! &raquo;</a></p>
        </div>
        <div class="col-lg-4" align="center">
          <h2 class="title" >Limited Supply!</h2>
          
            <?php
		
		
		$q = "Select Flavor, Item_no, Description from inventory natural join cupcakes where QOH < Reorder_level;";	
		
		echo $q;	
		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		 $obj = $r->fetch_object();
			 
		$bestSeller[0] = $obj->Flavor;
		 
        
		  ?>
          <h2><?php echo $bestSeller[0] ?></h2>
          
          <?php
		  
		  
        $t = "select ImageBin from images where Image_Name = \"".$bestSeller[0]."\";";
		echo $t;
		
		$b = @mysqli_query($dbc, $t); // Run the query.
	
		$row = mysqli_fetch_array($b);
		
		echo '<img src="data:image/jpeg;base64,' . base64_encode($row['ImageBin']).'" height="300" width="300" />';
		
		?>
          <p><?php echo $obj->Description; ?></p>
          <p><a class="btn btn-primary" href="index.php?page=order" role="button">Buy Now! &raquo;</a></p>
       </div>
        <div class="col-lg-4" align="center">
          <h2 class="title">Random Pick of the Day!</h2>
          
            <?php
			
			$rand = rand(10000, 10010);
		
		$q = "Select Flavor, Item_no, Description from inventory natural join cupcakes where Item_No = ".$rand.";";	
		
		echo $q;	
		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		 $obj = $r->fetch_object();
			 
		$bestSeller[0] = $obj->Flavor;
		 
        
		  ?>
          <h2><?php echo $bestSeller[0] ?></h2>
          
          <?php
		  
		  
        $t = "select ImageBin from images where Image_Name = \"".$bestSeller[0]."\";";
		echo $t;
		
		$b = @mysqli_query($dbc, $t); // Run the query.
	
		$row = mysqli_fetch_array($b);
		
		echo '<img src="data:image/jpeg;base64,' . base64_encode($row['ImageBin']).'" height="300" width="300" />';
		
		?>
          <p><?php echo $obj->Description; ?></p>
          <p><a class="btn btn-primary" href="index.php?page=order" role="button">Buy Now! &raquo;</a></p>
        </div>
      </div>

    </div> <!-- /container -->
