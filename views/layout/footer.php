<?php 
	function sw_get_current_weekday() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$weekday = date("l");
		$weekday = strtolower($weekday);
		switch($weekday) {
				case 'monday':
						$weekday = 'Thứ hai';
						break;
				case 'tuesday':
						$weekday = 'Thứ ba';
						break;
				case 'wednesday':
						$weekday = 'Thứ tư';
						break;
				case 'thursday':
						$weekday = 'Thứ năm';
						break;
				case 'friday':
						$weekday = 'Thứ sáu';
						break;
				case 'saturday':
						$weekday = 'Thứ bảy';
						break;
				default:
						$weekday = 'Chủ nhật';
						break;
		}
		echo $weekday.', Ngày '.date('d/m/Y');
	}
?>						
		<hr  style="clear: both; margin-top: 20px;">
		<footer  style="clear: both;">
		<div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            <span class="icon "><i class="fa fa-clock-o nav-link" aria-hidden="true"></i></span>
		<?php sw_get_current_weekday(); ?> 
          </div>
        </div>
        <div class="col-md-6">
        	
          <ul class="nav nav-footer justify-content-end">

            <li class="nav-item">
              <a href="" class="nav-link" target="_blank">First PHP</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link" target="_blank">Blog</a>
            </li>
          </ul>
        </div>
      </div>
      </footer>
</div>
  <script src="media/assets/vendor/jquery/jquery.min.js"></script>
  <script src="media/assets/vendor/popper/popper.min.js"></script>
  <script src="media/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="media/assets/vendor/headroom/headroom.min.js"></script>
  <script src="media/assets/vendor/onscreen/onscreen.min.js"></script>
  <script src="media/assets/vendor/nouislider/js/nouislider.min.js"></script>
  <script src="media/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="media/assets/js/argon.js?v=1.0.1"></script>
	<?php 
	if($enableOB) {
		echo "JSBOTTOM";
		ob_end_flush();
	}
	echo html_helpers::jsFooter();
	?>
</body>
</html>
