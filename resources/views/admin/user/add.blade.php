@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><small>Thêm </small> Người dùng
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                     @include('admin.blocks.error')
                        
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                        
                        <form action="" method="POST">
                        <!--<input type="hidden" name="_token" value="{!! csrf_token() !!}">-->
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input class="form-control" name="txtUser" placeholder="vui lòng nhập tên người dùng" value="{!! old('txtUser') !!}" required />
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="HoTen" placeholder="vui lòng nhập tên người dùng" value="{!! old('HoTen') !!}" required />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" name="date" value="{!! old('date') !!}" style="width: 50%" required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="vui lòng nhập email" value="{!! old('txtEmail') !!}" required/>
                            </div>
                             <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt" placeholder="vui lòng nhập số điện thoại" value="{!! old('sdt') !!}" maxlength="15" minlength="10" required/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="vui lòng nhập mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="vui lòng nhập lại mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <label>Loại người dùng</label> 
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Hoàn Tất</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection()