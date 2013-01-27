<!--
Name: browse.php
Use: View all pictures on the site
-->

<?php
include 'header.php'; //Call in Header file
?>
<title>PICTURES - ONLINE IMAGE HOST FOR IRELAND</title>
</head>
<body>
    <div id="pageMiddle">
        <?php
        include 'menu.php'; //Call in Menu file
        ?>
        <div id="centerContent">
            <?php
            
            if (! isset ($_GET["start"])) //Are we only starting to view pictures?
            {
                $start = 0; //If we are, start at the start
            }
            else
            {
                $start = $_GET["start"]; //Else carry on where we stopped
            }
            
            $query = "select count(*) as NoOfPictures from pictures p where public = 1"; //Count how many public pictures there are
            $result = mysql_query($query, $conn);
            
            while ($row = mysql_fetch_array($result))
            {
                $pagecount = ceil($row['NoOfPictures']/6); //How many pages of pictures will we have?
            }
            
            //Used to calculate navigation links
			if ($start >= 6 && ((($start+6)/6) < $pagecount))
            {
                $prev = $start-6;
                $previousLink = '<a class="blackLink" href="browse.php?start='.$prev.'"><< Previous</a>';
                $next = $start+6;
                $nextLink = '<a class="blackLink" href="browse.php?start='.$next.'">Next >></a>';
            
                $currentPage = (($start+6)/6)."/".$pagecount;
            }
            else if ($pagecount <2)
			{
				$previousLink = '<< PREVIOUS';
				$nextLink = 'NEXT >>';
				$currentPage ="1/1";
			}
			else if ((($start+6)/6) == $pagecount)
            {
                $prev = $start-6;
                $previousLink = '<a class="blackLink" href="browse.php?start='.$prev.'"><< Previous</a>';
                $next = $start+6;
                $nextLink = 'NEXT >>';
            
                $currentPage = (($start+6)/6)."/".$pagecount;
            } 
			else
            {
                $previousLink = '<< PREVIOUS';
                $next = $start+6;
                $nextLink = '<a class="blackLink" href="browse.php?start='.$next.'">Next >></a>';
                $currentPage = (($start+6)/6)."/".$pagecount;
            }
            echo '<div class="headerText"><div id="controlHolder">'.$previousLink.' - '.$currentPage.' - '.$nextLink.'</div></div>';
            
			//Select all public images
            $query = "select p.pictureid as pictureid, u.userid as userid, p.description as description, p.filepath as filepath, p.thumbPath as thumbPath, u.name as UserName from pictures p ".
            "left join users u on p.userid = u.userid where p.public = 1 limit ".$start.", 6";
            
            $result = mysql_query($query, $conn);
            
            while ($row = mysql_fetch_array($result))
            {
                $pictureid = $row['pictureid'];
                $userid = $row['userid'];
                $description = $row['description'];
                $filepath = $row['filepath'];
                $UserName = $row['UserName'];
                $thumbPath = $row['thumbPath'];
                $vanityurl = $filepath;
            
            	//Display the thumbnails
                echo '<div class="thumbnailOuter">'.
                '<div class="thumbnailImage"><a href="picture.php?p='.$pictureid.'"><img src="'.$thumbPath.'" width="320" height="180" /></a></div>'.
                '<div class="thumbnailText"><a class="blackLink" href="user.php?u='.$userid.'">'.$UserName.'</a> - <a class="blackLink" href="picture.php?p='. $pictureid.'">'.$description.'</a></div>'.
                '</div>';
            
            }
            
            ?>
        </div>
        <?php
        include 'footer.php'; //Include the footer file
        ?>
