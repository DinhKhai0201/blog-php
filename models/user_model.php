<?php
class user_model extends main_model
{
    public function login($email,$password) {
        $conditions = "email='".$email. "' AND password='".$password."'";
        $ur = $this->getRecordByCondition($conditions);
        if ($ur) {
            $_SESSION["user"] = $ur;
            return true;
        } else return false;
    }
     public function checkAdmin($email,$password) {
        $conditions = "email='".$email. "' AND password='".$password."'"."AND role =1";
        $ur = $this->getRecordByCondition($conditions);              
        if ($ur) {
            $_SESSION["admin"] = $ur;
            return true;           
        } else return false;
    }
    public function checks($email,$pass,$name) {
        $conditions = "email='".$email."' AND password='".$pass."' AND firstname='".$name."'";
        $query = "SELECT * FROM $this->table where ".$conditions;
        $result = mysqli_query($this->con,$query);
        if(mysqli_num_rows($result)  > 0){             
            return false ;
        } else {          
            $query = "INSERT INTO users(password,firstname,email,age,bio,phonenumber,gender,birthday,hometown,photo,role) VALUES ('$pass','$name','$email',0,'','','','','','','0')";
            $a = mysqli_query($this->con,$query);
            if ($a) {
                return true;
            }  
            else {
                return false;
            }
        }
    } 
    public function joinTableUser($fields="*",$tableJoin, $options=null) { 
        $conditions = '';
        if(isset($options['conditions'])) {
            $conditions .= ' where '.$options['conditions'];
        }
        $query = "SELECT $fields FROM $this->table INNER JOIN $tableJoin ON $this->table.user"."_id=$tableJoin.id".$conditions;   

        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
        }
        return $records;
    }
    public function joinThreeTable($fields="*",$tableJoin1,$tableJoin2, $options=null) {
        $conditions = ' ORDER BY users.id';
        if(isset($options['conditions'])) {
            $conditions .= ' where '.$options['conditions'];
        }
        $query = "SELECT $fields FROM $this->table LEFT JOIN $tableJoin1 ON $this->table.id=$tableJoin1.user"."_id"." INNER JOIN $tableJoin2 ON  $tableJoin1.id = $tableJoin2.post"."_id".$conditions;   
        $result = mysqli_query($this->con,$query);
        $records = [];
        foreach ($result as $key => $value) {
            $records[]=$value;
            exit(json_encode($value));
        }
        return $records;
    }   
    function selectJoin($fieldss, $tableJoins,$conditions=null) {
        $conditions= "where post_id in post.id";
        $query = "SELECT $fieldss FROM $this->table RIGHT JOIN $tableJoins ON $this->table.id=$tableJoins.post"."_id".$conditions;   
        $result = mysqli_query($this->con,$query);
        $rowcount = mysqli_num_rows($result); 
        exit(json_encode($query));  
        return $rowcount;
    }
}