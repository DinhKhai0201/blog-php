<?php
class home_controller extends main_controller
{
	public function index() 
	{	
		$posts = new post_model();
		$modelJoin="user";
		$fields = (isset($_SESSION['user']))? 
			"posts.id,title,photo_post,(SELECT count(*) from likes WHERE likes.post_id=posts.id ) as count_likes,(SELECT count(*) from comments WHERE comments.post_id=posts.id ) as count_comment ,contents,user_id,firstname,(IF(".$_SESSION['user']['id']." IN (SELECT likes.user_id from likes WHERE posts.id = likes.post_id),'1','0')) as checklike" :
			"posts.id,title,photo_post,(SELECT count(*) from likes WHERE likes.post_id=posts.id ) as count_likes,(SELECT count(*) from comments WHERE comments.post_id=posts.id ) as count_comment ,contents,user_id,firstname";
		$this->records = $posts->getLeftJoinTable($fields, $modelJoin);
		$this->display();
 	}
	public function likepost() {
		if(!empty($_POST["id"])) {			
			$like_handle = new like_model();
			$post_handle = new post_model();
				switch($_POST["actionlike"]){
					case "like":
						$this->records = $like_handle->insertById($_SESSION['user']['id'],$_POST["id"]);
						if ($this->records) {
							$conditionValue = "count_like = count_like + 1";
							$this->recordss = $post_handle->updateById($_POST["id"],$conditionValue);	
						}							
					break;		
					case "unlike":
						$this->records = $like_handle->deleteById($_SESSION['user']['id'],$_POST["id"]);
						if ($this->records) {
							$conditionValue = "count_like = count_like - 1";
							$this->recordss = $post_handle->updateById($_POST["id"],$conditionValue);
						}					
					break;		
			}
			$data['id'] = $_POST["id"] ;
			echo (json_encode($data));
		}
		else echo "error";
	} 
}
?>