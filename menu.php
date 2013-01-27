<!--
Name: menu.php
Use: Displays menu and header of page
-->
	<div id="header">
    	<div id="logo"><a class="whiteLink" href="index.php">PICTURES</a></div>

				<?php
				if (ISSET($_GET['logout'])) //If someone just logged out, show them the normal menu
				{
					//Already set in Header.php
					//$value = -1;
					//setcookie("userid", $value, time()-3600);
					//print '<a href="index.php">HOME</a> | <a href="browse.php">BROWSE</a> | <a href="login.php">LOGIN</a> | <a href="register.php">REGISTER</a>';
					?>
					<div id="navHolder">
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="register.php">Register</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="login.php">Login</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="browse.php">Browse</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="index.php">Home</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>    
			        </div>
		<?php	
				}
				elseif (($_COOKIE["userid"] > 0) || ($userid >0)) //If a cookie exists, get the userid and show the menu
				{
					if ($userid < 1) 
					{
						$userid = $_COOKIE["userid"];
					}
					#'echo $userid;
					/*$query = "select count(messageid) as Unread from messages m where touserid = " . $userid . " and isread=0";
					$result = mysql_query($query, $conn);
					while($row = mysql_fetch_array($result))
					{					
						$unread1 = $row[Unread];
					}*/
					?>
			
					<div id="navHolder">
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="index.php?logout=1">LOGOUT</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <!--<div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><?php echo'<a class="whiteLink" href="messages.php">MESSAGES ('.$unread1.')</a>'; ?></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
						<div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="friends.php">FRIENDS</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>-->
						<div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="upload.php">UPLOAD</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
						<div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="profile.php">Profile</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="browse.php">Browse</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="index.php">Home</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>    
			        </div>
					
				<?php	
				}
				else
				{
					//Otherwise it's the normal menu
					?>
					<div id="navHolder">
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="register.php">Register</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="login.php">Login</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="browse.php">Browse</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>
			            <div class="navTab">
			                <div class="buttonLeft">&nbsp;</div>
			                <div class="buttonBg"><a class="whiteLink" href="index.php">Home</a></div>
			                <div class="buttonRight">&nbsp;</div>
			            </div>    
			        </div>
				<?php	
				}?>
</div>

<?php
#}
?>