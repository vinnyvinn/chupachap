<?php $qunatity=0; ?>                
                @foreach($result['commonContent']['cart'] as $cart_data)                
                	<?php $qunatity += $cart_data->customers_basket_quantity; ?>                    
                @endforeach

                <a href="#" class="menu-item-link" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="menu-item-icon border-left border-right">
                        <i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i>
                    </div>
                    <div class="menu-item-label">
                        @if(count($result['commonContent']['cart'])>0)
                        {{-- <span class="items">{{ count($result['commonContent']['cart']) }}&nbsp;@lang('website.items')</span>  --}}
                        <span class="">{{ count($result['commonContent']['cart']) }}&nbsp;@lang('website.items')</span> 
                        @else Basket
                        @endif
                    </div>
                </a>

                <div class="dropdown-menu dropdown-cart" aria-labelledby="dropdownMenuLink">
                @if(count($result['commonContent']['cart'])>0)
                        <ul class="m-0 py-0 px-2" >
                                <?php
                                    $total_amount=0;
                                    $qunatity=0;
                                ?>
                                @foreach($result['commonContent']['cart'] as $cart_data)
                            
                                <?php 
                                $total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
                                $qunatity 	  += $cart_data->customers_basket_quantity; ?>

                                <li class="mb-2"> 
                                    <div class="d-flex justify-content-between border-bottom pb-2">
                                        <div class="cart-img-thumb">
                                            <img src="{{asset('').$cart_data->image}}" alt="{{$cart_data->products_name}}"/>
                                        </div>

                                        <div>
                                            <h5 class="item-name mb-1 cart-item-color">{{$cart_data->products_name}}</h5>
                                            <span class="text-muted">@lang('website.Qty')&nbsp;:&nbsp;{{$cart_data->customers_basket_quantity}}</span>
                                            <span class="cart-item-color"> {{$web_setting[19]->value}} {{$cart_data->final_price*$cart_data->customers_basket_quantity}}</span>
                                        </div>

                                        <div>
                                                <a href="javascript:void(0)" class="delete-cart-product" onClick="delete_cart_product({{$cart_data->customers_basket_id}})" data-toggle="tooltip" data-placement="right" title="remove this item from Cart">
                                                    <i class="fa fa-trash" aria-hidden="true"></i></span>
                                                </a>
                                        </div>

                                    </div>
                                   </li>                                   

                                @endforeach                       
                            </ul>
                            <div class="tt-summary">
                                    <p class="mb-2">@lang('website.items'): <span>{{ $qunatity }}</span></p>
                                    <p class="mb-2 mt-0">@lang('website.SubTotal'): <span>{{$web_setting[19]->value}} {{ $total_amount }}</span></p>
                                </div>
                                <div class="d-flex justify-content-around">
                                    <a class="btn btn-primary btn-lg" href="{{ URL::to('/viewcart')}}">@lang('website.View Cart')</a>
                                    <a class="btn btn-danger btn-lg" href="{{ URL::to('/checkout')}}">@lang('website.Checkout')</a>
                                </div>
                
                @else
                        <ul class="shopping-cart-items">
                            <li>@lang('website.You have no items in your shopping cart')</li>
                        </ul>
                @endif
            </div>
                