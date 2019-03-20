<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Sent Messages </h3>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <?php $i=1;?>

                            </div>
                            <div class="row">

                                <div class="col-xs-12">
                                    <a href="<?php echo e(url('admin/export-file/xls/'.$from.'/'.$to)); ?>" class="pull-right"><button class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel</button></a>
                                    <a href="<?php echo e(url('admin/export-file/csv/'.$from.'/'.$to)); ?>" class="pull-right"><button class="btn btn-success" style="margin-right: 20px;"> <i class="fa fa-file" aria-hidden="true"></i> Export to CSV</button></a>
                                    <table id="loyalty" class="table table-bordered table-striped loyalty">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(trans('labels.ID')); ?></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Date Created</th>
                                            <th width="50%">Message</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($message->username); ?></td>
                                                <td><?php echo e($message->email); ?></td>
                                                <td><?php echo e($message->phone); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($message->created_at))); ?></td>
                                                <td><?php echo e($message->message); ?></td>

                                        </tr>
                                        <?php $i++?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->



            <!-- Main row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>