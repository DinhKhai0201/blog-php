<?php
global $enableOB;
$enableOB = true;
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php //html_helpers::header($this->layout, ['css'=>$cssFiles]); ?>
<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/success_post.css");
?>
<p class="success">Add your post success!</p>
<p class="a-fix"><a class="return-home" href="<?php echo html_helpers::url(array('ctl'=>'home')); ?>"> Return Homepage</a></p>
<?php
	array_push($obMediaFiles['js'], "media/js/post.js");
?>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>