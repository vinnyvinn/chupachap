<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

<?php echo $__env->make('common.meta', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- ./end of meta -->

<!--dir="rtl"-->
<?php if(Request::path() == 'index' or Request::path() == '/'): ?>
<body class="home">
<?php else: ?>
<body>
<?php endif; ?>
	<!-- header -->

    
          <?php echo $__env->make('common.header_five', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        	
        	
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>


            <div class="container mt-3">
              <div class="row">
                <div class="col-sm-3">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
                <div class="col-sm-6"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" /></a></div>
                <div class="col-sm-3">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
              </div>
            </div>
            <?php endif; ?>  
            <!-- ./end of image banners -->



	<?php echo $__env->yieldContent('content'); ?>



    <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- all js scripts including custom js -->


	<?php echo $__env->make('common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php if(!empty($result['commonContent']['setting'][77]->value)): ?>
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    <?php endif; ?>





</body>

</html>

