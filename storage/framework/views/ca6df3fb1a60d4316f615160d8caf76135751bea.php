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

		
        	<?php echo $__env->make('common.header_two', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if(Request::path() == 'index' or Request::path() == '/'): ?>
            <section class="carousel-content" style="margin:15px 0">
              <div class="container">
                <div class="row">
                 <div class="col-3">
                  <?php echo $__env->make('plugins.top_sellers', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 </div>
                 <div class="col-6 p-0"> <?php echo $__env->make('common.carousel', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
                 <div class="col-3">
                    <?php echo $__env->make('plugins.top_sellers_week', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 </div>
                </div>
              </div>
            </section>
            <?php endif; ?>
           
            <!-- ./end of header -->



	<?php echo $__env->yieldContent('content'); ?>



    <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- all js scripts including custom js -->


	<?php echo $__env->make('common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php if(!empty($result['commonContent']['setting'][77]->value)): ?>
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    <?php endif; ?>





</body>

</html>

