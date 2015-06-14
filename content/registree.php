<?php
//Displays the registrees.

require ('model/mysqli_connect.php'); 

		$q = "select * from SF_Customers";		
		$r = @mysqli_query ($dbc, $q); 
		if ($r) { 
		
			echo '<h1>Database</h1>
			
		<pDisplay the registrees...</p><p><br></p>';	
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the registrees..</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} 
		
	echo "<table border='1'>
	<tr>
	<th>Username</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Street</th>
	<th>City</th>
	<th>State</th>
	<th>Zip</th>
	<th>Email</th>
	<th>Password</th>
	</tr>";

	while($row = mysqli_fetch_array($r)){
		
 		 echo "<tr>";
		 echo "<td>" . $row['username'] . "</td>";
 		 echo "<td>" . $row['ln'] . "</td>";
		 echo "<td>" . $row['fn'] . "</td>";
 		 echo "<td>" . $row['street'] . "</td>";
		 echo "<td>" . $row['city'] . "</td>";
		 echo "<td>" . $row['state'] . "</td>";
 		 echo "<td>" . $row['zip'] . "</td>";
		 echo "<td>" . $row['email'] . "</td>";
 		 echo "<td>" . $row['password'] . "</td>";
 		 echo "</tr>";
  	}
	echo "</table>";

	mysqli_close($dbc);

?>