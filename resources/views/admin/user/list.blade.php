@extends('admin.master')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <small>Danh sách </small> Người dùng
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên đăng nhập</th>
                                <th>email</th>
                                <th>Loại người dùng</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0  ?>
                            @foreach($data as $item)
                            <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item->username !!}</td>
                                <td>{!! $item->email !!}</td>

                                <!--if ($item->id == 1)
                                    <td style="color: red"><b>Superadmin</b></td>
                                else-->@if ($item->level == 1)
                                    <td style="color: blue"><b>Admin</b></td>
                                @else
                                    <td style="color: green"><b>Member</b></td>
                                @endif
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?');" href="{!! URL::route('admin.delete',$item->id) !!}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.getInfo',$item->id) !!}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
//@endsection()