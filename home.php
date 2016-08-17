<?php
// Start the session
session_start();
if(isset($_SESSION["login"]) and $_SESSION["login"]!="ok"){

	header('Location:index.php');	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultant</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  
    <![endif]-->
	
  </head>
  <body>
	<?php 
		include 'menubar_after_login.php'; 
	?>	
    <div class="container-fluid">
      <div class="row">
      	<?php 
          include 'question_modal.php';
      		include 'leftbar.php';
      		include 'main_home.php';
      		include 'rightbar_after_login.php'; 

      	?>
         <button type="button" id="fixedbutton" class="btn btn-success btn-circle btn-xl" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i></button>
        
      </div>
    </div>


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script>
      $(document).ready(function(e){
        $( "#tag" ).keypress(function( event ) {
          if ( event.which == 32 ) {
             //alert($(this).val());
             $(".in_box").append('<button style="width:auto;margin:3px;padding:2px;" class="btn "><span class="cat">'+$(this).val()+'</span><span class="glyphicon glyphicon-remove cross" onclick="removeTag(this)"></span></button>');
             $(this).val("");
          }
        });
        $("#tag").keyup(function()
        {
          $("#livesearch").show();
          var x= $(this).val();
          $.ajax(
          {
            type:'GET',
            url:'livesearch_category.php',
            data:'q='+x,
            success:function(data)
            {
              $("#livesearch").html(data);
            }
            ,
          });
        });
      })
      function addTag(x){
          //alert($(x).html());
          $(".in_box").append('<button style="width:auto;margin:3px;padding:2px;" class="btn "><span class="cat">'+$(x).html()+'</span><span class="glyphicon glyphicon-remove cross" onclick="removeTag(this)"></span></button>');
          $("#tag").val("");
          $("#livesearch").empty();
      }
      function removeTag(x){
        var par = $(x).parent();
        $(par).remove();
      }
      function questionPost(){
        var val = $("#question").val();
        if(val=="")alert("Ask a question");
        
        
        var categorys = $("body .in_box").find(".cat");
        var cats="";
        for(var i=0;i<categorys.length;i++){
          //alert($(categorys[i]).text());
          if(i==0){
            cats=$(categorys[i]).text();
          }else{
            cats+="~";
            cats+=$(categorys[i]).text();
          }
        }
        $.ajax(
        {
          type:'GET',
          url:'question.php',
          data:{question:val,category:cats},
          
        });
        //alert(cats);
      }
      
    </script>

    <script type="text/javascript" src ="js/home.js"></script>
  </body>
</html>