<form action="dashboard.php?page=query_testing" method="post">
 	<p><textarea name="textarea" id="textarea" cols="100" rows="5"><?php if(isset($_POST['textarea'])){ echo $_POST['textarea']; } else {echo 'Enter a query...';}?></textarea></p>
	<p><input type="submit" name="submit" value="Submit"></p>
</form>

<?php

include('query.php');

?>  