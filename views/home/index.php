<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?>
<div class="jumbotron" style="margin-top: 100px;">
	<p class="title-ds">Share the weather information in your place.</p>
	<?php if(isset($_SESSION['user'])){?> 
	<?php foreach (array_reverse($this->records) as $key => $value) {?>
		<div class="card card-template fadeInLeft" id = "post-<?php echo $value['id']?>">
			<div class="media media-style">
			 	<img width="15%" src="<?php echo "media/upload/posts".'/'.$value['photo_post']; ?>" class="mr-3" alt="...">
				<div class="media-body">
				    <a class="mt-0 p-float" href="<?php echo html_helpers::url(array('ctl'=>'detail','act'=>'view','params'=>array('id'=>$value['id']))); ?>"><?php echo '" ',$value['title'],' "'; ?></a>
				    <p class="mt-1"> <?php echo "\t_By ",$value['firstname'];?> </p>
				    <p><?php if(strlen($value['contents']) > 100)  echo mb_substr($value['contents'], 0, 100).'...'; else echo $value['contents']; ?> </p>
				    <input type="hidden" id="likes-<?php echo $value["id"]; ?>" value="<?php echo $value["count_likes"]; ?>">
				    <div class="btn-likes">
						<input type="button"  title="<?php echo ucwords($str_like); ?>" class=" bt p-float p-style <?php  echo ($value["checklike"]=="1"?"unlike":"like"); ?>" onClick="addLikes(<?php echo $value["id"]; ?>,'<?php  echo ($value["checklike"]=="1"?"unlike":"like"); ?>')" /></div>
					<div class="label-likes p-float p-style"><?php if(!empty($value["count_likes"])) { echo $value["count_likes"] . " Like(s)"; } ?></div>
					<div class="btn-cmt">
						<input type="button"  class=" p-float p-style cmt"/></div>
					<div class="label-cmt p-float p-style"><?php if(!empty($value["count_comment"])) { echo $value["count_comment"] . " comment(s)"; } ?></div>		
				    <a href="<?php echo html_helpers::url(array('ctl'=>'detail','act'=>'view','params'=>array('id'=>$value['id']))); ?>" class="p-float" role="button">Continue reading >></a>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } else {?>
	<?php foreach (array_reverse($this->records) as $keys => $values) {?>
		<div class="card card-template" id = "post-<?php echo $values['id']?>">
			<div class="media media-style">
			 	<img width="15%" src="<?php echo "media/upload/posts".'/'.$values['photo_post']; ?>" class="mr-3" alt="...">
				<div class="media-body">
				    <a class="mt-0 p-float" href="<?php echo html_helpers::url(array('ctl'=>'detail','act'=>'view','params'=>array('id'=>$values['id']))); ?>"><?php echo '" ',$values['title'],' "'; ?></a>
				    <p class="mt-1"> <?php echo "\t_By ",$values['firstname'];?> </p>
				    <p><?php if(strlen($values['contents']) > 100)  echo mb_substr($values['contents'], 0, 100).'...'; else echo $values['contents']; ?> </p>
				    <div class="btn-likes">
						<input type="button" class=" bt p-float p-style like " /></div>
				    <div class="label-likes p-float p-style"><?php if(!empty($values["count_likes"])) { echo $values["count_likes"] . " Like(s)"; } ?></div>
				    <div class="btn-cmt">
						<input type="button"  class=" p-float p-style cmt"/></div>
					<div class="label-cmt p-float p-style"><?php if(!empty($values["count_comment"])) { echo $values["count_comment"] . " comment(s)"; } ?></div>	
				    <a href="<?php echo html_helpers::url(array('ctl'=>'detail','act'=>'view','params'=>array('id'=>$values['id']))); ?>" class="p-float" role="button">Continue reading >></a>
				</div>
			</div>
		</div>
	<?php } ?>
<?php }?>
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
				$('#post-'+dataid+' .btn-likes').html('<input type="button"  title="Unlike" class=" bt p-float p-style unlike" onClick="addLikes('+dataid+',\'unlike\')" />');
				likes = likes+1;
				break;
				case "unlike":
				$('#post-'+dataid+' .btn-likes').html('<input type="button"  title="Like" class=" bt p-float p-style like"  onClick="addLikes('+dataid+',\'like\')" />')
				likes = likes-1;
				break;
			}
			$('#likes-'+dataid).val(likes);
				if(likes>0) {
					$('#post-'+dataid+' .label-likes').html(likes+" Like(s)");
				} else {
					$('#post-'+dataid+' .label-likes').html('');
				}
			})
	}
</script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
