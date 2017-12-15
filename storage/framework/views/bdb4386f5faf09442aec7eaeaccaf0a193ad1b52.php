<?php $__env->startSection('content'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <small>Danh sách </small> Người dùng
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <?php if(Session::has('flash_message')): ?>
                            <div class="alert alert-<?php echo Session::get('flash_level'); ?>">
                                <?php echo Session::get('flash_message'); ?>

                            </div>
                        <?php endif; ?>
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
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $item->username; ?></td>
                                <td><?php echo $item->email; ?></td>

                                <!--if ($item->id == 1)
                                    <td style="color: red"><b>Superadmin</b></td>
                                else--><?php if($item->level == 1): ?>
                                    <td style="color: blue"><b>Admin</b></td>
                                <?php else: ?>
                                    <td style="color: green"><b>Member</b></td>
                                <?php endif; ?>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a onclick="return window.confirm('Bạn có chắc chắn muốn xóa ?');" href="<?php echo URL::route('admin.delete',$item->id); ?>">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="<?php echo URL::route('admin.getInfo',$item->id); ?>">Sửa</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
//<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>