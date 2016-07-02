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
//$sql = "INSERT INTO login (username,pass)
//VALUES ('$val1', '$val2')";
$sql = "SELECT pass FROM login WHERE username='$val1'" ;
$result = $con->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if ($row["pass"]==$val2){
        	//echo 'correct';
        	$_SESSION["login"]="ok";
            $_SESSION["username"]=$val1;
        	header('Location: home.php');
        }else {
        	//echo "Incorrect1";
        	header('Location: signin.html');
        }
    }
} else {
    //echo "Incorrect2";
    header('Location: signin.html');
}
mysqli_close($con);


?>
</body>
</html>