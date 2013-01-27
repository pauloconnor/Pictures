<!--
Name: opendb.php
Use: Used to connect to database
-->

<?php

//Database server hostname, username and password
$dbhost = 'localhost';
$dbuser = 'picture';
$dbpass = 'Pass123';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'picturesdb';
mysql_select_db($dbname);


?>