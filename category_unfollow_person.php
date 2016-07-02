<?php
// Start the session
session_start();
?>

<?php
	$con=mysqli_connect("localhost", "root", "", "consult");
	$user_name=$_SESSION['username'];//"rifat";
	$c_id= $_GET['c_id'];
	$sql="DELETE FROM category_follow_person WHERE user_name = '$user_name' AND c_id = '$c_id'"; 
	if (mysqli_query($con, $sql)) {
			echo "Record updated successfully";
		} 
		else {
			echo "Error updating record: " . mysqli_error($con);
		}
	mysqli_close($con);
?>