<?php
class comment_model extends main_model {
	public function insertById($id1,$id2,$value){
		$query = "INSERT INTO comments (user_id,post_id,comment_contents) VALUES ('" . $id1."','".$id2."','".$value."')";
        $result = mysqli_query($this->con,$query);
        if($result) {
			$record = true;
		} else $record=false;
		return $record;
	}
    public function insertCmt($id1,$id2){
        $query = "INSERT INTO comments (user_id,post_id) VALUES ('" . $id1."','".$id2."')";
        $result = mysqli_query($this->con,$query);
        if($result) {
            $record = true;
        } else $record=false;
        return $record;
    }
	public function getRecordJoinn($id, $fields='*',$tableJoin ) {
        $conditions = ' WHERE post_id='.$id;
        $query = "SELECT $fields FROM $this->table INNER JOIN $tableJoin ON $this->table.user"."_id=$tableJoin.id".$conditions;   
        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
        }
        return $records;
    }
}