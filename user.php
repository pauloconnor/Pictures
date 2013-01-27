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
		if (ISSET($_GET['u']) && ($_GET['u'] > 0))
		{
			$userid = $_GET['u'];
		}
        if (!isset($_GET["start"]))
		{
			$start = 0;
		} 
		else 
		{
			$start = $_GET["start"];
		}
		
		        if (!isset($_GET["start"]))
		{
			$start = 0;
		} 
		else 
		{
			$start = $_GET["start"];
		}
		
		$query = "select count(*) as NoOfPictures from pictures p where userid = " . $userid;
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result))
		{
			$pagecount = ceil($row['NoOfPictures']/6);
		}
		
		if ($start >= 6 && ((($start+6)/6)<$pagecount))
		{
			$prev = $start - 6;
			$previousLink = '<a class="blackLink" href="' . $currPage . '?start=' . $prev . '&u=' . $userid .'"><< Previous</a>';
			$next = $start + 6;
			$nextLink = '<a class="blackLink" href="' . $currPage . '?start=' . $next . '&u=' . $userid .'">Next >></a>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		else if ((($start+6)/6) == $pagecount)
		{
			$prev = $start - 6;
			$previousLink = '<a class="blackLink" href="' . $currPage . '?start=' . $prev . '&u=' . $userid .'"><< Previous</a>';
			$next = $start + 6;
			$nextLink = 'NEXT >>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		else
		{
			$previousLink = '<< PREVIOUS';
			$next = $start + 6;
			$nextLink = '<a class="blackLink" href="' . $currPage . '?start=' . $next . '&u=' . $userid .'">Next >></a>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		
		$query = "select u.name as UserName from users u where u.userid = ".$userid;
		
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result))
		{
			$UserName = $row['UserName'];
			
			echo '<div class="headerText"><div id="controlHolder">'.$previousLink.' - '.$currentPage.' - '.$nextLink.'</div></div>';
			
		}
		
		
		$query = "select p.pictureid as pictureid, p.thumbPath, p.description as description, p.public as public, p.isProfilePic as profilePic from pictures p " .
		"where p.userid = ".$userid. " and p.public = 1 limit " . $start . ", 6";
		
		$result = mysql_query($query, $conn);
		echo '<table>';
		while($row = mysql_fetch_array($result))
		{
			$pictureid = $row['pictureid'];
			$userid = $row['userid'];
			$description = $row['description'];
			$filepath = $row['filepath'];
			$UserName = $row['UserName'];
			$thumbPath = $row['thumbPath'];
			$vanityurl = $filepath;
			
			
			echo '<div class="thumbnailOuter">' .
		        	'<div class="thumbnailImage"><a href="picture.php?p='. $pictureid.'"><img src="' . $thumbPath . '" width="320" height="180" /></a></div>' .
		        	'<div class="thumbnailText"><p class="editDesc" id="'.$pictureid.'">'.$description.'</p></div>'.
		      	'</div>';
			
		}
		echo '</table>';	
		?>
            </div>			
			</div>
            <?php 
include 'footer.php';
            ?>
