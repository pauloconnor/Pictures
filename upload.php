<?php 

include 'header.php';

?>
<title>PICTURES.IE - ONLINE IMAGE HOST FOR IRELAND</title>

<script type="text/javascript" language="javascript" charset="utf-8"> 
 
var textNumber=1;
 
function anotherFile(){
	data='<div id="file">Select file: <input name="ufile[]" type="file" id="ufile[]" size="30" /> Description: <input name="description'+textNumber+'" type="textbox" id="description'+textNumber+'" size="50" /><br/></div>';
	$("#files").append(data);
	textNumber = textNumber + 1;

}
</script>

</head>
<body>
    <div id="pageMiddle">
        
        <?php include 'menu.php'; 
        ?>
		<div id="centerContent">
           
            <div id="fileWrapper">File Uploader
				<form action="uploader.php" method="post" enctype="multipart/form-data" name="uploader" id="uploader">
                    <div id="files">
				        <div id="file">
				            Select file: <input name="ufile[]" type="file" id="ufile[]" size="30" /> 
				            Description: <input name="description0" type="textbox" id="description0" size="50" /><br/>
				        </div>
					</div>
				      <p><a class="blackLink" href="javascript:anotherFile()"><B>Add More Files</B></a></p>
				      <input type="submit" name="Submit" value="Upload All Files" />
				  
                </form>
				
			</div>
			</div>
                
            <?php include 'footer.php'; ?>
