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
                            <h3 class="box-title">Import Data</h3>
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
                                            <a href="<?php echo e(url('admin/downloadExcel/pdf')); ?>"><button class="btn btn-success">Download Excel pdf</button></a>
                                            <a href="<?php echo e(url('admin/downloadExcel/xlsx')); ?>"><button class="btn btn-success">Download Excel xlsx</button></a>
                                            <a href="<?php echo e(url('admin/downloadExcel/csv')); ?>"><button class="btn btn-success">Download CSV</button></a>
                                            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="<?php echo e(url('admin/import-excel')); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

                                                <?php echo e(csrf_field()); ?>

                                                   <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Import  File</label>
                                                        <input type="file" name="import_file"/>
                                                    </div>
                                                </div>


                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                    <a href="<?php echo e(URL::to('admin/points')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
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