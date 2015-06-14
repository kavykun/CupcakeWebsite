<?php # Script 12.3 - login.php
// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if (isset($_POST['submit'])) {

	// For processing the login:<p></p>
	require ('login_functions.php');
	
	// Need the database connection:
	require ('model/mysqli_connect.php');
		
	// Check the login:
	list ($check, $data) = check_login($dbc, $_POST['Email'], $_POST['Pass']);
	if ($check) { // OK!
	
                $_SESSION['Email']=$data['Email'];
				
				$q = "select * from customer where Email = \"".$_SESSION['Email']."\";";	
		
				$r = @mysqli_query ($dbc, $q); 
				
				if($r) {
					
				$row = mysqli_fetch_array($r);
				
				echo $row['F_Name'];
				
                $_SESSION['F_Name']=$row['F_Name'];
				$_SESSION['Cust_ID']=$row['Cust_ID'];
                echo $_SESSION['Email'].' '.$_SESSION['F_Name'];
				
				} else {
					
					echo '<h1>System Error</h1>
			<p class="error">There are no entries in the table</p>'; 
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				}
		
		// Redirect:
		
	
		
		redirect_user('index.php?page=logged_in');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for error reporting
		// in the login_page.php file.
		$errors = $data;

	}
	  	
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('login_page.php');
?>