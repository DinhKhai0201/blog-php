<?php
class users_controller extends authen_controller
{
	public function index() 
	{
		$users = new user_model();
		$this->records = $users->getAllRecords();	
		$this->display();
	} 
	public function add() {	
		$this->error = false;
		if(isset($_POST['btn_submit'])) {	
			$firstname=$_POST['firstname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$bio=$_POST['bio'];
			$phonenumber =$_POST['phonenumber'];
			$gender = $_POST['gender'];
			$hometown = $_POST['hometown'];
			$birthday = $_POST['birthday'];	
			if(!empty($firstname) && !empty($email) && !empty($password)) {
				$user = new user_model();
				$photo_edit = $this->uploadImg($_FILES);
				if ($user->checkExist($email)) {
					if($user->addUser($firstname,$email,$password,$phonenumber,$gender,$hometown,$birthday,$photo_edit,$bio)) {
					header( "Location: ".html_helpers::url(array('ctl'=>'users')));
					}
					else {
	                    $this->error = "error!";
	                }
				} else {
					$this->error = "Email exists!";
				}
			} else {
                $this->error = " Firstname or email or password can't empty!";
            }
		}
		$this->display();
	}

	public function edit($id) 
	{		
		$this->error = false;
		$user = new user_model();
		$record = $user->getRecord($id);
		$this->setProperty('record',$record);
		if(isset($_POST['btn_submit'])) {	
			$bio=$_POST['bio'];
			$email = $_POST['email'];
			$firstname = $_POST['firstname'];
			$password = $_POST['password'];
			$phonenumber = $_POST['phonenumber'];
			$hometown = $_POST['hometown'];
			$gender = $_POST['gender'];
			$birthday = $_POST['birthday'];
			if(!empty($firstname) && !empty($password) &&!empty($email))   {
				foreach ($this->record as $key => $value) {
					if(isset($_FILES) && $_FILES["image"]["name"]) {
						if(file_exists(RootURI."/media/upload/profile/".$value['photo'])) {
							unlink(RootURI."/media/upload/profile/".$value['photo']);
							$photo_edit = $this->uploadImg($_FILES);
						}
					 	
					} else {
							$photo_edit= $value['photo'];
					}
				}
					$data = array('email' => $email,'password' => $password,'firstname' => $firstname,'phonenumber' => $phonenumber,'gender' => $gender,'birthday' => $birthday,'hometown' => $hometown,'photo' => $photo_edit,'bio'=>$bio);
					if($user->editRecord($id, $data)) {
						header( "Location: ".html_helpers::url(array('ctl'=>'users')));
					} else {
						$this->error = "error!";
					}
				 
				
			}  else {
				$this->error =" Fields * can be empty  !";
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
		$post = new user_model();
		foreach ($this->record as $key => $value) {
			if(file_exists(RootURI."/media/upload/profile".'/'.$value['photo']))
			unlink(RootURI."/media/upload/profile".'/'.$value['photo']);
		}		
		$user->delRecordTwo($id);	
		if ($post->delRecordTwo($id)) {
			header( "Location: ".html_helpers::url(array('ctl'=>'users')));
		}
		
	}
}
?>
