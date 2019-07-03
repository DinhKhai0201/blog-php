<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="softdevelopinc">
    <meta name="author" content="softdevelopinc@gmail.com">
    <!-- Le styles -->
    <link href="media/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="media/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="media/bootstrap/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
 
    <link href="media/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="media/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">  
    <link type="text/css" href="media/assets/css/argon.css?v=1.0.1" rel="stylesheet">
    <link href="media/css/main.css" rel="stylesheet">
    <link href="media/css/w3.css" rel="stylesheet">
    <link href="media/css/view.css" rel="stylesheet">
	<?php 
	global $enableOB;
	if($enableOB) {
		ob_start("html_helpers::_media"); 
		echo "CSSABOVE";
	}
	echo html_helpers::cssHeader();
	?>
    <script src="media/js/jquery.min.js"></script>
    <script src="media/js/view.js"></script>
    <script src="media/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="application/x-javascript">
        tinymce.init({selector:'#TypeHere'});
    </script>
</head>
<body role="document" cz-shortcut-listen="true">
    <!--  -->
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
          <div class="container">
            <a class="navbar-brand mr-lg-5" href="<?php echo html_helpers::url('/'); ?>"><img width="30px" src="media/images/icon-weather.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                <li class="nav-item dropdown">
                  <a href="<?php echo html_helpers::url('/'); ?>" class="nav-link">
                    <i class="ni ni-ui-04 d-lg-none"></i>
                    <span class="nav-link-inner--text">Home</span>
                  </a>
                </li>
                <?php if(isset($_SESSION['user'])){ ?>
                <li class="nav-item dropdown">
                  <a href="<?php echo html_helpers::url(array('ctl'=>'posts','act'=>'add')); ?>" class="nav-link">
                    <i class="ni ni-ui-04 d-lg-none"></i>
                    <span class="nav-link-inner--text">Write your experience</span>
                  </a>
                </li>
            <?php }?>
              </ul>
              <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://www.facebook.com" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                    <i class="fa fa-facebook-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Facebook</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://www.instagram.com" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                    <i class="fa fa-instagram"></i>
                    <span class="nav-link-inner--text d-lg-none">Instagram</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://twitter.com" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                    <i class="fa fa-twitter-square"></i>
                    <span class="nav-link-inner--text d-lg-none">Twitter</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="https://github.com/" target="_blank" data-toggle="tooltip" title="Star us on Github">
                    <i class="fa fa-github"></i>
                    <span class="nav-link-inner--text d-lg-none">Github</span>
                  </a>
                </li>
                 <?php if(isset($_SESSION['user'])){ ?>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text"><?php echo $_SESSION['user']['firstname'];?></span>
                  </a>
                  <div class="dropdown-menu">
                    <a href="<?php echo html_helpers::url(array('ctl'=>'profile')); ?>" class="dropdown-item">Profile</a>
                    <a href="<?php echo html_helpers::url(array('ctl'=>'posts','act'=>'add')); ?>" class="dropdown-item">Manage your blog</a>
                    <a href="<?php echo html_helpers::url(array('ctl'=>'logout')); ?>" class="dropdown-item">Logout</a>
                  </div>
                </li>
            <?php } else {?>
                <li class="nav-item dropdown">
                  <a href="<?php echo html_helpers::url(array('ctl'=>'login')); ?>" class="nav-link">
                    <i class="ni ni-ui-04 d-lg-none"></i>
                    <span class="nav-link-inner--text">Login</span>
                  </a>
                </li>
            <?php }?>    
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <!-- Fixed navbar -->
<!--     <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?php echo html_helpers::url('/'); ?>"><img width="30px" src="media/images/icon-weather.png"></a>
        </div>
        <div id="" class="menu">
          <ul class="menu-ul">
            <li class="active"><a href="<?php echo html_helpers::url('/'); ?>">Home</a></li>
            <?php if(isset($_SESSION['user'])){ ?>
                <li><a href="<?php echo html_helpers::url(array('ctl'=>'posts','act'=>'add')); ?>">Write your think</a></li>
                <li><a href="<?php echo html_helpers::url(array('ctl'=>'profile')); ?>"><?php echo $_SESSION['user']['firstname'];?></a></li>                          
		        <?php } else { ?>
              <li><a href="<?php echo html_helpers::url(array('ctl'=>'login')); ?>">Login</a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav> -->
    <div class="container theme-showcase" role="main">