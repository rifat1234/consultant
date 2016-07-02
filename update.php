<?PHP
Session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Connecting MySQL Server</title>
</head>
<body>
<?PHP
$con=mysqli_connect("localhost", "root", "", "consult");
$val1 = $_GET['name'];
$val2 = $_GET['address'];
$val3=$_SESSION['username'];
//$val3="rifat@gmail.com";
$val4=$_GET['pass'];

$sql = "UPDATE login SET first_name='$val1',address='$val2',pass='$val4' WHERE username='$val3'";



if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
	header("Location:view_profile.php");
} else {
    echo "Error updating record: " . mysqli_error($con);
}
mysqli_close($con);


?>
</body>
</html>