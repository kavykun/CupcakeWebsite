<?php # Script 12.4 - logged_in.php
// The user is redirected here from login.php.
// If no cookie is present, redirect the user:
if (!isset($_SESSION['Email'])) {

	// Need the functions:
	echo'need cookies';
	require ('content/login_functions.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';

// Print a customized message:
echo "<h1>Logged In!</h1>
<p>You are now logged in, ".$_SESSION['F_Name']."!</p>
<p><a href=\"index.php?page=logout\">Logout</a></p>";


?>