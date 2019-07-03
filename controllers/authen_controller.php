<?php
class authen_controller extends main_controller {
public function  __construct() {
	if(!isset($_SESSION['user'])){
		header( "Location: ".html_helpers::url(array('ctl'=>'login')));
	}
	parent::__construct();
	}
}
?>