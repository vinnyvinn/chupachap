<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
        <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1> <?php echo e(trans('labels.Addusers')); ?> <small><?php echo e(trans('labels.Addusers')); ?>...</small> </h1>
        <ol class="breadcrumb">
           <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
          <li><a href="<?php echo e(URL::to('admin/listingusers')); ?>"><i class="fa fa-bars"></i> <?php echo e(trans('labels.ListAllusers')); ?></a></li>
          <li class="active"><?php echo e(trans('labels.users')); ?></li>
        </ol>
      </section>
      <section class="content"> 
            <!-- Info boxes --> 
            
            <!-- /.row -->
        
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"><?php echo e(trans('labels.users')); ?> </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Users</button>
                    </div>
                  </div>
                  
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-12">
                              <div class="box box-info">
    <table class="table table-striped">
        <thead class="thead-ligh">
            <th>id</th>
            <th>Full Name</th>
            <th>Roles</th>
        </thead>
        <tbody>
            <?php if($allusers): ?>
            <?php $__currentLoopData = $allusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->roles->name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td>Sorry no Users</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
                      </div>
                    </div></div></div></div></div></section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('users.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role" class="col-md-4 control-label">Assign Roles</label>
                    <div class="col-md-6">
                    <select class="form-control" name="role_id" id="">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">add User</button>
        </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>