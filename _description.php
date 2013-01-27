<!--
Name: _description.php
Use: Used to modify picture descriptions
-->

<?php
	include 'opendb.php'; //Open database connection
	
	//Get the variables from POST
	$pictureid = $_POST['id'];
	$description = $_POST['value'];
	
	$query = "UPDATE pictures set description = '" . $description . "' where pictureid = ". $pictureid; //Write our SQL query
		
	$result = mysql_query($query, $conn); //Run the query
	
	print $description; //Return the name that was just set so that it appears without reloading the calling page
	
	include 'closedb.php'; //Close our database Connection
?>