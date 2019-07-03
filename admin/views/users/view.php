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
		  <?php foreach($this->record as $field=>$value) : ?>
			<tr>
			  <th scope="row">Id</th>
			  <td><?php echo $value['id'] ?></td>
			  <td rowspan="9">
			  	<a href="<?php echo html_helpers::url(
							array('ctl'=>'users', 
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
							array('ctl'=>'users', 
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
			  <td scope="row">First name</td>
			  <td><?php echo $value['firstname'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Email</td>
			  <td><?php echo $value['email'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Bio</td>
			  <td><?php echo $value['bio'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Gender</td>
			  <td><?php echo $value['gender'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Home town</td>
			  <td><?php echo $value['hometown'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Birth day</td>
			  <td><?php echo $value['birthday'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Phone number</td>
			  <td><?php echo $value['phonenumber'] ?></td>
			</tr>
			<tr>
			  <td scope="row">Avatar</td>
			  <td><img width ="50%%" src="<?php echo "../media/upload/profile/".$value['photo']; ?>" alt="<?php echo $value['firstname']; ?>" class="img-thumbnail"></td>
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
