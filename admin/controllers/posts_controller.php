<?php
class posts_controller extends authen_controller
{
	public function index() 
	{   
		$posts = new post_model();
		$fields="posts.*,(SELECT count(*) from comments WHERE comments.post_id=posts.id ) as count_comment";
		$this->records = $posts->getAllRecords($fields);	
		$this->display();
	} 
	public function add() {	
		$this->error = false;
		$users = new user_model();
		$this->records = $users->getAllRecords();
		if(isset($_POST['btn_submit'])) {	
			$title=$_POST['title'];
			$contents=$_POST['content'];
			$user_id=$_POST['user'];
			if(!empty($title) && !empty($contents)) {
				$photo_post = $this->uploadImg($_FILES);
				$post = new post_model();
				if($post->addPost($title,$photo_post,$contents,$user_id)) {
					header( "Location: ".html_helpers::url(array('ctl'=>'posts')));
				}
				else {
                    $this->error = "error!";
                }
			} else {
                $this->error = " can't empty!";
            }
		}
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
				if($post->editRecord($id, $postData))
					header( "Location: ".html_helpers::url(array('ctl'=>'posts')));
			}
		}
		$this->display();
	}
	
	public function view($id) 
	{
		$post = new post_model();
		$record = $post->getRecordPost($id);
		$user2 = new user_model();
		$record2 = $user2->getUserLke($id); 
		$user3 = new user_model();
		$record3 = $user3->getUsercmt($id);
		$this->setProperty('record2',$record2);
		$this->setProperty('record',$record);
		$this->setProperty('record3',$record3);
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
			header( "Location: ".html_helpers::url(array('ctl'=>'posts')));
		}
	}
}
?>
