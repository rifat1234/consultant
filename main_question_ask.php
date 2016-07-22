<div class="col-md-6 col-md-offset-2 main">
    <div class=" container-fluid">
    	<form>
	    	<div class="form-group">
			  <textarea class="form-control" rows="3" id="question" placeholder="What is your question? Be specific."></textarea>
			</div>
			<div class="form-group"  >
			  <label for="tag">Tags:</label>
			  <div style="border:1px solid #000; overflow:auto;display:flex;">
			  	
			  	<div style="float:left;display:flex;" class="in_box"></div>

			  	<div style="float:right;width:100%;">
			  		<input  type ="text" id="tag" style="width:100%;height:100%;"/>
			  	</div>
			  </div>
			</div>
			<div id="livesearch" style="border:.1px solid #000;"></div>
			<button type="submit" class="btn btn-primary" style="width:150px;float:right;margin:5px;" onclick="questionPost()">Post Your Question</button>
		</form> 
	</div>
</div>