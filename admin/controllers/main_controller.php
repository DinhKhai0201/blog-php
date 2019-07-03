<?php
class main_controller {
	protected $layout = "";
	protected $model; 
	protected $controller = "home";
	protected $action = "index";
	public	 $components;
	
	public function  __construct() {
		global $cn, $app;
		$this->controller = $cn;
		$app['ctl'] = $this->controller;
		if(isset($_GET["act"])) $this->action = $_GET["act"];
		$app['act'] = $this->action;
		
		if(method_exists($this, $this->action)) {
			if($this->action=='view' || $this->action=='edit' || $this->action=='del') {
				$id='';
				if(isset($_GET['id']))	$id=$_GET['id'];
				$this->{$this->action}($id); 
			} else
				$this->{$this->action}();
		} else {
			include "views/errors/index.php";
		}
	}
	
	public function display($options=null) {
		if(!isset($options['ctl']))	$options['ctl'] = $this->controller;
		if(!isset($options['act']))	$options['act'] = $this->action;
		include_once "views/".$options['ctl']."/".$options['act'].".php";
	}
	public function uploadImg($flies, $newSize=null) {
		$t=time();
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $flies["image"]["name"]); //tach chuoi thanh mang tai dau cham
		$extension = end($temp); //dua con tro den cuoi phan tu mang
		if ((($flies["image"]["type"] == "image/gif")
			|| ($flies["image"]["type"] == "image/jpeg")
			|| ($flies["image"]["type"] == "image/jpg")
			|| ($flies["image"]["type"] == "image/pjpeg")
			|| ($flies["image"]["type"] == "image/x-png")
			|| ($flies["image"]["type"] == "image/png"))
			&& ($flies["image"]["size"] < 200000000) //?
			&& in_array($extension, $allowedExts))
		{
			if ($flies["image"]["error"] > 0) {
				echo 'error';
				return false;
			}
			if ($this->controller=="users") {
				$ulfd = RootURI."/media/upload/profile/";
			} else {
				$ulfd = RootURI."/media/upload/".$this->controller.'/';
			}
			$newfn = time().rand(10000,99999).'.'.$extension;
			if (file_exists($ulfd . $newfn)) {
		      	return true;
			} else {
				move_uploaded_file($flies["image"]["tmp_name"], $ulfd.$newfn);
				$SimpleImg = new SimpleImage_Component();
				$SimpleImg->load($ulfd.$newfn);
				if(isset($newSize['height']) && !isset($newSize['width'])) {
					$SimpleImg->resizeToHeight($newW);
				} else {
					$newW = 1000;
					if(isset($newSize['width'])) {
						$newW = $newSize['width'];
					}
					$SimpleImg->resizeToWidth($newW);
				}
				$SimpleImg->save($ulfd.$newfn);
				return $newfn;
			}
		} else {
			echo "Invalid file";
			return false;
		}
	}
	
	public function setProperty($name, $value) {
		$this->$name = $value;
	}
}
?>