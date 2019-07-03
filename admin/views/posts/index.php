<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right" style="margin-top: 100px;">
  <div class="col-xs-12 col-sm-9">
	<div class="table-responsive">
	  <table class="table table-bordered" id ="table">
	  	 <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Number of like</td>
                <td>Number of comment</td>
                <td>Photo</td>
                <td>Function</td>
            </tr>
        </thead>
        <tbody>
		<?php while($row = mysqli_fetch_array($this->records)) : ?>
		  <tr>
			<td width="5%" scope="row"><?php echo $row['id']; ?></td>
			<td width="25%"><?php echo $row['title']; ?></td>
			<td width="12%"><?php echo $row['count_like']; ?></td>
			<td width="11%"><?php echo $row['count_comment']; ?></td>
			<td width="20%"><img width ="100%" src="<?php echo "../media/upload/" .$this->controller.'/'.$row['photo_post']; ?>" alt="<?php echo $row['title']; ?>" class="img-thumbnail"></td>
			<td width="15%">
			  <a href="<?php echo html_helpers::url(
							array('ctl'=>'posts', 
								  'act'=>'view', 
								  'params'=>array(
									'id'=>$row['id']
							))); ?>" class="table-link">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			  <a href="<?php echo html_helpers::url(
							array('ctl'=>'posts', 
								  'act'=>'edit', 
								  'params'=>array(
									'id'=>$row['id']
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
									'id'=>$row['id']
							))); ?>" class="table-link danger delete">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			</td>
		  </tr>
		<?php endwhile; ?>
        </tbody>
      </table>
	</div>
  </div>
  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
	<?php include_once 'views/widgets/sidebar.php'; ?>
  </div>
</div>
<style type="text/css">
	input[type=search] {
		background-color: #ccd6e8;
		padding: 10px;
		border: 0px ;
	}
	select {
		background-color: #61b1ce;
		padding: 5px;
		color: white;
	}
	a.previous {
		background-color: #cce0e8;
	}
	.paginate_button {
		background-color: #dce6ea;
	}
	.disabled {
		background-color: #bcc2c6!important;
		
	}
	span a.current {
		background-color: #70bfef!important;
	}
</style>
<script src="media/js/students.js"></script>
<script type="text/javascript"> 
	$(document).ready(function() { 
		$("#table").DataTable({}); 
	}); 
</script>

<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>