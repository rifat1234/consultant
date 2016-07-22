<div class="col-md-6 col-md-offset-2 main">
    <div class=" container-fluid">
    	<?php 
    		include 'connect.php';
    		

    		//fetch question
			$q_id = $_GET['q_id'];
			$sql = "SELECT  * FROM question WHERE q_id='$q_id'" ;
			$result = $con->query($sql); 
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				echo "<h2><font color = \"#000\"> ". $row["question"]."</font></h2>";
				echo "<div class = \"\">";
				echo "<button class=\"glyphicon glyphicon-pencil ans\"> Answer </button>";
				echo "</div><hr>";

				//fetch answers
				$sql1 = "SELECT  * FROM answer WHERE q_id=".$q_id. " ORDER BY up_vote DESC";
				$result1 = $con->query($sql1);
				//echo mysqli_num_rows($result1);
				if(mysqli_num_rows($result1) > 0){
					while($row1 = mysqli_fetch_assoc($result1)){
						echo "<div>";
						$valu = $row1['username'];
						
						//fetch answerer of question
						$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
						$result2=$con->query($sql2);
						if(mysqli_num_rows($result2) > 0){
							while($row2 = mysqli_fetch_assoc($result2)){
								$valu = $row2['image_url'].".jpg";
							
								//echo "<h3>".$valu."</h3>";
								echo "<div class=\"row\" style=\"\">";
								echo "<img class = \"col-md-1 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:65px;height:40px;\" >";
								echo "<p class = \"\" style=\" \">".$row2['first_name']." ".$row2['last_name']."</p>";
								echo "</div>";
							}
						}
						//echo "<h3>".$row1['username']."</h3>";
						$ans = $row1['answer'];
						echo "<p>".$ans."</p>";
						echo "<div class = \"\">";
						echo "<button class=\"glyphicon glyphicon-thumbs-up upv\"> Upvote </button>";
						//echo "<button class=\"glyphicon glyphicon-pencil\"> Answer </button>";
						echo "</div></div><hr>";
				 	}
				}
			}
			
    	?>
    </div>
</div>