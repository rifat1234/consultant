<?php
include 'connect.php';
$val1 = $_POST['email'];
$val2 = $_POST['pass'];
$val3 = $_POST['firstname'];
$val4 = $_POST['lastname'];

$target_dir = "uploads/";
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
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
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

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	
	echo "uploads/".$newfilename;
}

$val5 = "uploads/".$_POST['email'];
$sql = "INSERT INTO login (username,pass,first_name,last_name,image_url)
VALUES ('$val1', '$val2','$val3','$val4','$val5')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
    header('Location: index.php#login-modal');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>