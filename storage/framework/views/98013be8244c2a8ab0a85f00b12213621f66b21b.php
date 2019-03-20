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
                         <h3 class="box-title">Loyalty Policies </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">


                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="loyalty" class="table table-bordered table-striped loyalty">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Amount</th>
                                            <th>Points</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($policy->id); ?></td>
                                                <td><?php echo e($policy->title); ?></td>
                                                <td><?php echo e($policy->amount); ?></td>
                                                <td><?php echo e($policy->points); ?></td>
                                                <td><?php echo e($policy->description); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/policies/'.$policy->id.'/edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i>Change</a>

                                                </td>
                                        </tr>
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