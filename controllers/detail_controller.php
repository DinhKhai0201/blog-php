<?php
class detail_controller extends main_controller 
{
    public function view($id) 
    {	
		$post = new post_model();
		if(isset($_SESSION['user'])){
		$fields="posts.id,title,photo_post,contents,user_id,(select count(user_id) from likes WHERE likes.post_id=".$id.") as count_likes,(select count(id) from comments WHERE comments.post_id=".$id.") as count_comment,post_time,firstname,photo,phonenumber,age,hometown,(IF(".$_SESSION['user']['id']." IN (SELECT likes.user_id from likes WHERE posts.id = likes.post_id),'1','0')) as checklike";
		} else {
			$fields="posts.id,title,photo_post,contents,user_id,(select count(user_id) from likes WHERE likes.post_id=".$id.") as count_likes,(select count(id) from comments WHERE comments.post_id=".$id.") as count_comment,post_time,firstname,photo,phonenumber,age,hometown";
		}
		$tableJoin  = 'users';
		$record = $post->getRecordJoin( $id,$fields,$tableJoin);
		$this->setProperty('record',$record);
		$cmt = new comment_model();
		$fieldss='comments.id, post_id,user_id,firstname,cmt_time,comment_contents,photo';
		$records = $cmt->getRecordJoinn($id, $fieldss,$tableJoin);
		$this->setProperty('records',$records);
		$this->display();
	}	
	public function comment() {
		if(!empty($_POST["cmt"])) {	
			$cmt = new comment_model();
			$post = new post_model();
			$this->records = $cmt->insertById($_SESSION['user']['id'],$_POST['id'],$_POST["cmt"]);
			if ($this->records) {
				$conditionValue = "count_cmt = count_cmt + 1";
				$this->recordss = $post->updateById($_POST['id'],$conditionValue);
				$data['id'] =$_SESSION['user']['id'];
				$data['comment'] = $_POST["cmt"];

			} else {
				echo "Error";
			}	
		}
		else {
			$data['comment']= "Please comment.";
		}
		echo (json_encode($data));
	}
}
?>