<?php
	include 'connect.php';
	$email = $_GET['email'];//"rifatmosdfdsfnzur@gmail.com";//
	$query="SELECT * from login where username ='$email' ";
	$result=mysqli_query($con,$query);
	if($result){		
		if (mysqli_num_rows($result) > 0) {
	    echo "This Email Already exist";
	    //header('Location: signin.php');
		}else echo "unique";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);
?>