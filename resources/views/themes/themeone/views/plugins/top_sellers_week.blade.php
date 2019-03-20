<h3 class="plugin-header">Top Selling this Week</h3>
@if($result['weeklySoldProducts']['success']==1)                
                   
            <ul class="plugin-item">  
                @foreach(array_slice($result['weeklySoldProducts']['product_data'], 0, 2) as $key=>$top_seller)
                @if($key<=7)
                <li>
                      <figure class="plugin-image">
                        <img class="img-fluid" src="{{asset('').$top_seller->products_image}}" alt="{{$top_seller->products_name}}">
                      </figure>
                      <div class="plugin-details">
                        <h2 class="title">{{$top_seller->products_name}}</h2>
                        <span class="category">Category:</span> <span class="category-item">	<?=stripslashes($top_seller->categories_name)?></span>
                        <span class="category">Price:</span> <span class="plugin-price">
                        	@if(!empty($top_seller->discount_price))                        
                          	{{$web_setting[19]->value}} {{$top_seller->discount_price+0}}                           
                          	<span> {{$web_setting[19]->value}} {{$top_seller->products_price+0}}</span>                          
                          	@else
                          		{{$web_setting[19]->value}} {{$top_seller->products_price+0}} 
                          
                          	@endif 
                        </span>
                        <div class="buttons">
                        	@if(!in_array($top_seller->products_id,$result['cartArray']))

                                <button  class="btn btn-block btn-primary cart" products_id="{{$top_seller->products_id}}">@lang('website.Add to Cart')</button>

                            @else
                                <button  class="btn btn-block btn-primary active">@lang('website.Added')</button>
                            @endif
                        </div>
                    </div>
                  </li>
                  @endif 
                    
                  @endforeach
            </ul>
           
            
            @endif