<?PHP
$user_name = "root";
$password = "";
$database = "consult";
$server = "localhost";
$con=mysqli_connect($server, $user_name, $password, $database);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";

?>


