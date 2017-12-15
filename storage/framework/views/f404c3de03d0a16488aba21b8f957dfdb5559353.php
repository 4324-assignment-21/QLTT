
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>Admin-Login</title>

    <!-- Custom styles-->
    <link href="<?php echo e(url('public/admin/dist/css/signin.css')); ?>" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(url('public/admin/assets/js/jquery-1.10.2.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/assets/js/custom.js')); ?>"></script>

</head>

<body>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">     
    <?php echo $__env->make('admin.blocks.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php if(session('status')): ?>
    <div class="alert alert-danger">
        <ul>
            <li class="text-danger"> <?php echo e(session('status')); ?></li>
        </ul>
    </div>
     <?php endif; ?>
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Đăng nhập</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" method="POST" action="<?php echo e(route('postlogin')); ?>" role="form">
                <!--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                -->
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="text" class="form-control" name="account" placeholder="Tài khoản" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <!--<div class="input-group">
                        <div class="checkbox">
                            <label>
                              <input id="remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>
                    </div>-->   

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-4 controls">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Đăng nhập</button>
                        </div>
                    </div>
                </form> 
            </div>                     
        </div>  
    </div>
</div>
<!--my script-->
    <script src="<?php echo e(url('public/admin/js/myscript.js')); ?>"></script>
</body>
</html>