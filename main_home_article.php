 <div class="jumbotron">
			     <a href="article_compose.php" <button class="btn btn-primary btn-block" >Write an Article!</a>
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
								$string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href=".$link.">Read More</a>"; 
								}
						        echo "<p class=\"text-left\">".$string."</p>";
						        echo "<hr>";
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