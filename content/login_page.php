<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br>';
	foreach ($errors as $msg) {
		echo " - $msg<br>\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:
?><h1>Login</h1>
<form action="index.php?page=login" method="post">
	<p>Email Address: <input style="color:#00F" type="text" name="Email" size="20" maxlength="60"> </p>
	<p>Password: <input style="color:#00F" type="password" name="Pass" size="20" maxlength="20"></p>
	<p><input style="color:#00F" type="submit" name="submit" value="Login"></p>
</form>
