<?php

	if(!empty($_POST['name'])){
		$name = $_POST['name'];
	}else {
		$name = null;
		echo '<p class="error"> You forgot to enter your name! </p>';
	}//end else
	if(!empty($_POST['email'])){
		$email = $_POST['email'];
	}else {
		$email = null;
		echo '<p class="error"> You forgot to enter your email! </p>';
	}//end else
	if(!empty($_POST['comments'])){
		$comments = $_POST['comments'];
	}else {
		$comments = null;
		echo '<p class="error"> You forgot to enter your comment! </p>';
	}//end else
	
	
	if(isset($_POST['gender'])){
		
		$gender = $_POST['gender'];
		
		if($gender == "M"){
		
		echo '<br><br>Good day, Sir!';
		
	}else if($gender == "F") {
	
		echo '<br><br>Good day, Madam!';
	
		}else {
			
			$gender = null;
			
		}//end else
	}//end if
		
	if(isset($_POST['age'])){
		
		$age = $_POST['age'];
		
	if ($age == "0-29"){
		
		echo '<br>We have your age as: below 30';
		
	} else if ($age == "30-60"){
		
		echo '<br>We have your age as: between 30 and 60';
	
	} else if ($age == "60+"){
		
		echo '<br>We have your age as: over 60.';
		
		}else {
			
			$age = null;
			echo '<p class="error"> You forgot to enter your age! </p>';
			
		}//end if
	}//end if

	if ($name && $email && $gender && $comments){
		
	echo 'Thank you, '.$name.', for the following comments: ';
	echo '<br> "'.$comments.'" <br>';
	echo '<br>We will reply to you at '.$email.'<br>';
		
	}else {
		
		echo '<p class="error">Please go back and fill out the form again.</p>';
		
	}//end else 

?>