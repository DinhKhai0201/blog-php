<?php
class logout_controller extends authen_controller
{
	public function index() 
	{	
		session_start();
		session_destroy();
		header( "Location: ".html_helpers::url(array('ctl'=>'home'))); 
		exit;
	} 
}
?>