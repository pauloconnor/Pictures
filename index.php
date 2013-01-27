<!--
Name: index.php
Use: Site front page
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
		
		<?php
		//Select 6 random public images
		$query = "select p.pictureid as pictureid, u.userid as userid, p.description as description, p.filepath as filepath, u.name as UserName, p.thumbpath as thumbPath from pictures p " .
		"left join users u on p.userid = u.userid where p.public = 1 order by rand() limit 6";
		
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result))
		{
			$pictureid = $row['pictureid'];
			$userid = $row['userid'];
			$description = $row['description'];
			$filepath = $row['filepath'];
			$UserName = $row['UserName'];
			$thumbPath = $row['thumbPath'];
			$vanityurl = $filepath;
			
			//And display them
			echo '<div class="thumbnailOuter">' .
		        	'<div class="thumbnailImage"><a href="picture.php?p='. $pictureid.'"><img src="' . $thumbPath . '" width="320" height="180" /></a></div>' .
		        	'<div class="thumbnailText"><a class="blackLink username" href="user.php?u='.$userid.'">'.$UserName.'</a> - <a class="blackLink" href="picture.php?p='. $pictureid.'">'.$description.'</a></div>'.
		      	'</div>';
			
		}
			
		?>
		</div>
		<?php
		include 'footer.php';
         ?>
