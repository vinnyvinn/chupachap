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
                            <h3 class="box-title">Loyalty Customers </h3>

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
                                            <th><?php echo e(trans('labels.ID')); ?></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Loyalty Points</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                               <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <td><?php echo e($customer->customers_id); ?></td>
                                               <td><?php echo e($customer->customers_firstname.' '.$customer->customers_lastname); ?></td>
                                               <td><?php echo e($customer->email); ?></td>
                                               <td><?php echo e($customer->customers_telephone); ?></td>
                                               <td><?php echo e(round($customer->loyalty_points,0)); ?></td>
                                               <td>
                                                   <a href="<?php echo e(url('admin/debit/'.$customer->customers_id)); ?>" class="btn btn-sm btn-primary">Debit</a>
                                                   <a href="<?php echo e(url('admin/redeem/'.$customer->customers_id)); ?>" class="btn btn-sm btn-warning">Redeem</a>
                                                   <a href="<?php echo e(url('admin/transfer/'.$customer->customers_id)); ?>" class="btn btn-sm btn-info">Transfer</a>

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