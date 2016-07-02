<div class="col-md-6 col-md-offset-2 main">
          <div class=" container-fluid">
			  <ul class=" nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home">Questions & Answers</a></li>
			    <li><a data-toggle="tab" href="#menu1">Article</a></li>
			    <li><a data-toggle="tab" href="#menu2">Consultants</a></li>
			 
			  </ul>
			   <br>
<div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
			     	
			      <div class = "jumbotron">
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
										echo "<button class=\"glyphicon glyphicon-thumbs-up upv\"> Upvote </button>";
										//echo "<button class=\"glyphicon glyphicon-pencil\"> Answer </button>";
										echo "</div><hr>";
								 }
								}
								
						        echo "</div><hr>";
						    }
						} 
					mysqli_close($con);

			      ?>
			      
			    </div>
				
				</div>
			    <div id="menu1" class="tab-pane fade">
			      <div class="jumbotron">
			     <button type="button" class="btn btn-primary btn-block">Want to post an Article?</button>
				  <?php	
					$con=mysqli_connect("localhost", "root", "", "consult");
					$sql = "SELECT  * FROM article WHERE 1 ORDER BY art_id DESC" ;
					$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
						        echo "<div class = \"jumbotron\"> ";
						        echo "<h3><i><strong>". $row["title"]."</strong></i></h3>";
						        //echo "<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value=".$row["art_id"].">";
								$link="article.php?q=".$row["art_id"];
								$string = strip_tags($row["article"]);

								if (strlen($string) > 50) {
								$stringCut = substr($string, 0, 50);
								$string = substr($stringCut, 0, strrpos($stringCut, ' '))."    <button> Read More </button>"; 
								}
						        echo "<p class=\"text-left\">".$string."</p>";
						        
						        echo "<div class = \"row\">";
								echo "<button class=\"glyphicon glyphicon-thumbs-up\"> Upvote </button>";
								echo "<hr>";
								echo "</div>";
						        echo "</div>";
						    }
						} 
						mysqli_close($con);

?>
			      </div>
			    </div>
			    <div id="menu2" class="tab-pane fade">
			      <div class="jumbotron">
			       <h3>Consultants</h3>
				  <?php
				      	$con=mysqli_connect("localhost", "root", "", "consult");
						$sql = "SELECT  * FROM login";
						$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {
						echo "<div class =\"row\">";
	          			echo "<div class=\"col-md-3\" >";
						echo "<img src=".$row["image_url"].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
	          			echo "</div>";
	          			echo "<div class=\"col-md-9\" >";
						echo "<p>". $row["first_name"]." ".$row["last_name"]."<p>";
	          			echo "<button class=\"glyphicon glyphicon-plus\"> Follow </button>";
	          			echo "</div>";
	          			echo "</div>";	
						echo "<hr></hr>";
						    }
						} 
						mysqli_close($con);
					?>
			    	</div>
			    </div>
			 
			  </div>
			</div>

        </div>
        <br>