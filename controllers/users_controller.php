<?php
class users_controller extends authen_controller
{
	public function index() 
	{
		$users = new user_model();
		$this->records = $users->getAllRecords();	
		$this->display();
	} 
	public function add() 
	{
		if(isset($_POST['btn_submit'])) {
			$userData = $_POST['data'][$this->controller];
			if(!empty($userData['fullname']))  {
				$userData['photo'] = $this->uploadImg($_FILES);
				$user = new user_model();
				if($user->addRecord($userData))
					header( "Location: ".html_helpers::url(array('ctl'=>'users')));
			}
		}
		$this->display();
	}
	public function edit($id) 
	{
		$user = new user_model();
		$record = $user->getRecord($id);
		$this->setProperty('record',$record);
		if(isset($_POST['btn_submit'])) {
			$userData = $_POST['data'][$this->controller];
			if(!empty($userData['fullname']))  {
				if(isset($_FILES) and $_FILES["image"]["name"]) {
					if(file_exists(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']))
						unlink(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']);
					$userData['photo'] = $this->uploadImg($_FILES);
				}
				if($user->editRecord($id, $userData))
					header( "Location: ".html_helpers::url(array('ctl'=>'users')));
			}
		}
		$this->display();
	}
	
	public function view($id) 
	{
		$user = new user_model();
		$record = $user->getRecord($id);
		$this->setProperty('record',$record);
		$this->display();
	}
	
	public function del($id) 
	{
		$user = new user_model();
		$record = $user->getRecord($id);
		if(file_exists(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']))
			unlink(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']);			
		echo $user->delRecord($id);
		exit();
}
?>
