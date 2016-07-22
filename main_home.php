        <div class="col-md-6 col-md-offset-2 main">
          <div class=" container-fluid">
			  <ul class=" nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home">Questions & Answers</a></li>
			    <!--
			    <li><a data-toggle="tab" href="#menu1">Article</a></li>
			    <li><a data-toggle="tab" href="#menu2">Consultants</a></li>
				-->
				<li><a data-toggle="tab" href="#menu3">Followed Q & A</a></li>
			  </ul>
			   <br>
			  <div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
			     	
			      <div class = "main_index">

			    <!--
				<a href="#credit" class="toggle btn btn-primary btn-block"">Ask a Question</a>

				<div id="credit" class="well hidden">
	

	<form class="form-horizontal" role="form" action="question.php" method = "get">
        <div class="form-group">
      <div>          
        <textarea type="comment" class="form-control" id="question" name = "question" placeholder="Question" rows="3">Write your question here</textarea>
      </div>
    </div>
    <div class="form-group">        
      <div">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

  </form>
  
  </br></br>
	</div>
-->
	<?php
		//quesiton answer part
		include 'main_home_QA.php';
	?>
	  
				
<!--			     	
			      <div class = "jumbotron">
				      <h3>Question</h3>
				      <p>Answer Answer Answer answer  answer </p>
				      <div class = "answer-question">
				      <hr>
				      <form class="form-horizontal">
				      	<fieldset class="form-group">
	    					<label for="exampleTextarea">Answer</label>
	    					<textarea class="form-control" id="exampleTextarea" rows="5"></textarea>
	  					</fieldset>
	  					<div class="form-group">        
					      <div class="col-md-offset-8 col-md-4 ">
					        <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
					      </div>
					    </div>


				      </form>
				      </div>
			      </div>
-->
			</div>
			    </div>
			    <div id="menu1" class="tab-pane">
			     <?php
			     	include 'main_home_article.php';
			     ?>
			    </div>

			    <div id="menu2" class="tab-pane">
			      <div class="jumbotron">
			       <h3>Consultants</h3>
				   <?php
				   		//Consultants 
				      	$con=mysqli_connect("localhost", "root", "", "consult");
				      	$sql = "SELECT  * FROM login WHERE 1" ;

						$result = $con->query($sql);
				      	if (mysqli_num_rows($result) > 0) {
						    // output data of each row
							$cnt = 3;
						    while(($row = mysqli_fetch_assoc($result)) && $cnt>0) {
								
								if($row['username']==$_SESSION['username'])continue;
								
								$val1=$_SESSION['username'];
								$val2 = $row['username'];
								
							 $sql1 = "SELECT  * FROM follow WHERE user_name='$val2' AND follower = '$val1'";
							 $result1 = $con->query($sql1);
							
							 if(mysqli_num_rows($result1)>0){
								 echo "<div class = fol>";
							  echo "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['username']. ">";
							  echo "<div class =\"row\"><div class=\"col-md-3\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
							  echo "</div>
	          			<div class=\"col-md-9\" >
	          				<p><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"followed_but fol_but\"> Followed </button>
	          			</div>
	          			</div></div><hr>";
							 }else{
								echo "<div class = fol>";
							  echo "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['username']. ">";
							  echo "<div class =\"row\"><div class=\"col-md-3\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
							  echo "</div>
	          			<div class=\"col-md-9\" >
	          				<p><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"glyphicon glyphicon-plus fol_but\">Follow</button>
	          			</div>
	          			</div></div><hr>"; 
							 }
							  //$cnt=$cnt-1;
						      
						    }
						} 
						mysqli_close($con);

			      ?>
			    	</div>
			    </div>
				<div id="menu3" class="tab-pane">
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
								$me = $_SESSION['username'];
								//search if following
								$sql4 = "SELECT  * FROM follow WHERE user_name='$valu' AND follower='$me'";
								$result4 = $con->query($sql4);
								if(mysqli_num_rows($result4) > 0);
								else continue;
								
								
								//fetch questioner of question
								$sql3 = "SELECT  * FROM login WHERE username='$valu'";//.$row1['username'];
								$result3=$con->query($sql3);
								echo "<div class = \"jumbotron\" style=\"background-color:#e6ffe6;\"> ";
								if(mysqli_num_rows($result3) > 0){
									while($row3 = mysqli_fetch_assoc($result3)){
													$valu = $row3['image_url'].".jpg";
												
													//echo "<h3>".$valu."</h3>";
													echo "<div class=\"row\">";
													echo "<img class = \"col-md-4 img-circle\" src=".$valu. " alt=\"Mountain View\" style=\"width:80px;height:50px;\" >";
													echo "<p class = \"col-md-6\" >".$row3['first_name']." ".$row3['last_name']."</p>";
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
										
										//find if upvoted
										$valo = $row1['a_id'];
										$me = $_SESSION['username'];
										$sql4 = "SELECT  * FROM upvote WHERE user_name='$me' AND a_id='$valo'";//.$row1['username'];
										$result4=$con->query($sql4);
										if(mysqli_num_rows($result4) > 0){
											$ro = mysqli_num_rows($result4);
											echo "<button class=\"upv\"> Upvoted | ".$ro." </button>";
										}else{
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
			 </div>
			 
			  </div>
			</div>

        </div>
        <br>