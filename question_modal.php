

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Write your query</h4>
      </div>
      <div class="modal-body">
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

     
      <button type="submit" class="btn btn-primary" style="width:150px;float:right;margin:5px;" onclick="questionPost()">
      Post Your Question</button>
       <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
    </form> 
    </div>
  </div>
</div>
</div>