
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Smart Cart 2 - a javascript jQuery shopping cart plugin" />
<title>Smart Cart 2 - a javascript jQuery shopping cart plugin</title>

<!-- Smart Cart Files Include -->
<link href="styles/smart_cart.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.smartCart-2.0.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    	// Call Smart Cart    	
  		$('#SmartCart').smartCart({
          onAdd: function(pObj,quantity){ return cartAdd(pObj,quantity);}, 
          onAdded: function(pObj,quantity){  cartAdded(pObj,quantity);},
          onRemove: function(pObj){return cartRemove(pObj);}, 
          onRemoved: function(pObj){ cartRemoved(pObj);}, 
          onUpdate: function(pObj,quantity){ return cartUpdate(pObj,quantity); }, 
          onUpdated: function(pObj,quantity){ cartUpdated(pObj,quantity); },  //  
          onCheckout: function(Obj){ cartCheckout(Obj); }  //  
      });
      // On add
      function cartAdd(obj,qty){
         var msg = "Can i add the product "+obj.attr("pname")+ " of quantity "+qty+" to cart?"; 
         $("#cartMessage").html("<strong>onAdd</strong> event trigged");
         return confirm(msg);
      }
      // On added
      function cartAdded(obj,qty){
         var msg = "I'm added the product "+obj.attr("pname")+ " of quantity "+qty+" to cart."; 
         $("#cartMessage").html("<strong>onAdded</strong> event trigged <br />Message: "+msg);
      }
      // On Remove
      function cartRemove(obj){
         var msg = "Can i remove the product "+obj.attr("pname")+ " from cart?"; 
         $("#cartMessage").html("<strong>onRemove</strong> event trigged");
         return confirm(msg);
      }
      // On Removed
      function cartRemoved(obj){
         var msg = "I'm removed the product "+obj.attr("pname")+ " from cart."; 
         $("#cartMessage").html("<strong>onRemoved</strong> event trigged <br />Message: "+msg);
      }
      // On Update
      function cartUpdate(obj,qty){
         var msg = "Can i update the quantity of the product "+obj.attr("pname")+ " to "+qty+"?"; 
         $("#cartMessage").html("<strong>onUpdate</strong> event trigged");
         return confirm(msg);
      }
      // On Updated
      function cartUpdated(obj,qty){
         var msg = "I'm updated the quantity of the product "+obj.attr("pname")+ " to "+qty+"?"; 
         $("#cartMessage").html("<strong>onUpdated</strong> event trigged <br />Message: "+msg);
      }
      // On Checkout
      function cartCheckout(obj){
         var msg = "I'm listing the product id, quantity of the selected products<br /> ";                
         obj.children("option").each(function(n) {                     
            var pValue = $(this).attr("value");
            var valueArray = pValue.split('|');
            var prdId = valueArray[0];
            var pQty = valueArray[1];
            msg += "ProductId: "+prdId+" Quantity: "+pQty+"<br />";

        });

         $("#cartMessage").html("<strong>onCheckout</strong> event trigged <br />Message: "+msg);
      }                  
      
		});
</script>
</head><body>
<br />
<br />
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>  
<form action="results.php" method="post">
<!-- Smart Cart HTML Starts -->
  <div id="cartMessage" style="padding: 3px; width: 692px; height: 40px; border: 1px solid #CCC; color: #FF0000; font: 12px Verdana,Arial,Helvetica,sans-serif; overflow: auto;">
  </div>
  <br />
  <div id="SmartCart" class="scMain">
    <input type="hidden" pimage="products/product1.jpg" pprice="2299.99" pdesc="The Intel Core Duo powering MacBook Pro is actually two processors built into a single chip." pcategory="Computers" pname="Apple MacBook Pro MA464LL/A 15.4&quot; Notebook PC" pid="100">
    <input type="hidden" pimage="products/product6.jpg" pprice="2699.99" pdesc="Weighing in at just an amazing 2.84 pounds and offering a sleek, durable carbon-fiber case in charcoal black. And with 4 to 10 hours of standard battery life, it has the stamina to power you through your most demanding applications." pcategory="Computers" pname="Sony VAIO 11.1&quot; Notebook PC" pid="101">
    <input type="hidden" pimage="products/product3.jpg" pprice="550.00" pdesc="Canon EOS Digital Rebel XT SLR adds resolution, speed, extra creative control, and enhanced comfort in the hand to one of the smallest and lightest digital cameras in its class." pcategory="Cameras" pname="Canon Digital Rebel XT 8MP Digital SLR Camera" pid="102">
    <input type="hidden" pimage="products/product4.jpg" pprice="750.00" pdesc="Re-defining the perception of advanced mobile phones? the HTC Touch Diamond? signals a giant leap forward in combining hi-tech prowess with intuitive usability and exhilarating design." pcategory="Mobile Phones" pname="HTC Touch Diamond" pid="103">
    <input type="hidden" pimage="products/product2.jpg" pprice="1600.00" pdesc="IMAC G5/1.8 256MB 160GB SD 20IN OS10.3" pcategory="Computers" pname="Apple iMac G5 Desktop" pid="104">
    <input type="hidden" pimage="products/product5.jpg" pprice="1150.00" pdesc="" pcategory="Mobile Phones" pname="Blackberry 8900" pid="105">
    <input type="hidden" pimage="products/product8.jpg" pprice="148.85" pdesc="" pcategory="Accessories" pname="Headphone with mic" pid="106">                       
  </div>
<!-- Smart Cart HTML Ends -->
</form>
</td></tr>
</table>
</body>
</html>