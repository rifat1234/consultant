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
Three steps 
Step 1 : Add question
Step 2 : Add Category if not added
Step 3 : Add Category for the Question
*/
include 'connect.php';
$val1 = $_GET["question"];
$val2 = $_SESSION["username"];
$val3 = $_GET["category"];



//Add Question
$sql = "INSERT INTO question (username,question)
VALUES ('$val2','$val1')";
$result = $con->query($sql);

//Finding Question id
$sql ="SELECT * FROM question WHERE question='$val1'";
$result =$con->query($sql);
$row = mysqli_fetch_assoc($result);
$q_id = $row['q_id'];

//Add Category if not added 
$val3=explode("~",$val3);
$sz = count($val3);
for($i=0;$i<$sz;$i++){
	$cat = $val3[$i];
	$sql = "SELECT * FROM Category_list WHERE c_name='$cat'";
	$result = $con->query($sql);
	if(mysqli_num_rows($result)==0){
		$sql = "INSERT INTO Category_list(c_name) VALUES ('$cat')";
		$result = $con->query($sql);
	}
	//Add Category for the question
	$sql = "INSERT INTO category_question(c_name,q_id) VALUES ('$cat','$q_id')";
	$result = $con->query($sql);

}


mysqli_close($con);


?>
</body>
</html>