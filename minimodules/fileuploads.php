<?php
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$templocation = $_FILES['file']['tmp_name'];
// image/jpeg
$extension = strtolower(substr($name, strpos($name, '.') + 1));

$location = 'Uploads/';
if (isset($name)) {
	if (!empty($name)) {
		if ($extension == "jpg"||$extension == "jpeg" && $type == "image/jpeg") {
			move_uploaded_file($templocation, $location.$name );
			echo 'Profile Photo has been uploaded! ';
		} else {
			echo 'Please only upload JPEG files. ';
		}
		
	}
	else{
		echo 'Please select a photo. ';
	}
}

?>

<form action="fileuploads.php" method="POST" enctype = "multipart/form-data">
	<input type="file" name="file" > <br> <br>
	<input type="submit" value="Submit">

</form>