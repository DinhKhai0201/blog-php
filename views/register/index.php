<html>
<head>
    <title> Register Page   </title>
</head>
<body>
    <?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
    <?php //html_helpers::header($this->layout, ['css'=>$cssFiles]); ?>
    <?php 
        global $obMediaFiles;
        array_push($obMediaFiles['css'], "media/css/register.css");
    ?>
    <?php echo ($this->error)? "<br><p>".$this->error ."</p><br>": ""; ?>
    <form method="post" class="form-login " style=" margin:100px auto;width: 400px;background-color: #6c757d ;border-radius: 4px;box-shadow: 5px;padding-bottom:  50px">
        <p class="title-dsg color-white">REGISTER</p>
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="input" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
        </div>
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
         </div>
       
    </form>
    <?php
	array_push($obMediaFiles['js'], "media/js/login.js");
    ?>
    <?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
    <?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>
</body>
</html>
