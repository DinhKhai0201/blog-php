<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right" style="margin-top: 100px;">
	<div class="col-xs-12 col-sm-9">
	  <div class="table-responsive">
		<table class="table table-bordered table-striped">
		  <colgroup>
			<col class="col-xs-1">
			<col class="col-xs-7">
		  </colgroup>
		  <thead>
			<tr>
			  <th width="20%">Field</th>
			  <th width="68%">Value</th>
			  <th width="12%">Edit</th>
			</tr>
		  </thead>
		  <tbody>		  	
		  <?php foreach($this->record as $key=>$value) : ?>
			<tr>
			  <td scope="row">Id</td>
			  <td><?php echo $value['id'] ?></td>
			  <td rowspan="8">
			  	<a href="<?php echo html_helpers::url(
							array('ctl'=>'posts', 
								  'act'=>'edit', 
								  'params'=>array(
									'id'=>$value['id']
							))); ?>" class="table-link">
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
							))); ?>" class="table-link danger delete">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			  </td>
			</tr>
			<tr>
			  <td scope="row">Title</td>
			  <td><?php echo $value['title'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Contents</td>
			  <td><?php echo $value['contents'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Number of likes</td>
			  <td><?php echo $value['count_likes'] ?>
			  	<?php echo "<br>User liked : ";?>
			  	 <?php foreach($this->record2 as $field=>$value2) { ?>
			  	 <?php echo $value2['firstname'],".";?>	
			  	 <?php } ?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Number of comments</th>
			  <td><?php echo $value['count_comment'] ?>
			  	<?php echo "<br>User commented : ";?>
			  	 <?php foreach($this->record3 as $field=>$value3) { ?>
			  	 <?php echo $value3['firstname'],".";?>	
			  	 <?php } ?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Author</th>
			  <td><?php echo $value['author'] ?></td>
			</tr>
			<tr>
			  <th scope="row">Date posts</th>
			  <td><?php echo $value['post_time'] ?></td>
			</tr>
			<tr>
			  <th scope="row">Photo</th>
			  <td><img width ="50%%" src="<?php echo "../media/upload/" .$this->controller.'/'.$value['photo_post']; ?>" alt="<?php echo $value['title']; ?>" class="img-thumbnail"></td>
			</tr>
		  <?php endforeach; ?>
		  </tbody>
		</table>
	  </div>
	</div>
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		<?php include_once 'views/widgets/sidebar.php'; ?>
	</div>
</div>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
