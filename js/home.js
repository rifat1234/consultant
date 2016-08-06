function show_ans(x){
    	//alert("its working");
    	$(x).hide();
    	var par = $(x).parent();
    	par.find('.hidden_ans').css("display","inline");

 }
$(document).ready(function(){
    $(".main .ans").click(function(){
        $(this).hide();
        var par = this;
        par = $(par).parent();
        par = $(par).parent();
		//$(par).css("background-color","red");
        var ad = par.find(".q_id").val();
		//alert(ad);
        var id = '<input class =\"q_id\"type=\"hidden\" name=\"hiddenField\" value="'+ad+'">';
        par.append('<div class = "answer-question"><hr><form class="form-horizontal" action="answer.php">'+id+'<fieldset class="form-group"><label for="exampleTextarea">Answer</label><textarea class="form-control" name="exampleTextarea" rows="5"></textarea></fieldset><div class="form-group"><div class="col-md-offset-8 col-md-4 "><button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button></div></div></form></div>');
		
	});
	$(".rightbar .person button").click(function(){
       //$(this).css("background-color","yellow");
	  $(this).html('Followed');
	  $(this).removeClass('glyphicon glyphicon-plus');
	  var par = $(this).parent();
	  par = $(par).parent();
	  par = $(par).parent();
	  par = $(par).parent();
	 //$( par ).find( ".fol_hid" ).css( "background-color", "red" );
	 var value = $(par).find(".fol_hid");
	 //alert(value.val());
	 $.ajax(
	{
				type:'GET',
				url:'follow.php',
				data:{user:value.val()},
				async:true,
				success:function(result)
				{
					//alert("hoise");
					//if(result == "unique")ret = false;
					//return false;
					//else return true;
				
				}
				
	});
	//alert("working");
	 //alert($(par).find("input").value());
		//$(par).parent().css( "background-color", "red" );
    });
    $(".rightbar .topic button").click(function(){
       //$(this).css("background-color","yellow");
       //alert($(this).html());
		  if($(this).html()=="Followed"){
		  		//alert("unfollow");
		  		$(this).html(' Follow');
		  		$(this).addClass('glyphicon glyphicon-plus')
		  		//alert("working till this ");
			  	var par = $(this).parent();
			  	var value = $(par).find(".fol_hid");
			  	//alert(value.val());
			 
				 $.ajax(
				{
							type:'GET',
							url:'category_unfollow_person.php',
							data:{c_id:value.val()},
							async:true,
							success:function(result)
							{
								//alert("it's done");
							
							}
							
				});
		  }else{
		  	 // alert("following");
			  $(this).html('Followed');
			  $(this).removeClass('glyphicon glyphicon-plus');
			  var par = $(this).parent();
			  var value = $(par).find(".fol_hid");
			 
			 $.ajax(
			{
						type:'GET',
						url:'category_follow_person.php',
						data:{c_id:value.val()},
						async:true,
						success:function(result)
						{
							
						
						}
						
			});
		}

    });
	$(".main .fol_but").click(function(){
       //$(this).css("background-color","yellow");
	  var but_val = 'Follow';
	  var php_file = 'unfollow.php';
	  if($(this).html()=='Follow'){
	  	but_val = 'Followed';
	  	php_file='follow.php';
	  }
	  alert("woring");
	  $(this).html(but_val);
	  var par = $(this).parent();
	  par = $(par).parent();
	  par = $(par).parent();
	  //par = $(par).parent();
	 //$( par ).find( ".fol_hid" ).css( "background-color", "red" );
	 var value = $(par).find(".fol_hid");
	 //alert(value.val());
	 $.ajax(
	{
				type:'GET',
				url:php_file,
				data:{user:value.val()},
				async:false,
				success:function(result)
				{
					//alert("hoise");
					//if(result == "unique")ret = false;
					//return false;
					//else return true;
				
				}
				
	});
	//alert("working");
	 //alert($(par).find("input").value());
		//$(par).parent().css( "background-color", "red" );
    });
		$(".main .upv").click(function(){
       //$(this).css("background-color","yellow");
	  $(this).html('Upvoted');
	  var par = $(this).parent();
	
	 //$( par ).find( ".a_id" ).css( "background-color", "red" );
	 
	 var value = $(par).find(".a_id");
	 //alert(value.val());
	 
	 $.ajax(
	{
				type:'GET',
				url:'upvote.php',
				data:{a_id:value.val()},
				async:false,
				success:function(result)
				{
					//alert("hoise");
					//if(result == "unique")ret = false;
					//return false;
					//else return true;
				
				}
				
	});
	/*
	//alert("working");
	 //alert($(par).find("input").value());
		//$(par).parent().css( "background-color", "red" );
	*/
    });
});

$('.toggle').click(function (event) {
	event.preventDefault();
	var target = $(this).attr('href');
	$(target).toggleClass('hidden show');
});