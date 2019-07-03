<?php
global $enableOB;
$enableOB = true;
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php //html_helpers::header($this->layout, ['css'=>$cssFiles]); ?>
<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/post.css");
?>
<div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif" style="margin:  100px auto 0px;">
  <p><i>"Make it as simple as possible, but not simpler."</i></p>
</div> 
<div class="roww" >
	  <div class="col-6 ">Create a new post <button class=" bt w3-button w3-circle w3-teal">+</button></div>
	</div>
<div class="jumbotron clearfix" >
	<form  enctype="multipart/form-data" method="post" action="<?php echo html_helpers::url(
		array('ctl'=>'posts', 
			  'act'=>'add',
			  'params'=>array('id'=>$_SESSION['user']['id'])
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
			<button type="submit" class="btn btn-primary btn_submit button-center" name="btn_submit">Submit</button>
		</div>
	</form>
</div>	
<div class="w3-round w3-teal">Manage your blogs</div>
<?php foreach (array_reverse($this->records) as $key => $value) {?> 
		<div class="w3-card-4 fadeInLeft" style="width:22%;float: left ;margin: 10px 15px;">
			<a href="<?php echo html_helpers::url(
							array('ctl'=>'detail', 
								  'act'=>'view', 
								  'params'=>array(
									'id'=>$value['id']
							))); ?>" class="table-link func">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-search-plus fa-stack-1x fa-inverse "></i>
				</span>
			  </a>
		    <a href="<?php echo html_helpers::url(
							array('ctl'=>'posts', 
								  'act'=>'edit', 
								  'params'=>array(
									'id'=>$value['id']
							))); ?>" class="table-link ">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			  <a href="<?php echo html_helpers::url(
							array('ctl'=>'posts', 
								  'act'=>'del', 
								  'params'=>array(
									'id'=>$value['id']
							))); ?>" class="table-link danger delete " >
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			  <p class="title-card"><?php echo $value['title']?></p>
		    <img class ="picture card-img-top pt" width="auto;" align ="center"src="<?php echo "media/upload/posts".'/'.$value['photo_post']; ?>" class="mr-3" alt="...">
				<p class="date-time"><?php echo $value['post_time']?></p>		     	
		</div>
<?php }?>
<style type="text/css">
	.col-6 {
		margin: 30px 50px 20px 40px;
	}
	.date-time {
		font-style: italic;
		font-size: 13px;
		margin-left: 20px;
	}
	.title-card {
		padding :5px;
		margin-left: 20px;
		font-size: 15px;
	}
	.pt{
		height: 130px!important;
		padding: 2px!important;
	}
	.func {
		margin-left: 56%;
	}
	.btn {
		margin-left: 47%;
	}
	.w3-teal {
		text-align: center;
		margin : 5px 0px 10px;
	}
	.w3-card-4 {
		cursor: pointer;
	}
</style>
<script> 
	$(".jumbotron").hide();
	$(".w3-button").on("click", function( event ){
	    event.preventDefault();                                     
	    $(".jumbotron").fadeToggle('1000','linear');
	 });
</script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>
