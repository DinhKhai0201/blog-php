<?php
class profile_controller extends authen_controller
{
	public function index() 
	{
		$users = new user_model();
		if(isset($_SESSION['admin'])){
			$id = $_SESSION['admin']['id'];
		}
		$condition="id=".$id;
		$this->records = $users->getRecordByCondition($condition);
		$this->display();
	}
	public function edit($id) 
	{		
		$user = new user_model();
		$record = $user->getRecord($id);
		$this->setProperty('record',$record);
		if(isset($_POST['btn_submit'])) {
			$bio = $_POST['bio'];
			$email = $_POST['email'];
			$firstname = $_POST['firstname'];
			$password = $_POST['password'];
			$phonenumber = $_POST['phonenumber'];
			$hometown = $_POST['hometown'];
			$gender = $_POST['gender'];
			$birthday = $_POST['birthday'];
			if(!empty($firstname) && !empty($password) &&!empty($email))   {
				if(isset($_FILES) && $_FILES["image"]["name"]) {
					if(file_exists(RootURI."/media/upload/profile/".$record['photo']))
						unlink(RootURI."/media/upload/profile/".$record['photo']);
					$photo_edit = $this->uploadImg($_FILES);
				}
				$data = array('email' => $email,'password' => $password,'firstname' => $firstname,'phonenumber' => $phonenumber,'gender' => $gender,'birthday' => $birthday,'hometown' => $hometown,'photo' => $photo_edit,'bio'=>$bio);
				if($user->editRecord($id, $data)) {
					header( "Location: ".html_helpers::url(array('ctl'=>'profile')));
				}
			}
		}
		$this->display();
	}
	public function logout() 
	{	
		session_start();
		session_destroy();
		header( "Location: ".html_helpers::url(array('ctl'=>'login'))); 
		exit;
	} 
}
?>
