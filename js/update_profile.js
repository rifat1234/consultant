$(document).ready(function(){

	$("button").click(function(){
       $(this).css("background-color","yellow");
	  $(this).html('Followed');
	  var par = $(this).parent();
	  par = $(par).parent();
	  par = $(par).parent();
	  par = $(par).parent();
	 $( par ).find( ".fol_hid" ).css( "background-color", "red" );
	 var value = $(par).find(".fol_hid");
	 //alert(value.val());
	 $.ajax(
	{
				type:'GET',
				url:'follow.php',
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
});