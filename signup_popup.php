 <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h1>Signup Here</h1>
          <br>
          <form action="upload.php" method ="post" enctype="multipart/form-data" onsubmit="return validateForm(this);">
          <input type="text" name ="firstname" id ="firstname" placeholder="firstname" class = "required">
            <input type="text" name ="lastname" id = "lastname" placeholder="lastname" class = "required">
              
            <input type="email" name ="email" id="email" placeholder="email" class = "email required">
              <input type="password" name ="pass" id ="pass" placeholder="password" class = "required"> 
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload" class = "required">
              <input style = "background-color:#0066cc; color:white;font-weight:bold; margin-top: 15px; padding-bottom: 8px; padding-top: 8px;" type="submit" value="Sign Up" name="submit" class = "required but">
                    
          <div class="login-help">
          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" style="float: right;" >Close</button>
          <a data-dismiss="modal" data-toggle="modal" href="#login-modal" style="margin-top: 6px;">Login</a> - <a href="#">Forgot Password</a>
          </div>
        </div>
      </div>
      </div>



<script type="text/javascript" src = "jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function validateForm(theform) {
     for (var i=0; i<theform.elements.length; i++) {
      var element = theform.elements[i];
      //alert(element.value);
      if (element.className.indexOf("required") !=-1) {
      // element.className = "required";
       //alert(element.value);
       if (!isFilled(element)) {
        alert("Please enter your " +element.id);
        element.className += " error";
        element.focus();
        return false;
       } 
      }
      if (element.className.indexOf("email") !=-1) {
       
       //element.className = "required";
        //alert(element.value);
       //alert("working1");
       //isEmailExist(element);
       //alert("working2");
       if (!isEmail(element) ) {
        alert("Please check you have entered a valid email address");
        //element.className += " error";
        element.focus();
        return false;
       }
       //alert(isEmailExist(element));
       var res = isEmailExist(element);//= isEmailExist(element);
      //alert(res);
      if(res){
          alert("This Email Address Exist");
          element.focus();
          return false;   
         }
      /*
      $.when(res=isEmailExist(element)).done(
         function(){
         //alert(res);
         if(res){
          alert("This Email Address Exist");
          element.focus();
          return false;   
         }});
       */
       /*if(isEmailExist(element)){
        alert("This Email Address Exist");
        element.focus();
        return false;
       }*/
      }
     }
     
     //alert("finish");
     return true;
    }

    function isFilled(field) {
     if (field.value.length < 1) {
      return false;
     } else {
      return true;
     }
    }
    function isEmail(field) {
     if (field.value.indexOf("@") == -1 || field.value.indexOf(".") == -1) {
      return false;
     } else {
      return true;
     }
    }
    function isEmailExist(field){
      //alert(field.value);
      var ret = true;
      $.ajax(
      {
        type:'GET',
        url:'check_email.php',
        data:{email:field.value},
        async:false,
        success:function(result)
        {
          //alert(result);
          if(result == "unique")ret = false;
          //return false;
          //else return true;
        
        }
        
      });
      return ret;
    } 
  </script>
  