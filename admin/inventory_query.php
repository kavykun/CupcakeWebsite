<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';

if (isset($_POST['submit'])) {

require ('../model/mysqli_connect.php'); 



		$iID = $_POST['Item_No'];
		$description = $_POST['Description'];
		$qoh = $_POST['QOH'];
		$reorder = $_POST['Reorder_Level'];
		$price = $_POST['Price'];


	
		// Register the user in the database...

		// Make the query:
		$q = "INSERT INTO inventory(Item_No, Description, QOH, Reorder_Level, Price) VALUES ('$iID', '$description', '$qoh', '$reorder', '$price');";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
	
				echo 'The produc was added';
				  
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not register the  product</p>'; 
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		///////////////////////////////Printing out/////////////////////////
		
		$q = "select * from employee";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
					
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////

//end of post submit
}else if (isset($_POST['removeSubmit'])) {

require ('../model/mysqli_connect.php'); 


////////////////////////////////////////////////////////
		$text = $_POST['Item_No'];
		
		$q = "delete from inventory where E_ID = ".$text."";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo 'The employee was deleted';
          
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not remove the employee </p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
		
				///////////////////////////////Printing out/////////////////////////
		
		$q = "select * from employee";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
		

//end removing	
}else if (isset($_POST['querySubmit'])) {

require ('../model/mysqli_connect.php'); 


		$text = $_POST['query'];
		
		if($text == "query1"){
			
				///////////////////////////////Printing out/////////////////////////
		
		$q = "select * from inventory natural join cupcakes";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
			
			
		
		}
			if($text == "query2"){
				
					///////////////////////////////Printing out/////////////////////////
		
		$q = "
Select count(Description), price*sales.QTY as total from sales join inventory on sales.Item_NO = inventory.Item_No where price*sales.QTY < 20.00 group by description;";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
		
		}
			if($text == "query3"){
				
									///////////////////////////////Printing out/////////////////////////
		
		$q = "
Select Item_no, Description from inventory where qoh<reorder_level
;";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
		
		}
			
		if($text == "query4"){
			
								///////////////////////////////Printing out/////////////////////////
		
		$q = "
Select description, count(order_no) as total_sales from sales natural join inventory group by description limit 10;";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		
		//////////////////////////////////////////////////////////////////////
				
		
		}
		

//end running queries	
}else {


	
	
	
?>
<h1>Add a new Cupcake</h1>
<form action="dashboard.php?page=inventory_query" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="Item_No" size="5" maxlength="5" value="<?php if (isset($_POST['Item_No'])) echo $_POST['Item_No']; ?>" required></p>
	<p>Description: <input style="color:#00F" type="text" name="Description" size="15" maxlength="25" value="<?php if (isset($_POST['Description'])) echo $_POST['Description']; ?>" required></p>
	<p>QOH: <input style="color:#00F"  type="text" name="QOH" size="15" maxlength="25" value="<?php if (isset($_POST['QOH'])) echo $_POST['QOH']; ?>"  required></p>
    <p>Reorder Level: <input style="color:#00F" type="text" name="Reorder_Level" size="15" maxlength="25" value="<?php if (isset($_POST['Reorder_Level'])) echo $_POST['Reorder_Level']; ?>"  required></p>
     <p> Price: <input style="color:#00F" type="text" name="Price" size="10" maxlength="20" value="<?php if (isset($_POST['Price'])) echo $_POST['Price']; ?>"  required></p>
	<p><input style="color:#00F" type="submit" name="submit" value="Add"></p>
</form>
<br>
<br>
<h1>Remove a Cupcake</h1>
<form action="dashboard.php?page=inventory_query" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="Item_No" size="5" maxlength="5" value="<?php if (isset($_POST['Item_No'])) echo $_POST['Item_No']; ?>" required></p>
 <p><input style="color:#00F" type="submit" name="removeSubmit" value="Run"></p>
</form>
<br>
<br>
<h1>Manage</h1>
<form action="dashboard.php?page=inventory_query" method="post">

    <p><label>Options: <select name="query">
   <option value="query1">View all cupcakes</option>
  <option value="query2">Products that have sales < $20</option>
  <option value="query3">Cupcakes are below the normal ordering levele</option>
  <option value="query4">Top 10 selling cupcake</option>
  </select></label></p>

<p><input style="color:#00F" type="submit" name="querySubmit" value="Run"></p>
</form>

<?php } ?>