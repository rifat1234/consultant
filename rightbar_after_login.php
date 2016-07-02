<div class = "rightbar">
	        <div class="col-md-3 ">
	        	<ul class = "nav-sidebar person">
	          		<h4>Consultants </h4>
	          		<hr>
	          		<?php
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
							
							 if(mysqli_num_rows($result1)>0)continue;
							  $cnt=$cnt-1;
						      echo "<div class = fol>";
							  echo "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['username']. ">";
							  echo "<li><div class =\"row\"><div class=\"col-md-3\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
							
	          			echo "</div><div class=\"col-md-9\" >
	          				<p><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"glyphicon glyphicon-plus fol_but\"> Follow </button>
	          			</div>
	          			</div></li></div>";
						    }
						} 
						mysqli_close($con);

			      ?>

	          	</ul>
	          	<br>
	          	<ul class = "nav-sidebar topic">
	          		<h4>Topics </h4>
	          		<hr>
	          		

	          	<?php
	          			$con=mysqli_connect("localhost", "root", "", "consult");
	          			$ar= array();
	          			while(count($ar)<3){
	          				$rd = rand(1,25);
	          				$sql = "SELECT  c_name,c_id FROM Category_list WHERE c_id='$rd'" ;
	          				$result=$con->query($sql);
	          				if (mysqli_num_rows($result) > 0){
	          					while($row = mysqli_fetch_assoc($result)){

	          						$c_name = $row['c_name'];
	          						$c_id = $row['c_id'];
	          						$user_name = $_SESSION['username'];
	          						$sql = "SELECT COUNT(*) as cnt FROM category_follow_person WHERE c_id='$c_id' AND user_name='$user_name'";
	          						$res = $con->query($sql);
	          						$res = mysqli_fetch_assoc($res);

	          						$butn = "<button class=\"glyphicon glyphicon-plus\"> Follow </button>";
	          						if($res['cnt']>0){
	          							$butn ="<button class=\"\">Followed</button>";
	          						}

	          						$sz = count($ar);
	          						array_push($ar, $c_name);
	          						$ar = array_unique($ar);
	          						if($sz==count($ar))continue;
	          						$apnd =  "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['c_id']. ">";
	          						echo "<li>
	          						<div class =\"row\">
	          						<div class=\"col-md-3\" >
	          						<img src=\"images/pro_pic.jpg\" alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">
	          						</div>
	          						<div class=\"col-md-9\" >".$apnd."
	          							
	          							<p><a href =\"#\">".$c_name."</a></p>".$butn.
	          							"
	          						</div>
	          						</div>
	          						</li>";
	          					}
	          				}
	          			}
	          			mysqli_close($con);
	          		?>

	          		

	          	</ul>
	        </div>
        </div>