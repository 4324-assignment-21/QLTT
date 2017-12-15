<?php $__env->startSection('content'); ?>		

		<?php if(Session::has('flash_message')): ?>
            <div class="alert alert-<?php echo Session::get('flash_level'); ?>">
            	<?php echo Session::get('flash_message'); ?>

        	</div>
        <?php endif; ?>
		<div class="jumbotron">
			<div class="alert alert-success" role="alert">
				<?php if(Session()->has('key')): ?>
					<?php 
                        $api_token = Session()->get('key');
                        $client = new GuzzleHttp\Client();
                        $response = $client->post('http://localhost:8080/webservice/api/profile',['query' => ['token' => $api_token]]);
                        $data = json_decode($response->getBody()->getContents()); 
                    ?>
					<b>Welcome <?php echo $data->HoTen; ?></b>
				<?php else: ?>
					<b>Welcome Guest</b>
				<?php endif; ?>
			</div>
			<h1 class="text-center"> Home </h1>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>