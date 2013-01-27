<!--
Name: header.php
Use: Used to list all includes required for the site along with process login and cookie information
-->

<?php 

error_reporting(E_ALL ^ E_NOTICE);  //Squash error reporting

include 'opendb.php'; //Include database connection
if (ISSET($_POST['email'])) //If someone's email address was entered
{
		//Get email and password
		$email = $_POST['email'];
		$password = $_POST['password'];

		//Check if they exist in the database
		$query = "select userid, email, password from users where email = '".strtolower($email)."' and password = PASSWORD('".$password."')";
		
		$result = mysql_query($query, $conn);
		#echo $result;
		if ($result < 1) //If they don't
		{
			echo "INVALID USERNAME OR PASSWORD"; //Display Error
		}
		else
		{	
			//otherwise, set cookie
			$row = mysql_fetch_array($result);
			$userid = $row['userid'];
			setcookie("userid", $userid, time()+8000);
		}
}	

//If a user clicked Logout
if (ISSET($_GET['logout']))
{
	$value = -1;
	setcookie("userid", $value, time()-8000); //Clear the cookie
}

$currPage = basename($PHP_SELF); //Get the page name without the domain or machine name

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="resources/style.css" title="Normal" media="screen" rel="Stylesheet" type="text/css" />
<link href="resources/style2.css" title="Second Theme" media="screen" rel="Stylesheet" type="text/css" />

<!-- BEGIN third party Javascript-->
<script src="resources/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="resources/jquery.jeditable.mini.js" type="text/javascript"></script>


