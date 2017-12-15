<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="<?php echo e(url('public/user/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(url('public/user/assets/css/style.css')); ?>">
	<script src="<?php echo e(url('public/user/assets/js/jquery-1.10.2.min.js')); ?>"></script>
	<script src="<?php echo e(url('public/user/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(url('public/user/assets/js/custom.js')); ?>"></script>
	<!-- Custom Fonts -->
    <link href="<?php echo e(url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo URL::route('user.home'); ?>">Home</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo URL::route('admin.home'); ?>">ADMIN</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						
								<?php if(Session()->has('key')): ?>

								<?php 
			                        $api_token = Session()->get('key');
			                        $client = new GuzzleHttp\Client();
			                        $response = $client->post('http://localhost:8080/webservice/api/profile',['query' => ['token' => $api_token]]);
			                        $data = json_decode($response->getBody()->getContents()); 
			                    ?>
			            <li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		                    </a>	
		                    <ul class="dropdown-menu dropdown-user">        
									<li><a href="<?php echo URL::route('getProfile',$data->id); ?>">thông tin tài khoản</a></li>
									<li><a href="<?php echo URL::route('logout'); ?>">đăng xuất</a></li>
							</ul>
						</li>
								<?php else: ?>
									<!--<li><a href="<?php echo URL::route('getLoginUser'); ?>">đăng nhập</a></li>-->
									<li><a href="<?php echo URL::route('getLoginUser'); ?>" >đăng nhập</a></li>
								<?php endif; ?>
							
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<?php echo $__env->yieldContent('content'); ?>	
	</div>
<!--my script-->
    <script src="<?php echo e(url('public/admin/js/myscript.js')); ?>"></script>
</body>
</html>