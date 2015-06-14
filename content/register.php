<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';

require ('./model/mysqli_connect.php'); // Connect to the db.

// Check for form submission:
if (isset($_POST['submit'])) {

	$errors = array(); // Initialize an error array.
	//Text fields will be trimmed using trim() - meaning that extraneous spaces are deleted.
		// Check for a first name:
		
		$custID = $_POST['Cust_ID'];
		$business = $_POST['Business_Name'];
		$first = $_POST['F_Name'];
		$middle = $_POST['M_Name'];
		$last = $_POST['L_Name'];
		$address1 = $_POST['Address1'];
		$address2 = $_POST['Address2'];
		$zip = $_POST['Zip'];
		$cell = $_POST['Cell_Number'];
		$home = $_POST['Home_Number'];
		$email = $_POST['Email'];
	
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['pass1']);
			
			$p = SHA1($p);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		

		// Make the query:
		$q = "INSERT INTO customer(Cust_ID, Business_Name, F_Name, M_Name, L_Name, Address_1, Address_2, Zip, Email, Pass) VALUES ('$custID','$business', '$first', '$middle', '$last', '$address1', '$address2', '$zip', '$email', '$p');";	
		$k = "INSERT INTO c_phone(C_ID, phone_type, phone_number) VALUES ('$custID', 'home', '$home');";
		$l = "INSERT INTO c_phone(C_ID, phone_type, phone_number) VALUES ('$custID', 'cell', '$cell');";
		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		$t = @mysqli_query ($dbc, $k); // Run the query.
		$u = @mysqli_query ($dbc, $l); // Run the query.
		
		if ($r && $t && $u) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered.</p><p><br></p>';	

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.
		
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>";
		}
		echo '</p><p>Please try again.</p><p><br></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="index.php?page=register" method="post">
 <p>Unique ID: <input style="color:#00F" type="text" name="Cust_ID" size="5" maxlength="5" value="<?php if (isset($_POST['Cust_ID'])) echo $_POST['Cust_ID']; ?>" required></p>
 <p>Business Name: <input style="color:#00F" type="text" name="Business_Name" size="15" maxlength="35" value="<?php if (isset($_POST['Business_Name'])) echo $_POST['Business_Name']; ?>" required></p>
	<p>First Name: <input style="color:#00F" type="text" name="F_Name" size="15" maxlength="25" value="<?php if (isset($_POST['F_Name'])) echo $_POST['F_Name']; ?>" required></p>
	<p>Middle Name: <input style="color:#00F"  type="text" name="M_Name" size="15" maxlength="25" value="<?php if (isset($_POST['M_Name'])) echo $_POST['M_Name']; ?>"  required></p>
    <p>Last Name: <input style="color:#00F" type="text" name="L_Name" size="15" maxlength="25" value="<?php if (isset($_POST['L_Name'])) echo $_POST['L_Name']; ?>"  required></p>
     <p>Address 1: <input style="color:#00F" type="text" name="Address1" size="25" maxlength="50" value="<?php if (isset($_POST['address1'])) echo $_POST['address1']; ?>"  required></p>
      <p>Address 2: <input style="color:#00F" type="text" name="Address2" size="25" maxlength="50" value="<?php if (isset($_POST['address2'])) echo $_POST['address2']; ?>"  required></p>
       <p>Zip: <input style="color:#00F" type="text" name="Zip" size="5" maxlength="5" value="<?php if (isset($_POST['Zip'])) echo $_POST['Zip']; ?>"></p>
        <p>Cell_Number: <input style="color:#00F" type="text" name="Cell_Number" size="10" maxlength="10" value="<?php if (isset($_POST['Cell_Number'])) echo $_POST['Cell_Number']; ?>"  required></p>
         <p>Home Number: <input style="color:#00F" type="text" name="Home_Number" size="10" maxlength="10" value="<?php if (isset($_POST['Home_Number'])) echo $_POST['Home_Number']; ?>"  required></p>
	<p>Email Address: <input style="color:#00F" type="text" name="Email" size="20" maxlength="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"> </p>
	<p>Password: <input style="color:#00F" type="password" name="pass1" size="10" maxlength="40" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"></p>
	<p>Confirm Password: <input style="color:#00F" type="password" name="pass2" size="10" maxlength="40" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"></p>
	<p><input style="color:#00F" type="submit" name="submit" value="Register"></p>
</form>
