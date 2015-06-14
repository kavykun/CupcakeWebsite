<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';

if (isset($_POST['removeSubmit'])) {

require ('../model/mysqli_connect.php'); 

////////////////////////////////////////////////////////
		$text = $_POST['Cust_ID'];
		
		$q = "delete from customer where Cust_ID = ".$text."";	
		
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
		
		$q = "select * from customer";	
		
		
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
		
		$q = "select * from customer";	
		
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
		
		$q = "select state from customer natural join cities where state = \"North Carolina\";";	
		
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
		
		$q = "select F_Name, L_Name,abs(datediff(date(Order_date), date(Shipped_date))) as longest_wait from sales natural join customer where Cust_ID = Customer_ID order by longest_wait desc limit 5;";	
		
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
select avg(abs(datediff(date(Order_date), date(Shipped_date)))) as avg_wait_time from sales;";	

echo $q;
		
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
<h1>Remove a Customer</h1>
<form action="dashboard.php?page=customers_query" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="Cust_ID" size="5" maxlength="5" value="<?php if (isset($_POST['Cust_ID'])) echo $_POST['Cust_ID']; ?>" required></p>
 <p><input style="color:#00F" type="submit" name="removeSubmit" value="Run"></p>
</form>
<br>
<br>
<h1>Manage</h1>
<form action="dashboard.php?page=customers_query" method="post">

    <p><label>Options: <select name="query">
   <option value="query1">View all customers</option>
  <option value="query2">Customers who live in North Carolina</option>
  <option value="query3">Get the names of customers who had to wait the longest for their orders to be shipped</option>
  <option value="query4">Get the average waiting time, i.e. difference between date ordered and date shipped, for all orders in number of days.</option>

  
  </select></label></p>

<p><input style="color:#00F" type="submit" name="querySubmit" value="Run"></p>
</form>

<?php } ?>