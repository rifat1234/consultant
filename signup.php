<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Connecting MySQL Server</title>
</head>
<body>
<?PHP
/*
$user_name = "root";
$password = "";
$database = "db1";
$server = "localhost";

$db_handle = mysqli_connect($server, $user_name, $password);

$db_found = mysqli_select_db($database, $db_handle);

if ($db_found) {

print "Database Found ";
mysqli_close($db_handle);

}
else {

print "Database NOT Found ";

}
*/
$con=mysqli_connect("localhost", "root", "", "consult");
/*if($con){
	echo "database found";
	}else{
	echo "database not found";
}*/
//echo $_GET["pass"];
$val1 = $_GET['email'];
$val2 = $_GET['pass'];
$sql = "INSERT INTO login (username,pass)
VALUES ('$val1', '$val2')";

if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
    header('Location: signin.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


?>
</body>
</html>