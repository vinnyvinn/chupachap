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
                            <h3 class="box-title">Transfer Points</h3>
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
                                            <form action="<?php echo e(url('admin/update-transfer')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="id" value="<?php echo e($customer->customers_id); ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Customer to be transfered</label>
                                                        <select name="customer_id" id="" class="form-control select2">
                                                            <option value="<?php echo e($customer->customers_id); ?>"><?php echo e($customer->customers_firstname.' '.$customer->customers_lastname); ?></option>
                                                          <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($client->customers_id); ?>"><?php echo e($client->customers_firstname.' '.$client->customers_lastname); ?></option>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Points to Transfer</label>
                                                        <input type="number" name="amount" class="form-control" placeholder="Enter amount Spent">
                                                    </div>
                                                </div>


                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Transfer Points</button>
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