<?php 
class register_controller extends main_controller
{
	public function index() 
	{
        $this->error = false;
        $firstname = $_POST["name"];
  		$password = $_POST["password"];
 		$email = $_POST["email"];
		if(isset($_POST['btn_submit'])) {
			if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
                $um = new user_model();
                if($um->checks($_POST['email'],$_POST['password'],$_POST['name'])) {
                    $um->login($_POST['email'],$_POST['password']);
                    header( "Location: ".html_helpers::url(array('ctl'=>'home')));
                } else {
                    $this->error = "Exist email or password or Name!";
                }
			} else {
                $this->error = "Email & password & name can't empty!";
            }
		}
		$this->display();
    } 
}
?>
