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
						      echo "<li><div class =\"row\"><div class=\"col-md-3\" >";
							  echo "<img src=".$row['image_url'].".jpg alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">";
							  echo "</div>
	          			<div class=\"col-md-9\" >
	          				<p><a href =\"#\">".$row['first_name'].' '.$row['last_name']."</a></p>
	          				<button class=\"glyphicon glyphicon-plus\"> Follow </button>
	          			</div>
	          			</div></li>";
						    }
						} 
						mysqli_close($con);

			      ?>

		<!--
	          		<li>
	          			<div class ="row">
	          			<div class="col-md-3" >
	          				<img src="images/pro_pic.jpg" alt="The Mountain Himself" style ="width:50px;height:60px">
	          			</div>
	          			<div class="col-md-9" >
	          				<p><a href ="#">Tamim Ibn Aman</a></p>
	          				<button class="glyphicon glyphicon-plus"> Follow </button>
	          			</div>
	          			</div>
	          		</li>
	          			<li>
	          			<div class ="row">
	          			<div class="col-md-3" >
	          				<img src="images/pro_pic.jpg" alt="The Mountain Himself" style ="width:50px;height:60px">
	          			</div>
	          			<div class="col-md-9" >
	          				<p><a href ="#">Tamim Ibn Aman</a></p>
	          				<button class="glyphicon glyphicon-plus"> Follow </button>
	          			</div>
	          			</div>
	          		</li>
-->
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
	          						<div class =\"row\">
	          						<div class=\"col-md-3\" >
	          						<img src=\"images/pro_pic.jpg\" alt=\"The Mountain Himself\" style =\"width:50px;height:60px\">
	          						</div>
	          						<div class=\"col-md-9\" >
	          						<p><a href =\"#\">".$c_name."</a></p>
	          						<button class=\"glyphicon glyphicon-plus\"> Follow </button>
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