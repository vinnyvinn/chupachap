@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.Orders') }} <small>{{ trans('labels.orderforcustomer') }}...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active">{{ trans('labels.orderforcustomer') }}</li>
    </ol>
  </section>
  
  <div class="shop-area">

        <form method="get" enctype="multipart/form-data" id="load_products_form">
           @if(!empty(app('request')->input('search')))
            <input type="hidden"  name="search" value="{{ app('request')->input('search') }}">
           @endif
           @if(!empty(app('request')->input('category')))
            <input type="hidden"  name="category" value="@if(app('request')->input('category')!='all'){{ app('request')->input('category') }} @endif">
           @endif
            <input type="hidden"  name="load_products" value="1">
         <div class="row">
                            
                       <div class="col-md-12">
                           <div class="box">
                        <div class="box-header"></div>
                        <div class="box-body">
                        <div class="row">
                        <div class="col-xs-12">
                             @if(!empty(app('request')->input('search')))
                            <div class="search-result">
                                <h4>@lang('website.Search result for') '{{app('request')->input('search')}}' @if($result['products']['total_record']>0) {{$result['products']['total_record']}} @else 0 @endif @lang('website.item found') <h4>
                            </div>
                        @endif
                        
                         @if($result['products']['total_record']>0)

                           
                            <div class="products products-3x" id="listing-products">
                                @if($result['products']['success']==1)
                                @foreach($result['products']['product_data'] as $key=>$products)

                                <div class="product">
                                    <article>
                                        <div class="thumb"><img class="img-fluid" src="{{asset('').$products->products_image}}" alt="{{$products->products_name}}"></div>
                                        <?php
                                            $current_date = date("Y-m-d", strtotime("now"));
                                            $string = substr($products->products_date_added, 0, strpos($products->products_date_added, ' '));
                                            $date=date_create($string);
                                            date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
                                            $after_date = date_format($date,"Y-m-d");
                                            if($after_date>=$current_date){
                                                print '<span class="new-tag">New</span>';
                                            }
                                            if(!empty($products->discount_price)){
                                                $discount_price = $products->discount_price;
                                                $orignal_price = $products->products_price;

                                                $discounted_price = $orignal_price-$discount_price;
                                                $discount_percentage = $discounted_price/$orignal_price*100;
                                                echo "<span class='discount-tag'>".(int)$discount_percentage."%</span>";
                                            }
                                        ?>
                                        <div class="block-panel">
                                            <span class="tag">

                                                <?=stripslashes($products->categories_name)?>
                                            </span>
                                            <h4 class="title">{{$products->products_name}}</h4>
                                                                               
                                            <div class="block-inner">
                                                <div class="price">
                                                    @if(!empty($products->discount_price))
                                                        {{$web_setting[19]->value}}{{$products->discount_price+0}}
                                                        <span> {{$web_setting[19]->value}}{{$products->products_price+0}}</span>
                                                    @else
                                                        {{$web_setting[19]->value}}{{$products->products_price+0}}
                                                    @endif
                                                </div>
                                                
                                                <div class="buttons">
                                                    @if(!in_array($products->products_id,$result['cartArray']))
                                                        <button type="button" class="btn btn-secondary btn-round cart" products_id="{{$products->products_id}}">@lang('website.Add to Cart') to caefert</button>
                                                    @else
                                                        <button type="button"  class="btn btn-secondary btn-round acitve">@lang('website.Added')</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        {{--<h1>cart items</h1>--}}
                                        {{--{{dd($result['cartArray'])}}--}}
                                        <div class="product-hover">
                                           
                                            
                                            <div class="buttons">

                                                @if(!in_array($products->products_id,$result['cartArray']))
                                                    <button type="button" class="btn btn-block btn-secondary cart" products_id="{{$products->products_id}}">@lang('website.Add to Cart')</button>
                                                @else
                                                    <button type="button" class="btn btn-block btn-secondary active">@lang('website.Added')</button>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            
                            <div class="toolbar mt-3">
                                <div class="form-inline">
                                    <div class="form-group  justify-content-start col-6">
                                        <input id="record_limit" type="hidden" value="{{$result['limit']}}"> 
                                        <input id="total_record" type="hidden" value="{{$result['products']['total_record']}}"> 
                                        <label for="staticEmail" class="col-form-label"> @lang('website.Showing')<span class="showing_record">{{$result['limit']}} </span> &nbsp; @lang('website.of')  &nbsp;<span class="showing_total_record">{{$result['products']['total_record']}}</span> &nbsp;@lang('website.results')</label>                                            
                                    </div>
                                    <div class="form-group justify-content-end col-6">
                                        <input type="hidden" value="1" name="page_number" id="page_number">
                                        <?php
                                            if(!empty(app('request')->input('limit'))){
                                                $record = app('request')->input('limit');
                                            }else{
                                                $record = '15';
                                            }
                                        ?>
                                        <button class="btn btn-dark" type="button" id="load_products" 
                                        @if(count($result['products']['product_data']) < $record ) 
                                            style="display:none"
                                        @endif 
                                        >@lang('website.Load More')</button>

                                    </div>
                                </div>
                            </div>  
                            @elseif(empty(app('request')->input('search')))
                                <p>@lang('website.Record not found')</p>
                            @endif  
                        </div>
                        </div>    
                        </div>       
                        </div>     
                    </div>                             
                        </div>
                    
            
                                
       
        </form>
    </div>
</div>
@endsection 
