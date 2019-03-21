<header id="header-area" class="header-area">
        <div id="header-mini">
    
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <div class="row" style="width:100%">
                        <div class="row" style="width:100%;">
                            <div class="col-sm-12 col-md-4 offset-md-4 text-center">
                                <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">
                                    
                                    <img src="<?php echo e(asset('images/chupa_logo.jpg')); ?>"/>
                                </a>
                            </div>

                            <div class="col-sm-12 col-md-4">

                                    <div class="menu-items-container">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-3 text-center m-0 p-0">
                                                            <a href="" class="menu-item-link">
                                                                    <div class="menu-item-icon border-left"><i class="fa fa-truck fa-lg" aria-hidden="true"></i></div>
                                                                    <div class="menu-item-label">Delivery</div>
                                                            </a>
                                                    </div>
                                                    <div class="col-3 text-center m-0 p-0">
                                                            <a href="<?php echo e(URL::to('/login')); ?>" class="menu-item-link">
                                                                <div class="menu-item-icon border-left"><i class="fa fa-user fa-lg" aria-hidden="true"></i></div>
                                                                <div class="menu-item-label">Account</div>
                                                            </a>
                                                    </div>
                                                    <div class="col-3 text-center m-0 p-0">
                                                            <a href="" class="menu-item-link">
                                                                <div class="menu-item-icon border-left"><i class="fa fa-flag fa-lg" aria-hidden="true"></i></div>
                                                                <div class="menu-item-label">Currency</div>
                                                            </a>
                                                    </div>
                                                    <div class="col-3">
                                                            <button  class="cart-header menu-item-link dropdown nav-item head-cart-content" id="shopping_button">
                                                                    <?php echo $__env->make('cartButtonThree', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <ul class="navbar-nav accounts my-2 my-lg-0">
                                            <li class="cart-header dropdown nav-item head-cart-content" id="shopping_button">
                                                <?php echo $__env->make('cartButtonThree', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </li>                                          
                                        </ul> 
                                    </div>

                </div>              
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
    