<?php
session_start();
?>

<?php
include 'connect.php';
$target_dir = "uploads/";
$val1 = $_SESSION['username'];
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
//$newfilename ='tamim' . '.' . end($temp);
$newfilename =$val1.'.' . end($temp);
$target_file = $target_dir . basename($newfilename);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file); 
}

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		header('Location: view_profile.php');
	} else {
        echo "Sorry, there was an error uploading your file.";
    }
	
	echo "uploads/".$newfilename;
}
mysqli_close($con);

?>