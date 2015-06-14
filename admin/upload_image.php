<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload an Image</title>
	<style type="text/css" title="text/css" media="all">
	.error {
		font-weight: bold;
		color: #C00;
	}
	</style>
</head>
<body>
<?php # Script 11.2 - upload_image.php

// Check if the form has been submitted:
if (isset($_POST['submit'])) {

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "../images/cupcakes/{$_FILES['upload']['name']}")) {
				echo '<p><em>The file '.$_FILES['upload']['name'].' has been uploaded!</em></p>';			
				
				$imageName = $_FILES['upload']['name'];
				$image = "../images/cupcakes/{$_FILES['upload']['name']}";
				
				$withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $imageName);
				
			require ('../model/mysqli_connect.php'); // Connect to the db.
							
			$fp = fopen($image, 'r');
			$data = fread($fp, filesize($image));
			$data = addslashes($data);
			fclose($fp);
			
			$q = "INSERT INTO images (Image_ID, ImageBin, Image_Name) VALUES ('', '$data', '$withoutExt')";	
				
			$r = @mysqli_query($dbc, $q); // Run the query.
			
			if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>File Uploaded!</h1>';	
			
			$q = "select ImageBin from images where Image_Name = \"".$withoutExt."\";";	
		
			$r = @mysqli_query($dbc, $q); // Run the query.
			
			$row = mysqli_fetch_array($r);
			
			echo'<img src="data:image/jpeg;base64,' . base64_encode($row[0]).'" height="200" width="200" />';

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">The file could not uploaded at this time. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
				
			mysqli_close($dbc); // Close the database connection.

				
			} // End of move... IF.
			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.
		
		print '</strong></p>';
	
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}
			
} // End of the submitted conditional.
?>
	
<form enctype="multipart/form-data" action="dashboard.php?page=upload_image" method="post">

	<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
	
	<fieldset><legend>Select a JPEG or PNG image of 2M or smaller to be uploaded:</legend>
	
	<p><b>File:</b> <input type="file" name="upload" id="file"></p>
	
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Submit"></div>

</form>
</body>
</html>