<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

<?php echo $__env->make('common.meta', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- ./end of meta -->

<style>

/* body{
  background-image:url("<?php echo e(asset('images/backgrounds/whiter_brick.jpg')); ?>")
} */
  
</style>

<!--dir="rtl"-->
<?php if(Request::path() == 'index' or Request::path() == '/'): ?>
<body class="home">
<?php else: ?>
<body>
<?php endif; ?>
	<!-- header -->

  <div class="container-bg">
    
          
          <?php echo $__env->make('common.header_five', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          
        	
        	
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>

<div class="main-wrapper">
            <div class="container">
              <div class="row pt-4">
                <div class="col-sm-3 col-md-3 d-none d-md-block">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
                <div class="col-sm-12 col-md-6"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" /></a></div>
                <div class="col-sm-3 col-md-3 d-sm-none d-none d-md-block">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
              </div>
            </div>
            <?php endif; ?>  
            <!-- ./end of image banners -->



	<?php echo $__env->yieldContent('content'); ?>

</div>

    <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- all js scripts including custom js -->

  </div>

	<?php echo $__env->make('common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php if(!empty($result['commonContent']['setting'][77]->value)): ?>
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    <?php endif; ?>





</body>

</html>

