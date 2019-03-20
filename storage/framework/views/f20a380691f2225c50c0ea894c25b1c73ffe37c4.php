<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Initialize Bulk SMS </h1>
            <ol class="breadcrumb">

                <li class="active">Initialize Bulk SMS</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Send Message To multiple customers</h3>
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
                                            <form action="<?php echo e(url('admin/send-sms')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group">
                                                    <input type="checkbox" id="existing-customers"><label for="">New customers ?</label>
                                                </div>

                                                <div class="co-sm-6 offset-md-3 old_customers">
                                                    <div class="form-group">
                                                        <label for="">Select Phone number(s) </label>
                                                        <select name="phone_no[]" id="phone_no" class="form-control select2" multiple="multiple">
                                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <option value="<?php echo e($customer->customers_id); ?>"><?php echo e($customer->customers_firstname.' '.$customer->customers_lastname); ?></option>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>

                                                        
                                                    </div>
                                                </div>
                                                <div class="co-sm-6 offset-md-3 new_customers">
                                                <div class="form-group">
                                                    <label for="">Phone number(s)</label>
                                                    <textarea name="phone" id="" cols="10" rows="5" placeholder="Enter phone number(s) in a commar separated format" class="form-control"></textarea>

                                                </div>
                                                </div>
                                                <div class="co-sm-6 offset-md-3">
                                                    <div class="form-group">
                                                        <label for="">Message</label>
                                                        <textarea name="message" id="" cols="10" rows="5" placeholder="Type Message here..." class="form-control"></textarea>

                                                    </div>
                                                </div>



                                            <div class="box-footer text-center">
                                                <button type="submit" class="btn btn-primary">Send SMS</button>
                                                <a href="<?php echo e(URL::to('admin/send-sms')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
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