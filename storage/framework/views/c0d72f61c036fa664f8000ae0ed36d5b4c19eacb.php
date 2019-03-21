<?php $__env->startSection('content'); ?>

<section class="site-content">
  <div class="container"> 

    <div class="mt-5">
    <h3 class="highlight-title"><span class="text-uppercase">our highlights</span></h3>
    <div class="row">
      <div class="col-sm-6 mb-3"><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1106_Horizontal.jpg?v=435375860301" /></div>
      <div class="col-sm-6 mb-3"><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1106_Horizontal.jpg?v=435375860301" /></div>
      <div class="col-sm-6 mb-3"><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1106_Horizontal.jpg?v=435375860301" /></div>
      <div class="col-sm-6 mb-3"><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1106_Horizontal.jpg?v=435375860301" /></div>
    </div>
  </div>

      <div class="mt-5">
          <h3 class="highlight-title"><span class="text-uppercase">discover more</span></h3>
          <div class="row mb-3">
            <div class="col"><a href=""><span><i class="fa fa-glass fa-2x pr-2" aria-hidden="true"></i></span><span>and typesetting industry</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-tags fa-2x pr-2" aria-hidden="true"></i></span><span>scrambled it to make a type specimen book</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-gift fa-2x pr-2" aria-hidden="true"></i></span><span>Lorem Ipsum is not simply random text</span></a></div>
          </div>
          <div class="row mb-3">
            <div class="col"><a href=""><span><i class="fa fa-glass fa-2x pr-2" aria-hidden="true"></i></span><span>and typesetry</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-tags fa-2x pr-2" aria-hidden="true"></i></span><span>a type specimen book</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-gift fa-2x pr-2" aria-hidden="true"></i></span><span>Lorem Ipsumimply random text</span></a></div>
          </div>
          <div class="row mb-3">
            <div class="col"><a href=""><span><i class="fa fa-glass fa-2x pr-2" aria-hidden="true"></i></span><span>and tustry</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-tags fa-2x pr-2" aria-hidden="true"></i></span><span>type specimen book</span></a></div>
            <div class="col"><a href=""><span><i class="fa fa-gift fa-2x pr-2" aria-hidden="true"></i></span><span>Lorem  simply random text</span></a></div>
          </div>
      </div>

      <div class="mt-5 month-products">
          <h3 class="highlight-title"><span class="text-uppercase">Products of the month</span></h3>
          <div class="row">

            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-uppercase mb-0"><small>Lorem Ipsum is not simply random text</small></p>
                      <h5 class="text-uppercase m-0">consectetur from a Lorem Ipsum passage and going</h5>
                      
                    </div>
                </div> 
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-uppercase mb-0"><small>Lorem Ipsum is not simply random text</small></p>
                      <h5 class="text-uppercase m-0">consectetur from a Lorem Ipsum passage and going</h5>
                      
                    </div>
                </div> 
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-uppercase mb-0"><small>Lorem Ipsum is not simply random text</small></p>
                      <h5 class="text-uppercase m-0">consectetur from a Lorem Ipsum passage and going</h5>
                      
                    </div>
                </div> 
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <img class="card-img-top" src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-uppercase mb-0"><small>Lorem Ipsum is not simply random text</small></p>
                      <h5 class="text-uppercase m-0">consectetur from a Lorem Ipsum passage and going</h5>
                      
                    </div>
                </div> 
            </div>

          </div>
        </div>

        <div class="mt-5">
            <h3 class="highlight-title"><span class="text-uppercase">Trending now</span></h3>
            <div class="row">

                <?php if($result['top_seller']['success']==1): ?>
                <?php $__currentLoopData = $result['top_seller']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$top_seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key < 8 ): ?>

                <div class="col-md-3 col-sm-6 mb-3">

                    <div class="product">
                        <article>
                          
                             <div class="thumb"> <img class="img-fluid" src="<?php echo e(asset('').$top_seller->products_image); ?>" alt="<?php echo e($top_seller->products_name); ?>"></div>
                              <?php
                                      $current_date = date("Y-m-d", strtotime("now"));
                                      
                                      $string = substr($top_seller->products_date_added, 0, strpos($top_seller->products_date_added, ' '));
                                      $date=date_create($string);
                                      date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
                                      
                                      //echo $top_seller->products_date_added . "<br>";
                                      $after_date = date_format($date,"Y-m-d");
                                      
                                      if($after_date>=$current_date){
                                          print '<span class="new-tag">';
                                          print __('website.New');
                                          print '</span>';
                                      }
                                      
                                      if(!empty($top_seller->discount_price)){
                                          $discount_price = $top_seller->discount_price;	
                                          $orignal_price = $top_seller->products_price;	
                                          
                                          $discounted_price = $orignal_price-$discount_price;
                                          $discount_percentage = $discounted_price/$orignal_price*100;
                                          echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
                                      }
                                       
                              ?>
                              <span class="tag text-center">
                                <?=stripslashes($top_seller->categories_name)?>
                              </span>
                              <h2 class="title text-center"><?php echo e($top_seller->products_name); ?></h2>
                              <div class="price text-center">
                                <?php if(!empty($top_seller->discount_price)): ?>                        
                                  <?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->discount_price+0); ?>                           
                                  <span> <?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->products_price+0); ?></span>                          
                                  <?php else: ?>
                                    <?php echo e($web_setting[19]->value); ?><?php echo e($top_seller->products_price+0); ?> 
                                
                                  <?php endif; ?> 
                          </div>
                                
                           
                           <div class="product-hover">
                             <div class="icons">
                                <div class="icon-liked">
                                    
                                    <span products_id = '<?php echo e($top_seller->products_id); ?>' class="fa <?php if($top_seller->isLiked==1): ?> fa-heart <?php else: ?> fa-heart-o <?php endif; ?> is_liked"><span class="badge badge-secondary"><?php echo e($top_seller->products_liked); ?></span></span>
                                  </div>
                                  
                                  <a href="<?php echo e(URL::to('/product-detail/'.$top_seller->products_slug)); ?>" class="fa fa-eye"></a>
                              </div>
                              <div class="buttons">
                                <?php if(!in_array($top_seller->products_id,$result['cartArray'])): ?>
      
                                      <button  class="btn btn-block btn-secondary cart" products_id="<?php echo e($top_seller->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>
      
                                  <?php else: ?>
                                      <button  class="btn btn-block btn-secondary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                                  <?php endif; ?>
                              </div>
                           </div>
                          
                        </article>
                    </div>
                </div>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
            <div class="d-flex justify-content-center">
                    <a href="" class="btn btn-outline-secondary btn-lg text-uppercase">Load more <span class="ml-2"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
            </div>

        </div>
  </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>