<!--

NOT USED

Name: _login.php
Use: Used to login
-->

<?php
    $email = $_POST['email'];
	$password = $_POST['password'];
	#echo $email . $password;

	$query = "select userid, email, password from users where email = '".strtolower($email)."' and password = PASSWORD('".$password."')";
	
	$result = mysql_query($query, $conn);
	#echo $result;
	if ($result < 1)
	{
		echo "INVALID USERNAME OR PASSWORD";
	}
	else
	{
		$row = mysql_fetch_array($result);
		$userid = $row['userid'];
		setcookie("userid", $userid, time()+8000);
	}
?>