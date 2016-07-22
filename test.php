<html>
 <head>
 <meta charset="utf-8">
  <title>PHP Test</title>
 </head>
 <body style ="">
  <div style="border:1px solid #000; overflow:auto;display:flex;">
  	<div style="float:left;display:flex;">
  		<button style="" >tag1</button>
  		<button style="">tag2</button>
  		<button style="">tag3</button>
  	</div>
  	<div style="float:right;width:100%;">
  		<input  type ="text" id="tag" style="width:100%;"/>
  	</div>
  </div>
 <?php
  
  $con=mysqli_connect("localhost", "root", "", "consult");
  //$con->query("TRUNCATE TABLE Category_list");
  $myfile = fopen("catagory.txt", "r") or die("Unable to open file!");
  while(!feof($myfile)) {
      //echo fgets($myfile);
    $val = strtolower(fgets($myfile));
      $sql="INSERT INTO Category_list(c_name,no_followers) VALUES ('$val','0')";
      $result = $con->query($sql); 
  }
  mysqli_close($con);
  fclose($myfile);

?>

 </body>
</html>