<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../media/css/admin/util.css">
    <link rel="stylesheet" type="text/css" href="../media/css/admin/main.css">

</head>
<body>  
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
                    <span class="login100-form-title">
                        Admin
                    </span>
                    <?php echo $this->error;?>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
                        <input class="input100" type="text"  placeholder="email" name="email">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
                        <input class="input100" type="password"  placeholder="Password" name="password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn m-b-16" >
                        <button class="login100-form-btn" name="btn_submit">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>