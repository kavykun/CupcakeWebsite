<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
</head>
<body>
<div id="products-wrapper">
 <h1>View Cart</h1>
 <div class="view-cart">
 	<?php
		
		
	
	require ('./model/mysqli_connect.php'); // Connect to the db.
	
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $q = "SELECT Price,Flavor, Item_No, Description FROM inventory natural join cupcakes WHERE Item_No=".$product_code." LIMIT 1";
	
	$b = @mysqli_query($dbc, $q);
	
	$obj = $b->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="./content/cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj->Price.'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->Flavor.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
			$qtyOrder = $cart_itm["qty"];
            echo '<div>'.$obj->Description.'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input style="color:#000" type="hidden" name="item_name['.$cart_items.']" value="'.$obj->Flavor.'" />';
			echo '<input style="color:#000" type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input style="color:#000" type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->Description.'" />';
			echo '<input style="color:#000" type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong" >Total : '.$currency.$total.'</strong>  ';
		echo '</span>';
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	
	
	if (isset($_POST['submit'])) {
		
		$digits = 5;
		$orderid = rand(pow(10, $digits-1), pow(10, $digits)-1);
		
		$q = "select E_ID from employee order by RAND();";	
		
		$r = @mysqli_query ($dbc, $q); 

		$row = mysqli_fetch_array($r);

		$salespersonid = $row[0];
		$itemno = $cart_itm["code"];
		$qty = $cart_itm["qty"];
		$customerid = $_SESSION["Cust_ID"];
		
		// Register the user in the database...

		// Make the query:
		$q = "INSERT INTO sales(Order_No, Salesperson_ID, Customer_ID, Item_No, QTY, Order_Date, Shipped_Date) VALUES ('$orderid', '$salespersonid', '$customerid', '$itemno', '$qty', NOW(), NOW());";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
	
				echo "<br><br><br>The order was processed. <br><br><br>";
				
				echo $q;
				  
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not process the order</p>'; 
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
	}
	
	
    ?>
    </div>
</div>

<form action="index.php?page=view_cart" method="post">

	<p><input style="color:#00F" type="submit" name="submit" value="Submit Order"></p>
</form>

</body>
</html>
