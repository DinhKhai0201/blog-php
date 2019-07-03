<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="softdevelopinc">
    <meta name="author" content="softdevelopinc@gmail.com">
    <link href="../media/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../media/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../media/bootstrap/css/fontawesome.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous">
    <link href="../media/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../media/css/main.css" rel="stylesheet">
    <link href="../media/css/view.css" rel="stylesheet">
	<?php 
	global $enableOB;
	if($enableOB) {
		ob_start("html_helpers::_media"); 
		echo "CSSABOVE";
	}
	echo html_helpers::cssHeader();
	?>
    <script src="../media/js/jquery.min.js"></script>
    <script src="../media/js/view.js"></script>
    <script src="../media/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../media/DataTables/datatables.min.js"></script>
    <script type="application/x-javascript">
        tinymce.init({selector:'#TypeHere'});
    </script>
</head>
<body role="document" cz-shortcut-listen="true">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        </div>
        <div id="" class="menu">
          <ul class="menu-ul">
            <li class="active"><a href="<?php echo html_helpers::url('/'); ?>">Manage</a></li>   
            <?php if (isset($_SESSION['admin'])) {?> 
              <li><a href="<?php echo html_helpers::url(array('ctl'=>'profile')); ?>"><?php echo $_SESSION['admin']['firstname'];?></a></li>
            <?php } else {?>                                  	        
              <li><a href="<?php echo html_helpers::url(array('ctl'=>'login')); ?>">Login</a></li>
            <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">