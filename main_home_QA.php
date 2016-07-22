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
								//$sql2 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
								//$result2=$con->query($sql2);
								echo "<div class = \"jumbotron \" > ";
								   
								
						        
						        $url ="\"". "QA.php?q_id=".$row["q_id"]."\"";
						        
						        echo "<h2><a href=".$url."><font color = \"#000\"> ". $row["question"]."</font></a></h2>"; 
								
								echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["q_id"].">";
								//fetch answer
								$sql1 = "SELECT  * FROM answer WHERE q_id=".$row['q_id']. " ORDER BY up_vote DESC";
								$result1 = $con->query($sql1);
								if(mysqli_num_rows($result1) > 0){
									//while($row1 = mysqli_fetch_assoc($result1)){
										$row1 = mysqli_fetch_assoc($result1);
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
										if(strlen($ans)>170){
											
											$ans_st = substr($ans,0,170);
											$ans_st = substr($ans_st, 0, strrpos($ans_st, ' '));
											
											$ans_res=substr($ans,strrpos($ans_st, ' ')-1);
											$ans_res="<span class=\"hidden_ans\"style=\"display:none;\">".$ans_res."</span>"; 
											
											$ans = $ans_st."<button class = \"btn btn-link more\" onclick=\"show_ans(this)\">(more)</button>".$ans_res;

										}

										echo "<p>".$ans."</p>";

										//echo "<div class = \"row\">";
										echo "<input class =\"a_id\" type=\"hidden\" name=\"hiddenField\" value=".$row1["a_id"].">";
										//find if upvoted
										$valo = $row1['a_id'];
										$me = $_SESSION['username'];

										//find if this guy upvoted ?										
										$sql4 = "SELECT  * FROM upvote WHERE user_name='$me' AND a_id='$valo'";//.$row1['username'];
										$result4=$con->query($sql4);
										//this guy upvoted
										if(mysqli_num_rows($result4) > 0){
											
											//find the number of upvote
											$sql7 = "SELECT  * FROM upvote WHERE  a_id='$valo'";
											$result7 = $con->query($sql7);
											$ro = mysqli_num_rows($result7);
											echo "<div class = \"\" >";
											echo "<button class=\"btn btn-default btn-sm upv\"> Upvoted | ".$ro."</button>";
											echo "</div>";
										}else{//this guy didn't upvote
											//find the number of upvote
											$sql7 = "SELECT  * FROM upvote WHERE  a_id='$valo'";
											$result7 = $con->query($sql7);
											//$ro = mysqli_num_rows($result7);
											$ro = mysqli_num_rows($result4);
											//echo "<button class=\"glyphicon glyphicon-thumbs-up upv\"> Upvote | ".$ro."</button>";
											echo "<div class = \"\">";
											echo "<button class=\"btn btn-default btn-sm  upv\"> Upvote | ".$ro."</button>";
											echo "</div>";
										}
										//echo "<button class=\"glyphicon glyphicon-pencil\"> Answer </button>";
										//echo "</div>";
								 //}
								}else{
									echo "<div class = \"\">";
									//echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
									echo "<button class=\"btn btn-default btn-sm glyphicon glyphicon-pencil ans\"> Answer </button>";
									echo "</div>";
								}
								
						        echo "</div>";
						    }
						} 
						mysqli_close($con);

			      ?>