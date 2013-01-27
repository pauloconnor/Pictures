<!--
Name: _public.php
Use: Used to modify picture visibility
-->

<?php
	//open our database connection
	include 'opendb.php';
	
	//Pull in our variables from POST
	$pictureid = $_POST['id'];
	$status = $_POST['status'];
	//If the checkbox was checked
	if ($status=="true")
		{
			$public = 1; //Then the picture was made public
		}
		else{
			$public = 0; //Otherwise private only.
		};
	
	$query = "UPDATE pictures set public = " . $public . " where pictureid = ". $pictureid; //Write our SQL Query
		
	$result = mysql_query($query, $conn); //And execute it
	
	include 'closedb.php'; //Close the database connection
?>