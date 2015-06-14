<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSJavaDevs</title>

<link rel="stylesheet" type="text/css" href="css/styles.css" />

</head>

<body>
<?php

	if(isset($_POST['submit'])){

	if(!empty($_POST['name'])){
		
		$name = $_POST['name'];
		
		if (!preg_match("/^[a-zA-Z ]*$/",$name))
 			 {
					  $nameErr = "Only letters and white space allowed"; 
					  echo $nameErr;
 			 }
		
	}else {
		
		$name = null;
		echo '<p class="error"> You forgot to enter your name! </p>';
		
	}//end else
	if(!empty($_POST['email'])){
		
		$email = $_POST['email'];
		
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$email = null;
		echo '<p class="error"> Please enter a valid email address!';
		
		}//end else 
	}
	
	if(!empty($_POST['comments'])){
		
		$comments = $_POST['comments'];
		
	}else {
		
		$comments = null;
		echo '<p class="error"> You forgot to enter your comment! </p>';
		
	}//end else
	
	
	if(isset($_POST['gender'])){
		
		$gender = $_POST['gender'];
	
		}else {
			
			$gender = null;
			echo '<p class="error"> You forgot to enter your gender!.';
			
		}//end else

	if(isset($_POST['age'])){
		
		$age = $_POST['age'];
	
		
		}else {
			
			$age = null;
			echo '<p class="error"> You forgot to enter your age! </p>';
			
		}//end else

	if ($name && $email && $gender && $comments){
		
				
	if($gender == "M"){
		
	echo '<br><br>Good day, Sir!';
		
	}else if($gender == "F") {
	
	echo '<br><br>Good day, Madam!';
	
	}//end else if
	
	$calcAge = 2014 - $age;
		
	echo '<br>We have your age as: '.$calcAge.'';
	echo '<br>*If age is not correct, please resubmit the form*';
		
	echo '<br>Thank you, '.$name.', for the following comments: ';
	echo '<br> "'.$comments.'" <br>';
	echo '<br>We will reply to you at '.$email.'<br>';
		
	}else {
		
		echo '<p class="error"> Please go back and fill out the form again.</p>';
	
		}//end else 
		
	}


?>

<!-- Script 2.1 - form.html -->
<form action="index.php?page=registration" method="post">

	<fieldset><legend>Enter your information in the form below:</legend>
	
	<p><label>Name: <input type="text" name="name" size="20" maxlength="40" value="<?php if (isset($_POST['name'])) echo $_POST['name']?>" required></input></label></p>
	
	<p><label>Email Address: <input type="text" name="email" size="40" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']?>" required></input></label></p>
	
	<p>Gender: <label><input type="radio" name="gender" value="M"
    
    <?php 
	
	if(isset($_POST['gender'])){
		
		$gender = $_POST['gender'];
		
		if($gender == "M"){
		
		echo ' checked';
			
		}
		
	}
	
	?> > Male </label>
	<label><input type="radio" name="gender" value="F" 
     <?php 
	
	if(isset($_POST['gender'])){
		
		$gender = $_POST['gender'];
		
		if($gender == "F"){
		
		echo ' checked';
			
		}//end if
		
	}//end if
	
	?>> Female</label></p>
	
	<p><label>Year of birth:
	<select name="age">
 
            <?php 	
				
			$years = range (1920, 2010);
	       	$middle = (2010 - 1920) / 2;
			$middleNumber = floor($middle) + 1920 ;
				
			foreach($years as $values){
			
			echo "<option value=\"$values\"";
			if(!empty($_POST['age']) && $values == $_POST['age']){
					
					echo 'selected="selected"';
					
			} else if ($values == $middleNumber && empty($_POST['age'])){
			
				echo 'selected="selected"';
				
			}//end if
			
			echo ">$values</option>\n";
			
			}//end for each
			

		?>
          	
	</select></input></label></p>
	
	<p><label>Comments: <textarea name="comments" rows="3" cols="40" required><?php if(isset($_POST['comments'])) echo $_POST['comments'] ?></textarea></label></p>
	
	</fieldset>
	
	<p id="button"><input type="submit" name="submit" value="Submit My Information"></input></p>

</form>

</body>
</html>
