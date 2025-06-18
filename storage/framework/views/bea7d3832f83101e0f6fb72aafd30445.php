<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Trang tổng quan User</title>
    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/theme_admin/css/bootstrap.min.css')); ?>" type="text/javascript"></>
    <link href="<?php echo e(asset('public/summernote/summernote.min.css')); ?>" type="text/javascript"></>
    
    <script src="<?php echo e(asset('summernote/summernote.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>" type="text/javascript"></script>
    
    <script src="<?php echo e(asset('theme_admin/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    
    <script src="https://kit.fontawesome.com/550b63b5bc.js" crossorigin="anonymous"></script>
    
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('theme_admin/css/dashboard.css')); ?>" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Trang chủ</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="#">Xin chào: <?php echo e(get_data_user('web','name')); ?></a></li>
                    <li><a href="<?php echo e(route('logout')); ?>">Đăng xuất</a></li>
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="<?php echo e(\Request::route()->getName() == 'admin.home' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('home')); ?>">TRANG CHỦ</a>
                    </li>
                </ul>

            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php if(\Session::has('success')): ?>
                <div class="alert alert-success alert-dismissible" style="position: fixed; right:200px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo e(\Session::get('success')); ?>

                  </div>
                  <?php endif; ?>
                  <?php if(\Session::has('danger')): ?>
                  <div class="alert alert-danger alert-dismissible" style="position: fixed; right:200px">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> <?php echo e(\Session::get('danger')); ?>

                    </div>
                    <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
            ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo e(asset('theme_admin/js/bootstrap.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    
</body>

</html>
<?php /**PATH D:\Web_Ban_Do_Dien_Tu\resources\views/user/layout.blade.php ENDPATH**/ ?>