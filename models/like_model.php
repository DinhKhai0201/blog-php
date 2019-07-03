<?php
class like_model extends main_model {
	public function insertById($id1,$id2){
		$query = "INSERT INTO likes (user_id,post_id) VALUES ('" . $id1."','".$id2."')";
        $result = mysqli_query($this->con,$query);
        if($result) {
			$record = true;
		} else $record=false;
		return $record;
	}
	public function deleteById($id1,$id2){
		$query = "DELETE FROM likes WHERE user_id = '" . $id1. "' and post_id = '" . $id2 . "'";
        $result = mysqli_query($this->con,$query);
        if($result) {
			$record = true;
		} else $record=false;
		return $record;
	}
}