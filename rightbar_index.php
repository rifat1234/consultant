        <div class = "rightbar">
	        <div class="col-md-3 ">
	        	<ul class = "nav-sidebar">
	          		<h4>Consultants </h4>
	          		<hr>
	          		
					
					<?php
				      	$con=mysqli_connect("localhost", "root", "", "consult");
				      	$sql = "SELECT  * FROM login WHERE 1" ;
				      	$result = $con->query($sql);
						$cnt = 3;
				      	if (mysqli_num_rows($result) > 0 ) {
						    // output data of each row
						    while( ($row = mysqli_fetch_assoc($result)) && $cnt>0 ) {
								$cnt=$cnt-1;
								//if($row['username']==$_SESSION['username'])continue;
						      						      echo "<div class = fol>";
							  echo "<input type =\"hidden\"  class =\"fol_hid\" value=".$row['username']. ">";
							  echo "<li><div class =\"row\"><div class=\"col-md-3\" style=\"padding-left:30px;\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
						echo "</div><div class=\"col-md-9\" >
	          				<p style=\"\"><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"glyphicon glyphicon-plus fol_but btn btn-default\"> Follow </button>
	          			</div>
	          			</div></li></div>";
						    }
						} 
						mysqli_close($con);

			      ?>

	          	</ul>
	          	<br>
	          	<ul class = "nav-sidebar">
	          		<h4>Topics </h4>
	          		<hr>
	          	
	          		<?php
	          			$con=mysqli_connect("localhost", "root", "", "consult");
	          			$ar= array();
	          			while(count($ar)<3){
	          				$rd = rand(1,25);
	          				$sql = "SELECT  c_name FROM Category_list WHERE c_id='$rd'" ;
	          				$result=$con->query($sql);
	          				if (mysqli_num_rows($result) > 0){
	          					while($row = mysqli_fetch_assoc($result)){
	          						$c_name = $row['c_name'];
	          						$sz = count($ar);
	          						array_push($ar, $c_name);
	          						$ar = array_unique($ar);
	          						if($sz==count($ar))continue;
	          						echo "<li>
	          						<div class =\"row top\">
	          						
	          						<div class=\"col-md-12\" >
	          						<p style=\"font-weight:bold;\">".$c_name."</p>
	          						<button class=\"glyphicon glyphicon-plus btn btn-default\"> Follow </button>
	          						</div>
	          						</div>
	          						</li>";
	          					}
	          				}
	          			}

	          		?>

	          	</ul>
	        </div>
        </div>