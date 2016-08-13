function show_ans(x){
    	//alert("its working");
    	$(x).hide();
    	var par = $(x).parent();
    	par.find('.hidden_ans').css("display","inline");

 }

 /*
$(document).ready(function(){
    $("body").click(function(){
        location.href = "signin.html";
    });
    
});

*/