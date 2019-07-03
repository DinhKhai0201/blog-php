<?php
class profile_controller extends authen_controller
{
	public function index() 
	{	

		$users = new user_model();
		if(isset($_SESSION['user'])){
			$id = $_SESSION['user']['id'];
		}
		$condition="id=".$id;
		$fields="users.* ,(SELECT COUNT(posts.id) from posts WHERE posts.user_id=".$id." ) AS number_posts ,(SELECT COUNT(id) from likes WHERE post_id in (SELECT id from posts WHERE user_id=".$id.")) as number_likes,(SELECT COUNT(id) from comments WHERE post_id in (SELECT id from posts WHERE user_id=".$id.")) as number_cmts";
		$this->records = $users->getRecordsByCondition($condition,$fields);
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
				foreach ($this->record as $key => $value) {
					$photo_edit =$value['photo'];
					if(isset($_FILES) && $_FILES["image"]["name"]) {
						if(file_exists(RootURI."/media/upload/profile/".$record['photo'])){
							unlink(RootURI."/media/upload/profile/".$record['photo']);
							$photo_edit = $this->uploadImg($_FILES);
						}						
					}
				}
				$data = array('email' => $email,'password' => $password,'firstname' => $firstname,'phonenumber' => $phonenumber,'gender' => $gender,'birthday' => $birthday,'hometown' => $hometown,'photo' => $photo_edit,'bio'=>$bio);
				if($user->editRecord($id, $data)) {
					header( "Location: ".html_helpers::url(array('ctl'=>'profile')));
				}
			}
		}
		$this->display();
	}
}
?>
