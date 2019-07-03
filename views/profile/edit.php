<?php include_once 'views/layout/'.$this->layout./*? */'header.php'; ?>
<div class="jumbotron" style="background-color: white;">		
	<h1><?php 
		if(isset($_SESSION['user'])){
			echo "Edit  profile ";
	}
	?></h1>
	<hr>	
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo html_helpers::url(
        array('ctl'=>'profile', 
              'act'=>'edit',
               'params'=>array('id'=>$_SESSION['user']['id'])
        )); ?>">
            <input type="hidden" value="<?php echo $_SESSION['user']['birthday']?>" id = "birthday">
    <input type="hidden" value="<?php echo $_SESSION['user']['hometown']?>" id = "hometown">
    <input type="hidden" value="<?php echo $_SESSION['user']['gender']?>" id = "gender">
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input name="firstname" type="text" class="form-control" id="firstname" placeholder="firstname" value="<?php echo $_SESSION['user']['firstname'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="text" class="form-control" id="address" placeholder="email" value="<?php echo $_SESSION['user']['email'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="text" class="form-control" id="password" placeholder="password" value="<?php echo $_SESSION['user']['password'];?>" >
            </div>
          </div>
          <div class="form-group">
            <label for="phonenumber" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input name="phonenumber" type="text" class="form-control" id="phonenumber" placeholder="phonenumber" value="<?php echo $_SESSION['user']['phonenumber'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Bio</label>
            <div class="col-sm-10">
                <textarea name="bio" class="form-control"><?php echo $_SESSION['user']['bio']?> </textarea>
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
              <input name="image" type="file" class="form-control" id="photo" placeholder="photo">
              <img width="300px;" style = "border-radius: 114px;margin:10px;width: 205px;height: 204px;" src="<?php echo "media/upload/profile/".(!empty($_SESSION['user']['photo'])? $_SESSION['user']['photo']: 'no_image.png'); ?>"  class="img-thumbnail">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button name="btn_submit" type="submit" class="btn btn-default button-center2 ">Submit</button> 
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