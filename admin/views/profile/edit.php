<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?>
<div class="jumbotron">		
	<h1><?php 
		if(isset($_SESSION['admin'])){
			echo "Edit  profile ";
	}
	?></h1>
	<hr>	
	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo html_helpers::url(
		array('ctl'=>'profile', 
			  'act'=>$this->action, 
			  'params'=>array('id'=>$_SESSION['admin']['id'])
    )); ?>">
            <input type="hidden" value="<?php echo $_SESSION['admin']['birthday']?>" id = "birthday">
            <input type="hidden" value="<?php echo $_SESSION['admin']['hometown']?>" id = "hometown">
            <input type="hidden" value="<?php echo $_SESSION['admin']['gender']?>" id = "gender">
            <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input name="firstname" value="<?php echo $_SESSION['admin']['firstname']?>" type="text" class="form-control" id="fullname" placeholder="<?php echo $_SESSION['admin']['firstname']?>">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="email" value="<?php echo $_SESSION['admin']['email']?>" type="text" class="form-control" id="address" placeholder="<?php echo $_SESSION['admin']['email']?>" >
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" value="<?php echo $_SESSION['admin']['password']?>" type="text" class="form-control" id="phone" placeholder="<?php echo $_SESSION['admin']['password']?>" >
                </div>
            </div>
        <div class="form-group">
            <label for="phonenumber" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input name="phonenumber" value="<?php echo $_SESSION['admin']['phonenumber']?>"  type="text" class="form-control" id="phone" placeholder="<?php echo $_SESSION['admin']['phonenumber']?>" >
            </div>
        </div>
         <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Bio</label>
            <div class="col-sm-10">
                <textarea name="bio" class="form-control"><?php echo $_SESSION['admin']['bio']?> </textarea>
            </div>
         </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <textarea name="bio" class="form-control"><?php echo $_SESSION['admin']['email']?> </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
                <select name="gender" class="form-control" id="gender-option">
                    <option value="Not exist">Not exist</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Home town</label>
            <div class="col-sm-10">
                <select name="hometown" class="form-control" id="hometown-option">
                    <option value="null">Null</option>
                    <option value="Da Nang">Da Nang</option>
                    <option value="Japan">Japan</option>
                    <option value="USA">USA</option>
                    <option value="China">China</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-2 control-label">Birthday</label>
            <div class="col-sm-10">
                <select name="birthday" class="form-control" id="birthday-option" >
                    <option value="null">Null</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                </select>
            </div>
          </div>    
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-10 image-upload">
                 <div class="row">
                    <div class="col-4">
                      <img width="300px;" style = "border-radius: 114px;margin:10px;width: 205px;height: 204px;" src="<?php echo "../media/upload/profile/".(!empty($_SESSION['admin']['photo'])? $_SESSION['admin']['photo']: 'no_image.png'); ?>"  class="img-thumbnail">
                    </div>
                    <div class="col-6">
                      <input name="image" style ="margin-top: 160px;" type="file" class="form-control" id="photo" placeholder="<?php echo $_SESSION['admin']['photo']?>">
            <?php if ($_SESSION['admin']): ?>
                    </div>
                </div>    
            
                
            <?php endif; ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button name="btn_submit" type="submit" class="btn btn-default button-center2" >Submit</button> 
            </div>
        </div>
    </form>	
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            var  birthday =$("#birthday").val();
            var  hometown =$("#hometown").val();
            var  gender =$("#gender").val();
            $("#birthday-option").val(birthday);
            $("#hometown-option").val(hometown);
            $("#gender-option").val(gender);
        });
    </script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>