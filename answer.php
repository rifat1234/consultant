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
$val1 = $_GET["exampleTextarea"];
$val2 = $_SESSION["username"];
$val3 = $_GET["hiddenField"];
$sql = "INSERT INTO Answer(answer,username,q_id)
VALUES ('$val1','$val2','$val3')";
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