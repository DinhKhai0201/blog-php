<?php  
    session_start(); 
?>
<?php
// include("../models/user_model.php");
if(isset($_POST['login']))   
{   
    // $userdata = new user_model();
    // $this->records = $userdata->getAllRecords();	
    // $user = $_POST['user'];
    // $pass = $_POST['pass'];
    // if ($user===$records["ten_dang_nhap"] && $pass===$records["mat_khau"]) {
    //     $_SESSION['dangnhap']=$user;
    //     header("Location:../index.php");
    // } else {
    //     header("Location:login.php");
    // }    
    
    if($user === "khai" && $pass === "123")  
    {                                
        $_SESSION['dangnhap']=$user;
        header("Location:../index.php"); 
    }
    else
    {
        header("Location:login.php");       
    }
}
 ?>