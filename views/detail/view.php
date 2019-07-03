<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?>
<div class="form-group" style="margin-top: 100px;">
<div class="row">
  <div class="col-8">
  	<?php foreach ($this->record as $key => $value) { ?>
  		<input type="hidden" id="cmt-for-post" value="<?php echo $value["id"]; ?>">
  		<input type="hidden" id="id-for-cmt" value="<?php echo (isset($_SESSION['user']))?$_SESSION['user']['firstname']:"No name"; ?>">
  		<div class="row">
		  <div class="col-sm-8">
		  	<p class="title" ><?php  echo $value['title']?></br>
		  </div>
		  <div class="col-sm-4">
		  	<div class="title">
		  		<?php	if(isset($_SESSION['user'])){ ?>
				<?php if ($value['user_id']==$_SESSION['user']['id']) {?>

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
				  <a href="<?php echo html_helpers::url(
								array('ctl'=>'posts', 
									  'act'=>'add'
									  )); ?>" class="table-link danger delete " >
					<span class="fa-stack">
					<i class="fa fa-cog fa-spin fa-2x fa-fw" ></i>
					<span class="sr-only">Loading...</span>
					</span>
				  </a>
		  		<?php  }}?>
		  	</div>
		  </div>
		</div>		
		<p class="post-time">Time: <?php  echo $value['post_time']?> </p>
		<img class ="picture" width="100%" align ="center"src="<?php echo "media/upload/posts".'/'.$value['photo_post']; ?>" class="mr-3" alt="..."></br>
		<p><?php  echo $value['contents']?></p></br>
		<div class="row">
		  <div class="col-8">
		  	<div class="col-4">
				<input type="hidden" id="likes-<?php echo $value["id"]; ?>" value="<?php echo $value["count_likes"]; ?>">
			    <div class="btn-likes">
			    <?php	if(isset($_SESSION['user'])){ ?>
					<input type="button" class=" bt p-float p-style <?php  echo ($value["checklike"]=="1"?"unlike":"like"); ?>" onClick="addLikes(<?php echo $value["id"]; ?>,'<?php  echo ($value["checklike"]=="1"?"unlike":"like"); ?>')" /></div>
				<?php } else {?>
					<input type="button" class=" bt p-float p-style like"/></div>
				<?php }?>	
				<div class="label-likes p-float p-style"><?php if(!empty($value["count_likes"])) { echo $value["count_likes"] . " Like(s)"; } ?>
				</div>
		  	</div>
		  </div>
		  <div class="col-4">
		  	<p class="author" >Author: <?php  echo $value['firstname']?> </p>
		  </div>
		</div>		
	
  </div>
   <div class="col-4">
   	<?php include_once 'views/layout/'.$this->layout./*? */'slide.php'; ?>
	</div>
	<?php }?>	
</div>
<hr class="style-eight">
<div class="form-group">
	<input type="hidden" value="<?php  echo $value['count_comment']?>" id="countCmt">
	<p style="float: left;margin-right: 5px;" >Number of comment: </p><p  id="addCnt" ><?php  echo " ",$value['count_comment'];?></p>	
	<button class="w3-button w3-white w3-border comments-link" style="margin-bottom: 30px;"> Add a new comment</button>	
	<div class="comment-form-container dno">
		<form class="form-inline fix-form" >	  
		    <textarea class="form-control" id="comment"  name="comment" style="width: 500px;height: 50px;"></textarea> 
		   <?php	if(isset($_SESSION['user'])){ ?>  
		  	<button type="submit" class="btn btn-primary set-bt">Comment</button>
		  <?php } else {?> 
			 <a type="submit" class="btn btn-primary set-bt" href="<?php echo html_helpers::url(array('ctl'=>'login')); ?>">Comment</a>
		  <?php }?>
		</form>
		<div class="iner-comments">
			<div class="inner-firstname"></div>
			<div class="inner-avatar"></div>
		</div>
		<input type="hidden" id="photo" value="<?php echo $_SESSION['user']['photo']; ?>">
		<?php foreach (array_reverse($this->records) as $key => $value) {  ?>
			<div class="media media-styles" style="margin-top:0px;">
			 	<img width="4%" src="<?php echo "media/upload/profile".'/'.$value['photo']; ?>" class="mr-3 img-thumbnail" alt="..." >
				<div class="media-body">
					<input type="hidden" value="<?php  echo $value['id']?>" id="idCmt">
					<p style = 'float:left;margin-right:5px; '><?php echo $value['firstname']?> :</p>
					<p id='cmt'><?php echo $value['comment_contents']?></p>
						</div>
			</div>
		<?php }?>	
	</div>
</div>
<script type="text/javascript">
	function addLikes(id,actionlike) {
		$.post("index.php?ctl=home&act=likepost",
		{
			id: id,
			actionlike: actionlike
		},
		function(data,success){
			var dataid = JSON.parse(data).id;
			var likes = parseInt($('#likes-'+id).val());
			console.log(likes);
			switch(actionlike) {
				case "like":
				$('.btn-likes').html('<input type="button"  title="Unlike" class=" p-float p-style unlike" onClick="addLikes('+dataid+',\'unlike\')" />');
				likes = likes+1;
				break;
				case "unlike":
				$('.btn-likes').html('<input type="button"  title="Like" class=" p-float p-style like"  onClick="addLikes('+dataid+',\'like\')" />')
				likes = likes-1;
				break;
			}
			$('#likes-'+dataid).val(likes);
				if(likes>0) {
					$('.label-likes').html(likes+" Like(s)");
				} else {
					$('.label-likes').html('');
				}
			})
	}
</script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>


