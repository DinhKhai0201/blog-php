<?php
class user_model extends main_model
{
    public function loginAd($email,$password) {
        $conditions = "email='".$email. "' AND password='".$password."'"."AND role=1";
        $ur = $this->getRecordByCondition($conditions);
        if ($ur) {
            $_SESSION["admin"] = $ur;
            return true;
        } else return false;
    } 
    public function delRecordTwo($id=null, $conditions=null) {
        if($conditions) $conditions = ' and '.$conditions;
        $query = "DELETE FROM $this->table WHERE id=$id".$conditions;
        $query5 = "UPDATE posts SET count_like=count_like -1 WHERE id in (SELECT post_id from likes WHERE user_id=$id)";
        mysqli_query($this->con,$query5);
        $query2 = "DELETE FROM likes WHERE user_id=$id".$conditions;
        mysqli_query($this->con,$query2);
        $query3 = "DELETE FROM comments WHERE user_id=$id".$conditions;
        mysqli_query($this->con,$query3);
        $query4 = "DELETE FROM posts WHERE user_id=$id".$conditions;
        mysqli_query($this->con,$query4);            
        return mysqli_query($this->con,$query);
    }
    public function addUser($firstname,$email,$password,$phonenumber,$gender,$hometown,$birthday,$photo_edit,$bio) {
        $query = "INSERT INTO users(firstname,email,password,gender,age,phonenumber,birthday,hometown,role,photo,bio) VALUES ('$firstname','$email','$password','$gender',0,'$phonenumber','$birthday','$hometown',0,'$photo_edit','$bio')";
        $a = mysqli_query($this->con,$query);
        if ($a) {
            return true;
        } else return false;

    }
     public function checkExist($email) {
        $conditions = "email='".$email. "'";
        $this->ur = $this->getRecordEmail($conditions);
        if (mysqli_num_rows($this->ur)>=1) {

            return false;
        } else return true;
    }
    
}