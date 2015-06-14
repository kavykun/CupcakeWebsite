<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';

if (isset($_POST['submit'])) {

require ('../model/mysqli_connect.php'); 



		$eID = $_POST['E_ID'];
		$first = $_POST['F_Name'];
		$middle = $_POST['M_Name'];
		$last = $_POST['L_Name'];
		$address1 = $_POST['Address1'];
		$zip = $_POST['Zip'];
		$birthday = $_POST['Birthday'];

	
		// Register the user in the database...

		// Make the query:
		$q = "INSERT INTO employee(E_ID, F_Name, M_Name, L_Name, Address_1, Zip, Birthday) VALUES ('$eID', '$first', '$middle', '$last', '$address1', '$zip', $birthday);";	
		
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
	
				echo 'The employee was added';
				  
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not register the employee</p>'; 
	
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
		$text = $_POST['E_ID'];
		
		$q = "delete from employee where E_ID = ".$text."";	
		
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
			
			
		
		}
			if($text == "query2"){
				
					///////////////////////////////Printing out/////////////////////////
		
		$q = "
SELECT F_name, M_name, L_name, (price*qty) as amount_sold FROM sales natural join inventory natural join employee where Salesperson_ID = E_id;";	
		
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
Select F_Name, L_Name from (Select E_ID, F_Name, L_Name from employee natural join employee_data where Title = \"salesperson\") as A left outer join sales on A.E_ID=sales.salesperson_ID  where order_no is null";	
		
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
Select avg(Salary) as avgsalary from employee_data;";	
		
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
<h1>Register a Employee</h1>
<form action="dashboard.php?page=employee_query" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="E_ID" size="5" maxlength="5" value="<?php if (isset($_POST['E_ID'])) echo $_POST['E_ID']; ?>" required></p>
	<p>First Name: <input style="color:#00F" type="text" name="F_Name" size="15" maxlength="25" value="<?php if (isset($_POST['F_Name'])) echo $_POST['F_Name']; ?>" required></p>
	<p>Middle Name: <input style="color:#00F"  type="text" name="M_Name" size="15" maxlength="25" value="<?php if (isset($_POST['M_Name'])) echo $_POST['M_Name']; ?>"  required></p>
    <p>Last Name: <input style="color:#00F" type="text" name="L_Name" size="15" maxlength="25" value="<?php if (isset($_POST['L_Name'])) echo $_POST['L_Name']; ?>"  required></p>
     <p>Address 1: <input style="color:#00F" type="text" name="Address1" size="25" maxlength="50" value="<?php if (isset($_POST['address1'])) echo $_POST['address1']; ?>"  required></p>
       <p>Zip: <input style="color:#00F" type="text" name="Zip" size="5" maxlength="5" value="<?php if (isset($_POST['Zip'])) echo $_POST['Zip']; ?>"></p>
        <p>Birthday: <input style="color:#00F" type="text" name="Birthday" size="10" maxlength="10" value="<?php if (isset($_POST['Birthday'])) echo $_POST['Birthday']; ?>"  required></p>
	<p><input style="color:#00F" type="submit" name="submit" value="Register"></p>
</form>
<br>
<br>
<h1>Remove a Employee</h1>
<form action="dashboard.php?page=employee_query" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="E_ID" size="5" maxlength="5" value="<?php if (isset($_POST['E_ID'])) echo $_POST['E_ID']; ?>" required></p>
 <p><input style="color:#00F" type="submit" name="removeSubmit" value="Run"></p>
</form>
<br>
<br>
<h1>Manage</h1>
<form action="dashboard.php?page=employee_query" method="post">

    <p><label>Options: <select name="query">
   <option value="query1">View all employees</option>
  <option value="query2">Sales Report for employee</option>
  <option value="query3">Never made a sale</option>
  <option value="query4">Average salary per individual</option>
  </select></label></p>

<p><input style="color:#00F" type="submit" name="querySubmit" value="Run"></p>
</form>

<?php } ?>