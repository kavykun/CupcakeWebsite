<?php 
#Query Template

		foreach(glob('./images/cupcakes/*.*') as $filename){
			
			
   			 $files[] = $filename;
			 
		}//emd foreach

	$q = "select Flavor, Description from inventory natural join cupcakes where Reorder_Level = ".$max."";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		while($row = mysqli_fetch_assoc($r)){
				
				      foreach ($row as $values) {
						  
						  $bestSeller[] = $values;
						  
					  }
		}
		
		mysqli_close($dbc); // Close the database connection.
		
?>