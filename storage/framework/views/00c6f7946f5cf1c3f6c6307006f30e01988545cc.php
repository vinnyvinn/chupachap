<header id="header-area" class="header-area">
	<div id="header-mini">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container">
            <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">ChupaChap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav category-menus mr-auto">
                <?php $__currentLoopData = $result['commonContent']['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(URL::to('/shop')); ?>?category=<?php echo e($categories_data->slug); ?>"><?php echo e($categories_data->name); ?>  <span class="sr-only">(current)</span></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>

          <ul class="navbar-nav accounts my-2 my-lg-0">

                <?php if(Auth::guard('customer')->check()): ?>
                    <li class="nav-item">
                        <div class="nav-link">
                            <span class="p-pic"><img src="<?php echo e(asset('').auth()->guard('customer')->user()->customers_picture); ?>" alt="image"></span><?php echo app('translator')->getFromJson('website.Welcome'); ?>&nbsp;<?php echo e(auth()->guard('customer')->user()->customers_firstname); ?>&nbsp;<?php echo e(auth()->guard('customer')->user()->customers_lastname); ?>!
                        </div>
                    </li>
                    <li class="nav-item"> <a href="<?php echo e(URL::to('/profile')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Profile'); ?></a> </li>
                    <li class="nav-item"> <a href="<?php echo e(URL::to('/wishlist')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Wishlist'); ?></a> </li>
                    <li class="nav-item"> <a href="<?php echo e(URL::to('/orders')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Orders'); ?></a> </li>

                    <li class="nav-item"> <a href="<?php echo e(URL::to('/shipping-address')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Shipping Address'); ?></a> </li>
                    <li class="nav-item"> <a href="<?php echo e(URL::to('/logout')); ?>" class="nav-link -before"><?php echo app('translator')->getFromJson('website.Logout'); ?></a> </li>
                <?php else: ?>

                    <li class="nav-item"> <a href="<?php echo e(URL::to('/login')); ?>" class="nav-link -before"> <span uk-icon="users"></span>&nbsp;Account</a> </li>
                <?php endif; ?>

                <li class="cart-header dropdown nav-item head-cart-content" id="shopping_button">
                    <?php echo $__env->make('cartButton', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </li>
                <li class="wishlist-header">
                    <a href="<?php echo e(URL::to('/wishlist')); ?>">
                        <span class="badge badge-secondary" id="wishlist-count"><?php echo e($result['commonContent']['totalWishList']); ?></span>
                        <!--<img class="img-fluid" src="<?php echo e(asset('').'public/images/wishlist_bag.png'); ?>" alt="icon">-->

                        <span uk-icon="thumbnails"></span>

                    </a>
                </li>

            </ul>
        </div>
       </div>
      </nav>

     
        
            

                  
                    
                    
                    
                    
                        
                        	
                            
                                
                                
                                
                            
                        
                    
                    
                    
                    
                    
                


             
        
    


</header>
<br>
<div class="mini-header">
    <header id="header-area" class="header-area">
        <div id="header-mini2">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav category-menus mr-auto">
                            <?php $__currentLoopData = $result['commonContent']['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(URL::to('/shop')); ?>?category=<?php echo e($categories_data->slug); ?>"><?php echo e($categories_data->name); ?>  <span class="sr-only">(current)</span></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <ul class="navbar-nav accounts my-2 my-lg-0">

                </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>

<style>
    .mini-header{
        background-color: #E7E7E7;
        height: 75px;

    }
</style>
