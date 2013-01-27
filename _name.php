<!--
Name: _name.php
Use: Used to modify account holders name
-->

<?php
	include 'opendb.php'; //Open database connection
	
	//Get the variables from POST
	$userid = $_POST['id'];
	$name = $_POST['value'];
	
	$query = "UPDATE users set name = '" . $name . "' where userid = ". $userid; //Write our SQL query
		
	$result = mysql_query($query, $conn); //Run the query
	
	print $name; //Return the name that was just set so that it appears without reloading the calling page
	
	include 'closedb.php'; //Close our database Connection
?>