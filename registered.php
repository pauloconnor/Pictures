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
		<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$email2 = $_POST['email2'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		if ($email != $email2)
		{
			echo "Email addresses do not match";
			echo '<div id="LoginForm">' .
				'<form id="register" name="register" method="post" action="registered.php">' .
				  '<div id="loginCaption">Register</div>' .
				    '<div id="detailsHolder">' .
				      '<div class="loginEmail">Name:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="name" value="'.$name.'" id="name" /><br /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Email:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="email" value="'.$email.'" id="email" /><br /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Confirm Email:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="email2" value="'.$email2.'" id="email2" /><br /></div>' .
				    '</div>' .
				    '<div id="detailsHolder">' .
				      '<div class="loginEmail">Password:</div>' .
				      '<div class="loginField"><input type="password" width="230" name="password" value="'.$password.'" id="password" /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Confirm Password:</div>' .
				      '<div class="loginField"><input type="password" width="230" name="password2" value="'.$password2.'" id="password2" /></div>' .
				    '</div>' .
				    '<div id="loginSubmit"><input name="Submit" type="submit" value="Submit" /> <input name="reset" type="reset" value="Reset" /></div>' .
				'</form>' .
			'</div>';
		}
		elseif ($password != $password2)
		{
			echo "Passwords do not match";
			echo '<div id="LoginForm">' .
				'<form id="register" name="register" method="post" action="registered.php">' .
				  '<div id="loginCaption">Register</div>' .
				    '<div id="detailsHolder">' .
				      '<div class="loginEmail">Name:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="name" value="'.$name.'" id="name" /><br /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Email:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="email" value="'.$email.'" id="email" /><br /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Confirm Email:</div>' .
				      '<div class="loginField"><input type="text" width="230" name="email2" value="'.$email2.'" id="email2" /><br /></div>' .
				    '</div>' .
				    '<div id="detailsHolder">' .
				      '<div class="loginEmail">Password:</div>' .
				      '<div class="loginField"><input type="password" width="230" name="password" value="'.$password.'" id="password" /></div>' .
				    '</div>' .
					'<div id="detailsHolder">' .
				      '<div class="loginEmail">Confirm Password:</div>' .
				      '<div class="loginField"><input type="password" width="230" name="password2" value="'.$password2.'" id="password2" /></div>' .
				    '</div>' .
				    '<div id="loginSubmit"><input name="Submit" type="submit" value="Submit" /> <input name="reset" type="reset" value="Reset" /></div>' .
				'</form>' .
			'</div>';
		}
		else
		{
		
			$query = "INSERT INTO users (name, email, password) VALUES ('".strtolower($name)."', '".strtolower($email)."',PASSWORD('".$password."'))";
			
			//echo $query;
			
			$result = mysql_query($query, $conn);
			
			if ($result == 1)
			{
				echo '<div id="LoginForm">'.
				'<form id="register" name="register" method="post" action="index.php">'.
				'  <div id="loginCaption">Registration Successful: Please Login</div>'.
				'    <div id="detailsHolder">'.
				'      <div class="loginEmail">Email:</div>'.
				'      <div class="loginField"><input type="text" width="230" name="email" value="'.$email.'" id="email" /><br /></div>'.
				'    </div>'.
				'    <div id="detailsHolder">'.
				'      <div class="loginEmail">password:</div>'.
				'      <div class="loginField"><input type="password" width="230" name="password" value="'.$password.'" id="password" /></div>'.
				'    </div>'.
				'    <div id="loginSubmit"><input name="Submit" type="submit" value="Submit" /> <input name="reset" type="reset" value="Reset" /></div>'.
				'</form>'.
			'</div>';
			}
		}	
		?>
       
		</div>



<?php 
include 'footer.php'; 
?>
