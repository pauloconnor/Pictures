<?php
include 'header.php';
?>
<title>PICTURES.IE - ONLINE IMAGE HOST FOR IRELAND</title>
</head>
<body>
    <div id="pageMiddle">
        <?php
        include 'menu.php';
        ?>
        <div id="centerContent">
			<div id="LoginForm">
				<form id="register" name="register" method="post" action="registered.php">
				  <div id="loginCaption">Register</div>
				    <div id="detailsHolder">
				      <div class="loginEmail">Name:</div>
				      <div class="loginField"><input type="text" width="230" name="name" id="name" /><br /></div>
				    </div>
					<div id="detailsHolder">
				      <div class="loginEmail">Email:</div>
				      <div class="loginField"><input type="text" width="230" name="email" id="email" /><br /></div>
				    </div>
					<div id="detailsHolder">
				      <div class="loginEmail">Confirm Email:</div>
				      <div class="loginField"><input type="text" width="230" name="email2" id="email2" /><br /></div>
				    </div>
				    <div id="detailsHolder">
				      <div class="loginEmail">Password:</div>
				      <div class="loginField"><input type="password" width="230" name="password" id="password" /></div>
				    </div>
					<div id="detailsHolder">
				      <div class="loginEmail">Confirm Password:</div>
				      <div class="loginField"><input type="password" width="230" name="password2" id="password2" /></div>
				    </div>
				    <div id="loginSubmit"><input name="Submit" type="submit" value="Submit" /> <input name="reset" type="reset" value="Reset" /></div>
				</form>
			</div>
			
        </div>
        <?php
        include 'footer.php';
        ?>
