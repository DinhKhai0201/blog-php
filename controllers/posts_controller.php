<?php
class posts_controller extends authen_controller 
{
	public function index() {
		$posts = new post_model();
		if(isset($_SESSION['user'])){
			$id = $_SESSION['user']['id'];
		}
		$conditions="users_id=".$id;
		$this->records = $posts->getRecordByCondition($conditions);	
		$this->display();
	} 
	public function add() {	
		$posts = new post_model();	
		$this->error = false;
		if(isset($_POST['btn_submit'])) {	
			$status=$_POST['status'];
			$contents=$_POST['content'];
			$user_id=$_SESSION['user']['id'];
			if(!empty($status) && !empty($contents)) {
				$photo_post = $this->uploadImg($_FILES);
				$post = new post_model();
				if($post->addPost($status,$photo_post,$contents,$user_id)) {
					header( "Location: ".html_helpers::url(array('ctl'=>'home')));
				} else {
                    $this->error = "error!";
                }
			} else {
                $this->error = " can't empty!";
            }
		}
		$conditions="user_id=".$_SESSION['user']['id'];
		$this->records = $posts->getRecordsByCondition($conditions);
		$this->display();
	}
	public function edit($id) 
	{
		$post = new post_model();
		$record = $post->getRecord($id);
		$this->setProperty('record',$record);
		if(isset($_POST['btn_submit'])) {
			$title = $_POST['title'];
			$contents = $_POST['content'];
			if(!empty($title) && !empty($title))  {
				foreach ($this->record as $key => $value) {
					$photo= $value['photo_post'];
					if(isset($_FILES) and $_FILES["image"]["name"]) {				
							if(file_exists(RootURI."/media/upload/" .$this->controller.'/'.$value['photo_post'])) {
								unlink(RootURI."/media/upload/" .$this->controller.'/'.$value['photo_post']);
								$photo= $this->uploadImg($_FILES);
							} 						
						
					}
				}
				$postData  = array('title' =>$title , 'contents'=>$contents,'photo_post'=>$photo);
				if((bool)$post->editRecord($id, $postData)==true) {
					header( "Location: ".html_helpers::url(array('ctl'=>'detail','act'=>'view','params'=>array('id'=>$id))));
				}
			}
		}
		$this->display();
	}
	public function del($id) 
	{
		$post = new post_model();
		$this->record = $post->getRecord($id);
		foreach ($this->record as $key => $value) {
			if(file_exists(RootURI."/media/upload/" .$this->controller.'/'.$value['photo_post']))
			unlink(RootURI."/media/upload/" .$this->controller.'/'.$value['photo_post']);
		}				
		if ($post->delRecordTwo($id)) {
			header( "Location: ".html_helpers::url(array('ctl'=>'posts','act'=>'add')));
		}
	}
	
}