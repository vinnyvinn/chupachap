<?php $qunatity=0; ?>                
                @foreach($result['commonContent']['cart'] as $cart_data)                
                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>                    
                @endforeach
                
                <a href="#" id="dropdownMenuButton" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <span class="badge count">{{ $qunatity }}</span>
                   
                    <span uk-icon="cart"></span>
                    <!--<img class="img-fluid" src="{{asset('').'public/images/shopping_cart.png'}}" alt="icon">-->
                    
                    <span class="block">
                    	                  
                        @if(count($result['commonContent']['cart'])>0)                        
                            <span class="items">{{ count($result['commonContent']['cart']) }}&nbsp;@lang('website.items')</span>
                        @else 
                            <span class="items">(0)&nbsp;@lang('website.item')</span>
                        @endif 
                    </span>
                </a>
            
                @if(count($result['commonContent']['cart'])>0)
                
                <div class="shopping-cart" style="pointer-events:auto !important;" aria-labelledby="dropdownMenuButton">
                
                    <ul class="shopping-cart-items products_list" >
                        <?php
                            $total_amount=0;
                            $qunatity=0;
                        ?>
                        @foreach($result['commonContent']['cart'] as $cart_data)
                    
                        <?php 
						$total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
						$qunatity 	  += $cart_data->customers_basket_quantity; ?>
                        <li>
                        		
                            <div class="item-thumb">
                               
                            	<div class="image">
                                    <img class="img-fluid" src="{{asset('').$cart_data->image}}" alt="{{$cart_data->products_name}}"/>
                                    
                                </div>
                            </div>
                            <div class="description">
                                    <h4 class="item-name">{{$cart_data->products_name}}</h4>
                                    <span class="item-quantity">@lang('website.Qty')&nbsp;:&nbsp;{{$cart_data->customers_basket_quantity}}</span>
                                    <span class="item-price"> {{$web_setting[19]->value}} {{$cart_data->final_price*$cart_data->customers_basket_quantity}}</span>
                               
                            </div>
                            <a href="javascript:void(0)" class="icon" onClick="delete_cart_product({{$cart_data->customers_basket_id}})" data-toggle="tooltip" data-placement="right" title="remove this item from Cart">
                                    <span uk-icon="close"></span>
                                   
                                </a>
                           </li>
                        @endforeach                       
                    </ul>
                    <div class="tt-summary">
                    	<p>@lang('website.items'): <span>{{ $qunatity }}</span></p>
                      	<p>@lang('website.SubTotal'): <span>{{$web_setting[19]->value}} {{ $total_amount }}</span></p>
                    </div>
                    <div class="buttons">
                        <a class="btn btn-primary" href="{{ URL::to('/viewcart')}}">@lang('website.View Cart')</a>
                        <a class="btn btn-danger" href="{{ URL::to('/checkout')}}">@lang('website.Checkout')</a>
                    </div>
                </div>
                
				@else
                    
                <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <ul class="shopping-cart-items">
                        <li>@lang('website.You have no items in your shopping cart')</li>
                    </ul>
                </div>
                @endif