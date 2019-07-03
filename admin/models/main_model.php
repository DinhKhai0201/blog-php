<?php
class Main_Model 
{
	protected $con;
	protected $table;
	public function __construct(){
		$this->con =  mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		mysqli_set_charset($this->con, 'UTF8');
		if(mysqli_connect_error()) {
			echo "Failed to connect to MySQL". mysqli_connect_error();exit();
		}
		if(!$this->table)	$this->setTableName();
	}	
	protected function setTableName($table=null){
		if($table) {
			$this->table=$table;
		} else {
			$cln = get_class($this);
			$clnf = str_split($cln, strrpos($cln, '_'))[0];
			$this->table = $this->getTableFromModel($clnf);
		}
	}
	protected function getTableFromModel($model=null){
		if (strrpos($model,"y")) {
			if ((strrpos($model,"y") + 1) == strlen($model)) {
				return str_split($model, strrpos($model, 'y'))[0].'ies'; 
			} 
		} else {
			return $model.'s';
		}
	}
	
	public function getAllRecords($fields='*', $options=null) { 
		$conditions = '';
		if(isset($options['conditions'])) {
			$conditions .= ' where '.$options['conditions'];
		}
		$order = '';
		if(isset($options['order'])) {
			$order .= ' order '.$options['order'];
		}
		$query = "SELECT ".$fields." FROM ".$this->table.$conditions.$order;
		$result = mysqli_query($this->con,$query);
		return $result;
	}

	public function getRecord($id=null, $fields='*', $options=null) {
		$conditions = '';
		if(isset($options['conditions'])) {
			$conditions .= ' and '. $options['conditions'];
		}
		$query = "SELECT $fields FROM $this->table where id=$id".$conditions;	

		$result = mysqli_query($this->con,$query);
		$records = [];
		foreach ($result as $key => $value) {
			$records[]=$value;
		}
		return $records;
	}
	public function getUserLke($id=null) {
		$query = "SELECT firstname FROM users WHERE id in (SELECT user_id from likes WHERE post_id=".$id.")";	
		$result = mysqli_query($this->con,$query);
		$records = [];
		foreach ($result as $key => $value) {
			$records[]=$value;
		}
		return $records;
	}
	public function getUsercmt($id=null) {
		$query = "SELECT firstname FROM users WHERE id in (SELECT user_id from comments WHERE post_id=".$id.")";	
		$result = mysqli_query($this->con,$query);
		$records = [];
		foreach ($result as $key => $value) {
			$records[]=$value;
		}
		return $records;
	}
	public function delRecord($id=null, $conditions=null) {
		if($conditions)	$conditions = ' and '.$conditions;
		$query = "DELETE FROM $this->table WHERE id=$id".$conditions;
		return mysqli_query($this->con,$query);
	}
	
	public function addRecord($datas) {
		$fields = $values = '';
		$i=0;
		foreach($datas as $k=>$v) {
			if($i) {
				$fields .=',';
				$values .=',';
			}
			$fields .= $k;
			$values .= "'".$v."'";
			$i++;
		}
		$query = "INSERT INTO $this->table($fields) VALUES ($values)";
		return mysqli_query($this->con,$query);
	}
	
	public function editRecord($id,$datas){
		$setDatas = '';
		$i=0;
		foreach($datas as $k=>$v) {
			if($i) {
				$setDatas .=',';
			}
			$setDatas .= $k."='".$v."'";
			$i++;
		}
        $query = "UPDATE $this->table SET $setDatas WHERE id='$id'";
		return mysqli_query($this->con,$query);
	}
	
	public function getRecordByCondition ($conditions, $fields="*") {
		$query = "SELECT $fields FROM $this->table where ".$conditions;
		$result = mysqli_query($this->con,$query);
		if($result) {
			$record = mysqli_fetch_array($result);
		} else $record=false;
		return $record;
	}
	public function getRecordEmail ($conditions, $fields="*") {
		$query = "SELECT $fields FROM $this->table where ".$conditions;
		 return mysqli_query($this->con,$query);
		
	}
    public static function convertToList($mysqliObject) {
    	$arrReturn = [];
    	while($row = mysqli_fetch_array($mysqliObject)) {
    		$arrReturn[$row['id']] = $row['cat_name'];
    	}
    	return $arrReturn;
	}
	 public function trimEnd($string) {
        return $string.substring(0, string.length - 1);
    }

    public function getLeftJoinTable($fields="*",$modelJoin, $options=null) { 
        $conditions = '';
        $tableJoin = $this->getTableFromModel($modelJoin);
        if(isset($options['conditions'])) {
            $conditions .= ' where '.$options['conditions'];
        }
        $query = "SELECT $fields FROM $this->table INNER JOIN $tableJoin ON $this->table.$modelJoin"."_id=$tableJoin.id".$conditions;   

        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
        }
        return $records;
    }
}