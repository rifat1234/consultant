<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Consultant</title>
</head>
<body>
<?PHP
	$_SESSION["login"]="notok";
	header('location:index.php');

?>
</body>
</html>