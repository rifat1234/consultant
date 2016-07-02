    <?php
						//question & answer
				      	$con=mysqli_connect("localhost", "root", "", "consult");
				      	//fetch question
						$sql = "SELECT  * FROM question WHERE 1 ORDER BY q_id DESC" ;
				      	$result = $con->query($sql);
						
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
								$valu = $row['username'];
								//fetch questioner of question
								$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
								$result2=$con->query($sql2);
								echo "<div class = \"jumbotron\" style=\"background-color:#e6ffe6;\"> ";
								if(mysqli_num_rows($result2) > 0){
									while($row2 = mysqli_fetch_assoc($result2)){
													$valu = $row2['image_url'].".jpg";
												
													//echo "<h3>".$valu."</h3>";
													echo "<div class=\"row\">";
													echo "<img class = \"col-md-4 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:80px;height:50px;\" >";
													echo "<p class = \"col-md-6\" >".$row2['first_name']." ".$row2['last_name']."</p>";
													echo "</div><hr>";
									}
								}    
								//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
						        
						        echo "<h2>". $row["question"]."</h2><hr>";
						        echo "<div class = \"row\">";
								//echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
								
								echo "<button class=\"glyphicon glyphicon-pencil ans\"> Answer </button>";
								echo "</div><hr>";
								
								echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["q_id"].">";
								//fetch answer
								$sql1 = "SELECT  * FROM answer WHERE q_id=".$row['q_id'];
								$result1 = $con->query($sql1);
								if(mysqli_num_rows($result1) > 0){
									while($row1 = mysqli_fetch_assoc($result1)){
										$valu = $row1['username'];
										//fetch answerer of question
										$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
										$result2=$con->query($sql2);
										if(mysqli_num_rows($result2) > 0){
											while($row2 = mysqli_fetch_assoc($result2)){
												$valu = $row2['image_url'].".jpg";
											
												//echo "<h3>".$valu."</h3>";
												echo "<div class=\"row\">";
												echo "<img class = \"col-md-4 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:80px;height:50px;\" >";
												echo "<p class = \"col-md-6\" >".$row2['first_name']." ".$row2['last_name']."</p>";
												echo "</div><hr>";
												
											}
										}
										//echo "<h3>".$row1['username']."</h3>";
										echo "<p>".$row1['answer']."</p>";
										echo "<hr>";
										echo "<div class = \"row\">";
										echo "<input class =\"a_id\" type=\"hidden\" name=\"hiddenField\" value=".$row1["a_id"].">";
										//find if upvoted
										$valo = $row1['a_id'];
										$me = $_SESSION['username'];
										$sql4 = "SELECT  * FROM upvote WHERE user_name='$me' AND a_id='$valo'";//.$row1['username'];
										$result4=$con->query($sql4);
										if(mysqli_num_rows($result4) > 0){
											
											$sql7 = "SELECT  * FROM upvote WHERE  a_id='$valo'";
											$result7 = $con->query($sql7);
											$ro = mysqli_num_rows($result7);
											echo "<button class=\"upv\"> Upvoted | ".$ro." </button>";
										}else{
											$sql7 = "SELECT  * FROM upvote WHERE  a_id='$valo'";
											$result7 = $con->query($sql7);
											$ro = mysqli_num_rows($result7);
											$ro = mysqli_num_rows($result4);
											echo "<button class=\"glyphicon glyphicon-thumbs-up upv\"> Upvote | ".$ro."</button>";
										}
										//echo "<button class=\"glyphicon glyphicon-pencil\"> Answer </button>";
										echo "</div><hr>";
								 }
								}
								
						        echo "</div><hr>";
						    }
						} 
						mysqli_close($con);

			      ?>