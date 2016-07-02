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


$con=mysqli_connect("localhost", "root", "", "consult");
$val1 = $_GET["question"];
$val2 = $_SESSION["username"];
$sql = "INSERT INTO Question (username,question)
VALUES ('$val2','$val1')";
$result = $con->query($sql);
if($result){
    header("Location:home.php");
}else {
    header("Location:question.html");
}
mysqli_close($con);


?>
</body>
</html>