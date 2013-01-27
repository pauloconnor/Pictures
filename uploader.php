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
		
	$('input:checkbox').click(function(event){	 
		var id = this.id;	
		var checked = this.checked;
		//alert (id);
		//alert (checked);
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
	$www_config = str_replace('\\', '/', getcwd()) . "/";  //Get the current filesystem path
	$userid = $_COOKIE["userid"]; //What user is logged in
	$query = "select pictureid from pictures order by pictureid desc limit 1"; //What is the last pictureid that was used?
	
	$result = mysql_query($query, $conn);
	
	while($row = mysql_fetch_array($result))
	{
		$uniqueId = $row[pictureid]; //Get Last pictureid
	}

	foreach ($_FILES["ufile"]["error"] as $key => $error) { //For every file that we've added
    if ($error == UPLOAD_ERR_OK) { //If it uploaded without error
    	$tmp_name = $_FILES["ufile"]["tmp_name"][$key]; //What's it called on our webserver
        $filename = $_FILES["ufile"]["name"][$key]; //And what do we want to call it?
		$description = $_POST["description".$key]; //What's it's description?
		$public = 1; //Let's force it to be public

		$uniqueId = $uniqueId + 1; //New ID

		// Create needed folders year/month/day/userid/
		$filepath = "resources/uploads/".date("y")."/".date("m")."/".date("d")."/".$userid;
		if (!file_exists("resources/uploads/".date("y"))){mkdir($www_config."resources/uploads/".date("y"), 0777, true);} 
		if (!file_exists("resources/uploads/".date("y")."/".date("m"))){mkdir($www_config."resources/uploads/".date("y")."/".date("m"), 0777, true);} 
		if (!file_exists("resources/uploads/".date("y")."/".date("m")."/".date("d"))){mkdir($www_config."resources/uploads/".date("y")."/".date("m")."/".date("d"), 0777, true);} 
		if (!file_exists("resources/uploads/".date("y")."/".date("m")."/".date("d")."/".$userid)){mkdir($www_config."resources/uploads/".date("y")."/".date("m")."/".date("d")."/".$userid, 0777, true);} 
		
		$filepath1 = $filepath."/".$uniqueId."_".$filename;
		
		//copy file to where you want to store file
		move_uploaded_file($tmp_name, $www_config . $filepath1);
		
		
		$filesize = $HTTP_POST_FILES["ufile"]["size"][$key];
		$filetype = $HTTP_POST_FILES['ufile']["type"][$key];
		
		if ($filesize < 1)
		{
			$filesize = 0;
		}
		
		
		if ($description == "")
		{
			$description = $filename;
		}
		
		//$filepath = $filepath . "/";
		$filename = $uniqueId . "_" . $filename;


		#Create thumbnails
		$new_width = 320;
		$new_height = 180;
		$img = imagecreatefromjpeg($filepath1);
		$width = imagesx( $img );
		$height = imagesy( $img );
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		$thumbPath = "{$filepath}/th_{$uniqueId}_{$filename}";
		imagejpeg( $tmp_img, $www_config . $thumbPath );
		
		if(file_exists("{$www_config}{$filepath}/th_{$uniqueId}_{$filename}"))
		{
			$result = mysql_query('BEGIN', $conn);
		
		    $query = "INSERT INTO pictures (userid, filename, filepath, description, filesize, filetype, thumbPath, public) VALUES (".$userid .", '".$filename."', '".$filepath."', '".$description."',  ".$filesize.", '".$filetype."', '".$thumbPath."',".$public.");";
			
			//echo $query . "<br />";
		    try {
		            $result = mysql_query($query, $conn);
		            //echo $result . $query . '<br />';
					if ($result != 1) {
						throw new Exception ('An error has occured');
					}
			}
			catch (Exception $e) 
			{
		        echo "DB Write Failed" . $e;
		        $result = mysql_query('ROLLBACK', $conn);
		    }
			
		   $result = mysql_query('COMMIT', $conn);
		   //echo 'Files Uploaded Successfully' . '<br />';
		   
		   $query = "select pictureid, public as publicPic from pictures order by pictureid desc limit 1";

			$result = mysql_query($query, $conn);
			
			while($row = mysql_fetch_array($result))
			{
				$pictureid = $row[pictureid];
				$public = $row[publicPic];
				if ($public=1) 
				{ 
					$checked='checked="true"';
				}
				
			}
		   	echo '<div class="thumbnailOuter">' . "\n" . 
		        	'<div class="thumbnailImage"><img src="' . $thumbPath . '" width="320" height="180" /></a></div>' . "\n" . 
		        	'<div class="thumbnailText"><p class="editDesc" id="'.$pictureid.'">'.$description.'</p><input type="checkbox" '.$checked.' id="'.$pictureid.'" name="public[' . $pictureid .']">Public</div>'. "\n" . 
		      	'</div>'; 
			    
			
		}
		
		else {
			if($filesize==0) 
			{
				echo "There're something error in your file " . $key;
				echo "<BR />";
			}
			
		
		}
}
}
               
?>
</div>
<?php
include 'footer.php'; 

            ?>
