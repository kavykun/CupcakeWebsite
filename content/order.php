<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<div id="products-wrapper">
	<br>
    <br>
    <div class="products">
    <?php
		  
		    if ( (!isset($_SESSION['Email']))) {
				
				echo "<strong> You must Log in First. Redirecting page...<strong>";
				
          header( "refresh:0;url=index.php?page=login" );
			}
		  
        
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	
	require ('./model/mysqli_connect.php'); // Connect to the db.
	
	$q = "SELECT * FROM inventory natural join cupcakes ORDER BY Item_No";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	
    if ($r) { 
	
        //fetch results set as object and output HTML
        while($obj = $r->fetch_object())
        {
			
		$t = "select ImageBin from images where Image_Name = \"".$obj->Flavor."\";";
		
		$b = @mysqli_query($dbc, $t); // Run the query.
	
		$row = mysqli_fetch_array($b);
		
			
			echo '<div style="color:"#000" class="product">'; 
            echo '<form method="post" action="./content/cart_update.php">';
			
			echo '<div class="product-thumb"><img src="data:image/jpeg;base64,' . base64_encode($row['ImageBin']).'" height="80" width="120" /></div>';
            echo '<div style="color:"#000" style="color:"#000" class="product-content"><h3>'.$obj->Flavor.'</h3>';
            echo '<div style="color:#000" class="product-desc">'.$obj->Description.'</div>';
            echo '<div style="color:#000" class="product-info">';
			echo 'Price '.$currency.$obj->Price.' | ';
            echo 'Qty <input style="color:#000" type="text" name="product_qty" value="1" size="3" />';
			echo '<button style="color:#000" class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->Item_No.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    } else {
	
		// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
		
	}
    ?>
    </div>
    
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="./content/cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3 style="color:#000">'.$cart_itm["name"].'</h3>';
        echo '<div style="color:#000" class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div style="color:#000" class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div style="color:#000" class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
		
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong style="color:#000">Total : '.$currency.$total.'</strong> <a style="color:#000" href="index.php?page=view_cart">Check-out!</a></span>';
	echo '<span class="empty-cart"><a href="./content/cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>
    
</div>

</body>
</html>
