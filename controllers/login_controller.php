<?php 
class login_controller extends main_controller
{
	public function index() 
	{

        $this->error = false;
		if(isset($_POST['btn_submit'])) {
			if(isset($_POST['email']) && isset($_POST['password'])) {
                $um = new user_model();
                    if($um->login($_POST['email'],$_POST['password'])) {
                        header( "Location: ".html_helpers::url(array('ctl'=>'home')));
                    } else {
                        $this->error = "Wrong email or password!";
                    }
                
			} else {
                $this->error = "Email & password can't empty!";
            }
		}
		$this->display();
    } 
}
?>
