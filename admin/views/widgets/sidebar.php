<div class="list-group">
	<a href="#" class="list-group-item active">
		<h4 class="list-group-item-heading">Management posts</h4>
	</a>
	<a href="<?php echo html_helpers::url(array('ctl'=>'posts')); ?>" class="list-group-item">List all posts</a>
	<a href="<?php echo html_helpers::url(array('ctl'=>'posts', 'act'=>'add')); ?>" class="list-group-item">Add new post</a>
	<a href="#" class="list-group-item active">
		<h4 class="list-group-item-heading">Management users</h4>
	</a>
	<a href="<?php echo html_helpers::url(array('ctl'=>'users')); ?>" class="list-group-item">List all users</a>
	<a href="<?php echo html_helpers::url(array('ctl'=>'users', 'act'=>'add')); ?>" class="list-group-item">Add new user</a>
</div>
<style type="text/css">
	a:active {
		background-color: red;
	}
</style>