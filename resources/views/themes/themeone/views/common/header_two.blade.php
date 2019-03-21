<header id="header-area" class="header-area">
	<div id="header-mini">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container">
            <a class="navbar-brand" href="{{ URL::to('/')}}">ChupaChap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav category-menus mr-auto">
                @foreach($result['commonContent']['categories'] as $categories_data)
            <li class="nav-item">
              <a class="nav-link" href="{{ URL::to('/shop')}}?category={{$categories_data->slug}}">{{$categories_data->name}}  <span class="sr-only">(current)</span></a>
            </li>
            @endforeach
          </ul>

          <ul class="navbar-nav accounts my-2 my-lg-0">

                @if (Auth::guard('customer')->check())
                    <li class="nav-item">
                        <div class="nav-link">
                            <span class="p-pic"><img src="{{asset('').auth()->guard('customer')->user()->customers_picture}}" alt="image"></span>@lang('website.Welcome')&nbsp;{{ auth()->guard('customer')->user()->customers_firstname }}&nbsp;{{ auth()->guard('customer')->user()->customers_lastname }}!
                        </div>
                    </li>
                    <li class="nav-item"> <a href="{{ URL::to('/profile')}}" class="nav-link -before">@lang('website.Profile')</a> </li>
                    <li class="nav-item"> <a href="{{ URL::to('/wishlist')}}" class="nav-link -before">@lang('website.Wishlist')</a> </li>
                    <li class="nav-item"> <a href="{{ URL::to('/orders')}}" class="nav-link -before">@lang('website.Orders')</a> </li>

                    <li class="nav-item"> <a href="{{ URL::to('/shipping-address')}}" class="nav-link -before">@lang('website.Shipping Address')</a> </li>
                    <li class="nav-item"> <a href="{{ URL::to('/logout')}}" class="nav-link -before">@lang('website.Logout')</a> </li>
                @else

                    <li class="nav-item"> <a href="{{ URL::to('/login')}}" class="nav-link -before"> <span uk-icon="users"></span>&nbsp;Account</a> </li>
                @endif

                <li class="cart-header dropdown nav-item head-cart-content" id="shopping_button">
                    @include('cartButton')
                </li>
                <li class="wishlist-header">
                    <a href="{{ URL::to('/wishlist')}}">
                        <span class="badge badge-secondary" id="wishlist-count">{{$result['commonContent']['totalWishList']}}</span>
                        <!--<img class="img-fluid" src="{{asset('').'public/images/wishlist_bag.png'}}" alt="icon">-->

                        <span uk-icon="thumbnails"></span>

                    </a>
                </li>

            </ul>
        </div>
       </div>
      </nav>

     {{--<div class="header-maxi">--}}
        {{--<div class="container">--}}
            {{--<div class="row align-items-center">--}}

                  {{--<div class="col-12 col-sm-7 col-md-8 col-lg-6 px-0">--}}
                    {{--<form class="form-inline" action="{{ URL::to('/shop')}}" method="get">--}}
                    {{--<div class="search-categories">--}}
                    {{--<select id="category_id" name="category">--}}
                    {{--<option value="all">@lang('website.All Categories')</option>--}}
                        {{--@foreach($result['commonContent']['categories'] as $categories_data)--}}
                        	{{--<option value="{{$categories_data->slug}}" @if($categories_data->slug==app('request')->input('category')) selected @endif>{{$categories_data->name}}</option>--}}
                            {{--@if(count($categories_data->sub_categories)>0)--}}
                                {{--@foreach($categories_data->sub_categories as $sub_categories_data)--}}
                                {{--<option value="{{$sub_categories_data->sub_slug}}" @if($sub_categories_data->sub_slug==app('request')->input('category')) selected @endif>--{{$sub_categories_data->sub_name}}</option>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--<input type="search"  name="search" placeholder="@lang('website.Search entire store here')..." value="{{ app('request')->input('search') }}" aria-label="Search">--}}
                    {{--<button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}


             {{--</div>--}}
        {{--</div>--}}
    {{--</div> --}}


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
                            @foreach($result['commonContent']['categories'] as $categories_data)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL::to('/shop')}}?category={{$categories_data->slug}}">{{$categories_data->name}}  <span class="sr-only">(current)</span></a>
                                </li>
                            @endforeach
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
