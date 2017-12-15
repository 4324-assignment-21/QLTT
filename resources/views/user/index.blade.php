@extends('user.home')
@section('content')		

		@if(Session::has('flash_message'))
            <div class="alert alert-{!! Session::get('flash_level') !!}">
            	{!! Session::get('flash_message') !!}
        	</div>
        @endif
		<div class="jumbotron">
			<div class="alert alert-success" role="alert">
				@if(Session()->has('key'))
					<?php 
                        $api_token = Session()->get('key');
                        $client = new GuzzleHttp\Client();
                        $response = $client->post('http://localhost:8080/webservice/api/profile',['query' => ['token' => $api_token]]);
                        $data = json_decode($response->getBody()->getContents()); 
                    ?>
					<b>Welcome {!! $data->HoTen !!}</b>
				@else
					<b>Welcome Guest</b>
				@endif
			</div>
			<h1 class="text-center"> Home </h1>
		</div>
@endsection()