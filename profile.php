<?php 
include 'header.php';
?>
<title>PICTURES.IE - ONLINE IMAGE HOST FOR IRELAND</title>
<script type="text/javascript" charset="utf-8">
	
	//All Javascript below based on 3rd party Javascript - JQuery http://jquery.com/
	$(document).ready(function() 
	{
	$('.editDesc').editable('_description.php', {
		indicator : 'Saving...',
		tooltip   : "Click to edit description",
		style  : "inherit"
	});
	
	$('.nameEdit').editable('_name.php', {
		indicator : 'Saving...',
		tooltip   : 'Click to edit name'
	});
		
	$('input:checkbox').click(function(event){	 
		var id = this.id;	
		var checked = this.checked;

		$.post("_public.php",{
			id: id,
			status: checked});
	});

 });
	//End third party code
</script>
</head>
<body>
    <div id="pageMiddle">
        <?php 
		include 'menu.php'; 
		?>
		<div id="centerContent">
		
		<?php
		
		$userid = $_COOKIE["userid"];
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
		
		//Sort out navigation pages
		if ($start >= 6 && ((($start+6)/6)<$pagecount))
		{
			$prev = $start - 6;
			$previousLink = '<a class="blackLink" href="profile.php?start=' . $prev . '"><< Previous</a>';
			$next = $start + 6;
			$nextLink = '<a class="blackLink" href="profile.php?start=' . $next . '">Next >></a>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		else  if ($pagecount <= 1)
			{
				$previousLink = '<< PREVIOUS';
				$nextLink = 'NEXT >>';
				$currentPage ="1/1";
			}
		else if ((($start+6)/6) == $pagecount)
		{
			$prev = $start - 6;
			$previousLink = '<a class="blackLink" href="profile.php?start=' . $prev . '"><< Previous</a>';
			$next = $start + 6;
			$nextLink = 'NEXT >>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		else
		{
			$previousLink = '<< PREVIOUS';
			$next = $start + 6;
			$nextLink = '<a class="blackLink" href="profile.php?start=' . $next . '">Next >></a>';
			
			$currentPage = (($start+6)/6)."/".$pagecount;
		}
		
		$query = "select u.name as UserName from users u where u.userid = ".$userid;
		
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result))
		{
			$UserName = $row['UserName'];
			
			echo '<div class="headerText"><div id="controlHolder">'.$previousLink.' - '.$currentPage.' - '.$nextLink.'</div>Welcome <b class="nameEdit" id='.$userid.'>'.$UserName.'</b>!</div>';
			
		}

		
		$query = "select p.pictureid as pictureid, p.thumbPath, p.description as description, p.public as public, p.isProfilePic as profilePic from pictures p " .
				"where p.userid = ".$userid." limit " . $start . ", 6";
		
		$result = mysql_query($query, $conn);
		
		while($row = mysql_fetch_array($result))
		{
			$pictureid = $row['pictureid'];
			$userid = $row['userid'];
			$description = $row['description'];
			$filepath = $row['filepath'];
			$public = $row['public'];
			$UserName = $row['UserName'];
			$thumbPath = $row['thumbPath'];
			$vanityurl = $filepath;
			if ($public==1) 
			{ 
				$checked='checked="true"';
			}
			else{
				$checked='';
			}
			
			
			echo "<div class='thumbnailOuter'>\n";
		    echo '<div class="thumbnailImage"><a href="picture.php?p='. $pictureid.'"><img src="' . $thumbPath . '" width="320" height="180" /></a></div>'."\n";
			echo '<div class="thumbnailText"><div class="description editDesc">'.$description.'</div><div class="description"><input type="checkbox" '.$checked.' id="'.$pictureid.'"  name="public">Public</div></div>'."\n";
		    echo '</div>'."\n";
			
		}
			
		?>
            </div>
            <?php 
include 'footer.php';
            ?>
