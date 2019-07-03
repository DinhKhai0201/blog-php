<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?> 
	<div class="background" style="margin-top: 100px;">
	</div>		
	<?php foreach ($this->records as $key => $value) {?>
	<main class="profile-page" >
	    <section class="section">
	      <div class="container">
	        <div class="card card-profile shadow mt--300">
	          <div class="px-4">
	            <div class="row justify-content-center">
	              <div class="col-lg-3 order-lg-2">
	                <div class="card-profile-image">
	                  <a href="#">
	                  	<img width=" 300px" style = "border-radius: 114px;margin:10px;width: 205px;height: 204px;" src="<?php echo "media/upload/" .$this->controller.'/'.(!empty($value['photo'])? $value['photo']: 'no_image.png');?>"  class="img-thumbnail rounded-circle">	
	                  </a>
	                </div>
	              </div>
	              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
	                <div class="card-profile-actions py-4 mt-lg-0">
	                  <a href="<?php echo html_helpers::url(array('ctl'=>'profile','act'=>'edit','params'=>array('id'=>$_SESSION['user']['id']))); ?>" class="btn btn-sm btn-info mr-4">Edit</a>
	                  <a href="<?php echo html_helpers::url(array('ctl'=>'logout')); ?>" class="btn btn-sm btn-default float-right">Logout</a>
	                </div>
	              </div>
	              <div class="col-lg-4 order-lg-1" style="margin-top: 75px;">
	              	<div class="col-md-4 col-sm-4 text-center">
						<h2><strong> <?php echo $value['number_posts']; ?> </strong></h2> 
						<p><small>Posts</small></p>                    
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<h2><strong><?php echo $value['number_likes']; ?></strong></h2>                    
						<p><small>Likes</small></p>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<h2><strong><?php echo $value['number_cmts']; ?></strong></h2>                    
						<p><small>Comments</small></p>	
					</div>
	              </div>
	            </div>
	            <div class="text-center mt-5">
	              <h3><?php echo $value['firstname']; ?><span class="font-weight-light"></span></h3>
	              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i><?php echo $value['gender']; ?></div>
	              <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i><?php echo $value['email']; ?></div>
	              <div><i class="ni education_hat mr-2"></i><?php echo $value['phonenumber']; ?></div>
	            </div>
	            <div class="mt-5 py-5 border-top text-center">
	              <div class="row justify-content-center">
	               <div class="col-lg-9">
	                  <p></p>
	                  <?php echo $value['bio']; ?>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	  </main> 	
	  <?php } ?>		
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>