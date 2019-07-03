<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?> 
<div class="jumbotron">		
	<h1><?php 
		if(isset($_SESSION['admin'])){
			echo "Profile of ",$_SESSION['admin']['firstname'];
	}
	?></h1> 
		<div class="edit" style="margin-top: 20px;text-align: center;"> 
			<a href="<?php echo html_helpers::url(array('ctl'=>'profile','act'=>'edit','params'=>array('id'=>$_SESSION['admin']['id']))); ?>">Edit</a>			
		</div>	
	<hr>	
	<div class="data">
			<div class="row">
                    <div class="col-4">
                      <img width=" 300px" style = "border-radius: 114px;margin:10px;width: 205px;height: 204px;" src="<?php echo "../media/upload/" .$this->controller.'/'.(!empty($_SESSION['admin']['photo'])? $_SESSION['admin']['photo']: 'no_image.png');?>"  class="img-thumbnail">	
                    </div>
                    <div class="col-4">
                     	<p>Name : <?php echo $_SESSION['admin']['firstname']; ?></p>
						<p>Email :<?php echo $_SESSION['admin']['email']; ?></p>
						<p>Phone number : <?php echo $_SESSION['admin']['phonenumber']; ?> </p>
						<p>Gender : <?php echo $_SESSION['admin']['gender']; ?></p>
						<p>Birthday : <?php echo $_SESSION['admin']['birthday']; ?></p>
						<p>Hometown : <?php echo $_SESSION['admin']['hometown']; ?> </p>           
                    </div>
                     <div class="col-4">
                     	<a style="bottom: 10px;position: absolute;right: 55px;" href="<?php echo html_helpers::url(array('ctl'=>'profile','act'=>'logout')); ?>">Log Out</a>						
                     </div>
                </div> 				
			</div>					
	</div>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>