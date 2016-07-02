<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:index.php');	
}

?>
<?php
	$title=$_POST["title"];
	$art=$_POST["article"];
	$user=$_SESSION["username"];
	$con=mysqli_connect("localhost", "root", "", "consult");
	$sql = "INSERT INTO article (username,article,title)
VALUES ('$user','$art','$title')";
	
	
	$result = $con->query($sql);
	if($result){
		$id = "SELECT  * FROM article WHERE 1" ;
	$result2 = $con->query($id);
	if (mysqli_num_rows($result2) > 0) {
	while($row = mysqli_fetch_assoc($result2)) {
		$link="article.php?q=".$row["art_id"];
	
	}
	}
	header("Location:".$link);
	}
	
	else {
    header("Location:article_compose.php");
}
mysqli_close($con);

?>