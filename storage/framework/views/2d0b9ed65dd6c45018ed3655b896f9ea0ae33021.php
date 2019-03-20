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
                            <h3 class="box-title">Choose Period</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">
                                        <br>
                                        <?php if(count($errors) > 0): ?>
                                            <?php if($errors->any()): ?>
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <?php echo e($errors->first()); ?>

                                                </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- form start -->
                                        <div class="box-body">
                                            <form action="<?php echo e(url('admin/get-report')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">From :</label>
                                                        <input type="text" name="date_from" class="form-control pick-date" placeholder="Date from">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">To :</label>
                                                        <input type="text" name="date_to" class="form-control pick-date" placeholder="Date to">
                                                    </div>
                                                </div>



                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Generate Report</button>
                                                    <a href="<?php echo e(URL::to('admin/send-messages')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>