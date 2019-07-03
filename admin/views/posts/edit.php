<?php include_once'views/layout/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right " style="margin-top: 100px;">
	<div class="col-xs-12 col-sm-9">
		<?php foreach ($this->record as $key => $value) {?>
		<form  enctype="multipart/form-data" method="post" action="<?php echo html_helpers::url(
    array('ctl'=>'posts', 
        'act'=>'edit',
        'params'=>array('id'=>$value['id'])
	)); ?>">
	    <div class="form-group">
	      <label ><b>Title</b></label>
	        <input type="text" class =" form-control" placeholder="title" name="title" value="<?php echo $value['title'];?>"></input>
	    </div>
	    <div class="form-group">
	      <label ><b>Content</b></label>
	       <textarea id="TypeHere" class =" form-control" style="height: 300px;" placeholder="Write some text here" name="content"> <?php echo $value['contents'];?></textarea>
	    </div>
	    <div class="form-group">
	      <label for="exampleFormControlFile1"><b>Upload your image</b></label>
	        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
	    </div>
	    <div class="form-group">    
	      <button type="submit" class="btn btn-primary btn_submit" name="btn_submit">Submit</button>
	    </div>
	<?php }?>
	  </form>
	</div>
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		<?php include_once 'views/widgets/sidebar.php'; ?>
	</div>
</div>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>