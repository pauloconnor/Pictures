<!--
Name: login.php
Use: Used to enter login credentials
-->

<?php
include 'header.php';
?>
<title>PICTURES - ONLINE IMAGE HOST FOR IRELAND</title>


</head>
<body>
    <div id="pageMiddle">
        <?php
        include 'menu.php';
        ?>
        <div id="centerContent">
			<div id="LoginForm">
				<form id="register" name="register" method="post" action="index.php">
				  <div id="loginCaption">Login</div>
				    <div id="detailsHolder">
				      <div class="loginEmail">Email:</div>
				      <div class="loginField"><input type="text" width="230" name="email" id="email" /><br /></div>
				    </div>
				    <div id="detailsHolder">
				      <div class="loginEmail">password:</div>
				      <div class="loginField"><input type="password" width="230" name="password" id="password" /></div>
				    </div>
				    <div id="loginSubmit"><input name="Submit" type="submit" value="Submit" /> <input name="reset" type="reset" value="Reset" /></div>
				</form>
			</div>
			</div>
        <?php
        include 'footer.php';
        ?>
