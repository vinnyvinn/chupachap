<div class="container">
  
    
    <div class="group-banners">
    	<div class="row">
        	<div class="col-xs-12 col-md-12">
            	<div class="banner-image en">
                    <a title="Banner Image" href="#"><img class="img-fluid" src="<?php echo e(asset('').'images/sale_banners_en.jpg'); ?>" alt="Banner Image" style="
                        width: 1600px;
                    "></a>
                </div>
             
            </div>
        </div>
    </div>
  </div>





<div class="container-fuild">
  <div class="container">
    <div class="products-area"> 
      <!-- heading -->
      <div class="heading">
        <h2><?php echo app('translator')->getFromJson('website.Newest Products'); ?> <small class="pull-right"><a href="<?php echo e(URL::to('/shop')); ?>" ><?php echo app('translator')->getFromJson('website.View All'); ?></a></small></h2>
        <hr>
      </div>
        <div class="row"> 
            <div class="col-xs-12 col-sm-12">
                <div class="row">
                    <!-- Items -->
                    <div class="products products-5x">
                        <!-- Product --> 
                        <?php if($result['products']['success']==1): ?>              
                        <?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product">
                          <article>
                            <div class="thumb"> <img class="img-fluid" src="<?php echo e(asset('').$products->products_image); ?>" alt="<?php echo e($products->products_name); ?>"> </div>
                            <?php
        
                                    $current_date = date("Y-m-d", strtotime("now"));
        
                                    
        
                                    $string = substr($products->products_date_added, 0, strpos($products->products_date_added, ' '));
        
                                    $date=date_create($string);
        
                                    date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
                                    $after_date = date_format($date,"Y-m-d");
        
                                    
        
                                    if($after_date>=$current_date){
        
                                        print '<span class="new-tag">';
        
                                        print __('website.New');
        
                                        print '</span>';
        
                                    }
        
                                    
        
                                    if(!empty($products->discount_price)){
        
                                        $discount_price = $products->discount_price;	
        
                                        $orignal_price = $products->products_price;	
        
                                        
        
                                        $discounted_price = $orignal_price-$discount_price;
        
                                        $discount_percentage = $discounted_price/$orignal_price*100;
        
                                        echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
        
                                    }
        
                                     
        
                            ?>
                            <span class="tag text-center">
                            <?=stripslashes($products->categories_name)?>
                            </span>
                            <h2 class="title text-center"><?php echo e($products->products_name); ?></h2>
                            <div class="price text-center"> <?php if(!empty($products->discount_price)): ?>
                              
                              <?php echo e($web_setting[19]->value); ?> <?php echo e($products->discount_price+0); ?> <span> <?php echo e($web_setting[19]->value); ?> <?php echo e($products->products_price+0); ?></span> <?php else: ?>
                              
                              <?php echo e($web_setting[19]->value); ?> <?php echo e($products->products_price+0); ?>

                              
                              <?php endif; ?>
                              </div>
                            <div class="product-hover">
                                <div class="icons">
                                    <div class="icon-liked">
                                        <span products_id = '<?php echo e($products->products_id); ?>' class="fa <?php if($products->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($products->products_liked); ?></span></span>
                                    </div>
                                    
                                    <a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="fa fa-eye"></a>
                                </div>
                                
                                <div class="buttons">
                                	<?php if(!in_array($products->products_id,$result['cartArray'])): ?>
                                
                                        <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($products->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
                                        
                                    <?php else: ?>
                                        <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                                    <?php endif; ?>
                                </div>                                
                             </div>
                            </article>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
  </div>
</div>


