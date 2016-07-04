<?php
// Start the session
session_start();
?>

<?php
	$con=mysqli_connect("localhost", "root", "", "consult");
	$user_name=$_SESSION['username'];//"rifat";
	$a_id= $_GET['a_id'];//"5";
	$sql="INSERT INTO upvote (user_name,a_id) VALUES('$user_name','$a_id')";
	if (mysqli_query($con, $sql)) {
		echo "Record updated successfully";
	} 
	else {
		echo "Error updating record: " . mysqli_error($con);
	}
	$sql = "UPDATE answer SET up_vote = up_vote+1 where a_id = '$a_id' ";
 	if (mysqli_query($con, $sql)) {
		echo "Record updated successfully";
	} 
	else {
		echo "Error updating record: " . mysqli_error($con);
	}	

	mysqli_close($con);
?>