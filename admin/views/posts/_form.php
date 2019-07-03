<?php 
$params = (isset($this->record))? array('id'=>$this->record['id']):'';
?>
<div class="jumbotron clearfix">
  <form  enctype="multipart/form-data" method="post" action="<?php echo html_helpers::url(
    array('ctl'=>'posts', 
        'act'=>'add',
        'params'=>$params
)); ?>">
    <div class="form-group">
      <label ><b>Title</b></label>
        <input type="text" class =" form-control" placeholder="title" name="status"></input>
    </div>
    <div class="form-group">
      <label ><b>Content</b></label>
       <textarea id="TypeHere" class =" form-control" placeholder="Write some text here" name="content"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1"><b>Upload your image</b></label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
    </div>
    <div class="form-group">    
      <button type="submit" class="btn btn-primary btn_submit" name="btn_submit">Submit</button>
    </div>
  </form>
</div>  
<script src="media/js/form.js"></script>