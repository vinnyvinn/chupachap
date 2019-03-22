<?php $qunatity=0; ?>                
                <?php $__currentLoopData = $result['commonContent']['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a href="#" class="menu-item-link" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="menu-item-icon border-left border-right">
                        <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                    </div>
                    <div class="menu-item-label">
                        <?php if(count($result['commonContent']['cart'])>0): ?>
                        
                        <span class=""><?php echo e(count($result['commonContent']['cart'])); ?>&nbsp;<?php echo app('translator')->getFromJson('website.items'); ?></span> 
                        <?php else: ?> Basket (0)
                        <?php endif; ?>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-cart" aria-labelledby="dropdownMenuLink">
                <?php if(count($result['commonContent']['cart'])>0): ?>
                        <ul class="m-0 py-0 px-2" >
                                <?php
                                    $total_amount=0;
                                    $qunatity=0;
                                ?>
                                <?php $__currentLoopData = $result['commonContent']['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <?php 
                                $total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
                                $qunatity 	  += $cart_data->customers_basket_quantity; ?>

                                <li class="mb-2"> 
                                    <div class="d-flex justify-content-between border-bottom pb-2">
                                        <div class="cart-img-thumb">
                                            <img src="<?php echo e(asset('').$cart_data->image); ?>" alt="<?php echo e($cart_data->products_name); ?>"/>
                                        </div>

                                        <div>
                                            <h5 class="item-name mb-1 cart-item-color"><?php echo e($cart_data->products_name); ?></h5>
                                            <span class="text-muted"><?php echo app('translator')->getFromJson('website.Qty'); ?>&nbsp;:&nbsp;<?php echo e($cart_data->customers_basket_quantity); ?></span>
                                            <span class="cart-item-color"> <?php echo e($web_setting[19]->value); ?> <?php echo e($cart_data->final_price*$cart_data->customers_basket_quantity); ?></span>
                                        </div>

                                        <div>
                                                <a href="javascript:void(0)" class="delete-cart-product" onClick="delete_cart_product(<?php echo e($cart_data->customers_basket_id); ?>)" data-toggle="tooltip" data-placement="right" title="remove this item from Cart">
                                                    <i class="fa fa-trash" aria-hidden="true"></i></span>
                                                </a>
                                        </div>

                                    </div>
                                   </li>                                   

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </ul>
                            <div class="tt-summary">
                                    <p class="mb-2"><?php echo app('translator')->getFromJson('website.items'); ?>: <span><?php echo e($qunatity); ?></span></p>
                                    <p class="mb-2 mt-0"><?php echo app('translator')->getFromJson('website.SubTotal'); ?>: <span><?php echo e($web_setting[19]->value); ?> <?php echo e($total_amount); ?></span></p>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-primary btn-lg" href="<?php echo e(URL::to('/viewcart')); ?>"><?php echo app('translator')->getFromJson('website.View Cart'); ?></a>
                                    <a class="btn btn-danger btn-lg" href="<?php echo e(URL::to('/checkout')); ?>"><?php echo app('translator')->getFromJson('website.Checkout'); ?></a>
                                </div>
                
                <?php else: ?>
                        <ul class="shopping-cart-items">
                            <li><?php echo app('translator')->getFromJson('website.You have no items in your shopping cart'); ?></li>
                        </ul>
                <?php endif; ?>
            </div>
                