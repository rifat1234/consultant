<?php
	if(!empty($_GET['q']))
	{
		include 'connect.php';
		$q=$_GET['q'];
		$query="SELECT DISTINCT c_name from Category_list where c_name like '%$q%'";
		$result=mysqli_query($con,$query);
		$count = 0;
		while($output=mysqli_fetch_assoc($result))
		{
			$count++;
			if($count>=6)break;
			echo '<div class="sug"  onclick="addTag(this)">'. $output['c_name'].'</div>';
		}
	}
?>