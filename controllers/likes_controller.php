<?php
class detail_controller extends main_controller 
{
    public function like($id) 
    {
		$like = new like_model();
		$record = $like->getRecord($id);
		$this->setProperty('record',$record);
		$this->display();
	}	
}
?>