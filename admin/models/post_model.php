<?php
class post_model extends main_model
{
	public function addPost($status,$photo_post,$contents,$user_id) {
        $query = "INSERT INTO posts(title,photo_post,contents,user_id,count_like) VALUES ('$status','$photo_post','$contents','$user_id',0)";
        $a = mysqli_query($this->con,$query);
        if ($a) {
            return true;
        } else return false;
    }
     public function delRecordTwo($id=null, $conditions=null) {
        if($conditions) $conditions = ' and '.$conditions;
        $query = "DELETE FROM $this->table WHERE id=$id".$conditions;
        $query2 = "DELETE FROM likes WHERE post_id=$id".$conditions;
        mysqli_query($this->con,$query2);
        $query3 = "DELETE FROM comments WHERE post_id=$id".$conditions;
        mysqli_query($this->con,$query3);
        return mysqli_query($this->con,$query);
    }
    public function getRecordPost($id=null, $fields='*', $options=null) {
        $conditions = '';
        if(isset($options['conditions'])) {
            $conditions .= ' and '. $options['conditions'];
        }
        $fields="posts.*,(select firstname from users right join posts on  users.id=posts.user_id where posts.id=$id) as author,(select count(id) from comments WHERE comments.post_id=$id) as count_comment,(select count(user_id) from likes WHERE likes.post_id=$id) as count_likes";
        $query = "SELECT $fields FROM $this->table where id=$id".$conditions;         
        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
        }
        return $records; 
    } 
}
