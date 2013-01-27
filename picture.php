<!--
Name: picture.php
Use: Used to larger size image
-->

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
        <div id="centerPictureContent">
            <?php
            if (! isset ($_GET["p"])) //If no image has been specified, show a random image
            {
                $query = "select p.pictureid as pictureid from pictures p where p.public = 1 order by rand() limit 1";
                $result = mysql_query($query, $conn);
            
                while ($row = mysql_fetch_array($result))
                {
                    $pictureid = $row['pictureid'];
                }
            }
            else
            {
                $pictureid = $_GET["p"]; //Otherwise get the image id and load the picture
            }
            
            $query = "select p.pictureid as pictureid, u.userid as userid, u.name as UserName, p.thumbPath, p.filepath as filepath, p.filename as filename, p.description as description, p.public as public from pictures p ".
            "left join users u on p.userid = u.userid where p.pictureid = ".$pictureid." and p.public = 1";
            
            $result = mysql_query($query, $conn);
			
            $noOfResults = mysql_num_rows($result);
			
            if ($noOfResults > 0) //If the picture exists and is public, display it
            {
                while ($row = mysql_fetch_array($result))
                {
                    $pictureid = $row['pictureid'];
                    $userid = $row['userid'];
                    $description = $row['description'];
                    $filepath = $row['filepath'];
                    $filename = $row['filename'];
                    $UserName = $row['UserName'];
                    $thumbPath = $row['thumbPath'];
                    $imagePath = $filepath."/".$filename;
                    $public = $row['public'];
            
            
            
                    echo '<div class="imageOuter">'.
                    '<div class="imageImage"><a href="'.$filepath.'/'.$filename.'" title="Click for full image size"><img src="'.$imagePath.'" width="900"/></a></div>'.
                    '<div class="imageText"><a class="blackLink" href="user.php?u='.$userid.'">'.$UserName.'</a> - <a class="blackLink" href="'.$filepath.'/'.$filename.'">'.$description.'</a></div>'.
                    '</div>';
            
            
            
                }
            }
            else //Otherwise display image
            {
                echo '<div class="headerText">No such picture exists</div>';
            }
            
            ?>
        </div>
        <?php
        include 'footer.php';
        ?>
