<?php 
#Query Testing
// Print any error messages, if they exist:

if (isset($_POST['submit'])) {

require ('../model/mysqli_connect.php'); 


		$countRow = 0;

		$text = $_POST['textarea'];
		
		$q = $text;	
		$r = @mysqli_query ($dbc, $q); 

		if ($r) { 
		
			echo '<h1>Database</h1>';
			
				echo "<h2 class=\"sub-header\">Section title</h2>
          <div class=\"table-responsive\">
            <table class=\"table table-striped\">
              <thead>
                <tr>";
                  while ($row = mysqli_fetch_field($r)){
       	
					echo "<th>";
					printf("%s\n" , $row->name);
					echo "</th>";
					  
				  	}//while
					
			
				  
			 echo "
                </tr>
              </thead>
              <tbody>
					";
				while($row = mysqli_fetch_assoc($r)){
				  echo "<tr>";
				      foreach ($row as $value) {
					
					echo "<td>".$value."</td>";
					
					  }
					  
					  echo "</tr>";
					  
					}
              echo"
              </tbody>
            </table>
          </div>";
			
		} else { 
			
			echo '<h1>System Error</h1>
			<p class="error">The system could not retreive the tables</p>'; 
	
	
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';
				
		} //end else
		

	
}//end submit

?>   
       