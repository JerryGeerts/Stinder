<?php
	$location = '../../AVATAR/';
	$filename = $_FILES['fileToUpload']['name'];
	$tmp_name = $_FILES['fileToUpload']['tmp_name'];

	$imageFileType = pathinfo($location.$filename,PATHINFO_EXTENSION);

	if (isset($name)) {
		if (!empty($name)) {
				if (move_uploaded_file($tmp_name, $location.$filename)) {
				echo "uploaded";
			}
			else {
				echo "shits messed up";
			}
		}
		else
		{
			echo "please choose a file";
		}
	}
?>


<form action="testupload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>