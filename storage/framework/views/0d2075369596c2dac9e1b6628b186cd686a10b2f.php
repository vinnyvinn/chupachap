<h3 class="plugin-header">Top Selling this Week</h3>
<?php if($result['weeklySoldProducts']['success']==1): ?>                
                   
            <ul class="plugin-item">  
                <?php $__currentLoopData = array_slice($result['weeklySoldProducts']['product_data'], 0, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$top_seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key<=7): ?>
                <li>
                      <figure class="plugin-image">
                        <img class="img-fluid" src="<?php echo e(asset('').$top_seller->products_image); ?>" alt="<?php echo e($top_seller->products_name); ?>">
                      </figure>
                      <div class="plugin-details">
                        <h2 class="title"><?php echo e($top_seller->products_name); ?></h2>
                        <span class="category">Category:</span> <span class="category-item">	<?=stripslashes($top_seller->categories_name)?></span>
                        <span class="category">Price:</span> <span class="plugin-price">
                        	<?php if(!empty($top_seller->discount_price)): ?>                        
                          	<?php echo e($web_setting[19]->value); ?> <?php echo e($top_seller->discount_price+0); ?>                           
                          	<span> <?php echo e($web_setting[19]->value); ?> <?php echo e($top_seller->products_price+0); ?></span>                          
                          	<?php else: ?>
                          		<?php echo e($web_setting[19]->value); ?> <?php echo e($top_seller->products_price+0); ?> 
                          
                          	<?php endif; ?> 
                        </span>
                        <div class="buttons">
                        	<?php if(!in_array($top_seller->products_id,$result['cartArray'])): ?>

                                <button  class="btn btn-block btn-primary cart" products_id="<?php echo e($top_seller->products_id); ?>"><?php echo app('translator')->getFromJson('website.Add to Cart'); ?></button>

                            <?php else: ?>
                                <button  class="btn btn-block btn-primary active"><?php echo app('translator')->getFromJson('website.Added'); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                  </li>
                  <?php endif; ?> 
                    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
           
            
            <?php endif; ?>