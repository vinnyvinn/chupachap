<div class="sidebar">
    <div class="widget block-categories">
        <div class="block-title">
            <h2><?php echo app('translator')->getFromJson('website.My Account'); ?></h2>
        </div>
        <div class="block-content">
            <ul class="list-categories">
                <li>
                    <a href="<?php echo e(URL::to('/profile')); ?>"><?php echo app('translator')->getFromJson('website.Profile'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(URL::to('/wishlist')); ?>"><?php echo app('translator')->getFromJson('website.Wishlist'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(URL::to('/orders')); ?>"><?php echo app('translator')->getFromJson('website.Orders'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(URL::to('/shipping-address')); ?>"><?php echo app('translator')->getFromJson('website.Shipping Address'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(URL::to('/logout')); ?>"><?php echo app('translator')->getFromJson('website.Logout'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="widget block-images">
    	<ul class="list-images en">
        	<li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_1_en.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_2_en.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_3_en.jpg'); ?>" alt="image"></a></li>
        </ul>
        
        <ul class="list-images ar">
        	<li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_1_ar.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_2_ar.jpg'); ?>" alt="image"></a></li>
            <li><a href="<?php echo e(URL::to('/shop')); ?>"><img src="<?php echo e(asset('').'images/banner_3_ar.jpg'); ?>" alt="image"></a></li>
        </ul>
    </div>
</div>