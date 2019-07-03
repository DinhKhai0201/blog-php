<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right">
  <div class="col-xs-12 col-sm-9">
	<div class="table-responsive">
	  <form class="hien-thi-bai-dang">
			<?php $row = mysqli_fetch_array($this->records)
				
			?>
		</form>
	</div>
  </div>
  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
	<?php include_once 'views/widgets/sidebar.php'; ?>
  </div>
</div>
<script src="media/js/students.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>