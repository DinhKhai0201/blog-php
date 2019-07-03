<?php
class post_model extends user_model
{
	public function addPost($status,$photo_post,$contents,$user_id) {
        $query = "INSERT INTO posts(title,photo_post,contents,user_id,count_like) VALUES ('$status','$photo_post','$contents','$user_id',0)";
        $a = mysqli_query($this->con,$query);
        if ($a) {
            return true;
        } else return false;
    }
    public function updateById($id,$conditionValue){	
		$query ="UPDATE posts SET ".$conditionValue." WHERE id='" . $id . "'";
        $a = mysqli_query($this->con,$query);
	}
	public function getRecordJoin($id, $fields='*',$tableJoin ) {
		$conditions = ' WHERE posts.id='.$id;
        $query = "SELECT $fields FROM $this->table INNER JOIN $tableJoin ON $this->table.user"."_id=$tableJoin.id".$conditions;   
        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
        }
        return $records;
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
    
    
}
