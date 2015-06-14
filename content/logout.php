<?php # Script 12.6 - logout.php

// If no cookie is present, redirect the user:
if (!isset($_SESSION['Email'])) {

	// Need the function:
	require ('content/login_functions.php');
	redirect_user();	
	
} else { // Delete the cookies:

	   //Cancel the session:
    $_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';

// Print a customized message:
echo "<h1>Logged Out!</h1>
<p>You are now logged out! </p>";

echo 'Redirecting...';

header( "refresh:1;url=index.php?page=home" );

?>