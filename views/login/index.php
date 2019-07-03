<html>
<head>
    <title> Login Page   </title>
</head>
<body>
    <?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
    <?php echo ($this->error)? "<br><p>".$this->error ."</p><br>": ""; ?>
    <form method="post" class="form-login " style=" margin:100px auto;width: 400px;background-color: #6c757d ;border-radius: 4px;box-shadow: 5px;padding-bottom:  50px">
        <p class="title-dsg color-white">Login</p>
        <div class="form-group">
            <label for="exampleInputEmail1 " class="color-white">Email address</label>
            <input type="input" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="color-white">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn_submit button-center2" name="btn_submit" >Submit</button>
         <div class="form-group">
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light"><small>Forgot password?</small></a>
              </div>
              <div class="col-6 text-right">
               <a class = "register-button color-white" href="<?php echo html_helpers::url(array('ctl'=>'register')); ?>">Register</a>
            </div>
             </div> 
         </div>
       
    </form>
    
    <?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
    <?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>
</body>
</html>
