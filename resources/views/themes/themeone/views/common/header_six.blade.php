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
                                <a class="navbar-brand" href="{{ URL::to('/')}}">
                                    {{-- <img src="https://www.thewhiskyexchange.com/media/rtwe/assets/application/images/logos/logo-flat.svg" alt="ChupaChap Logo"/> --}}
                                    <img src="{{ asset('images/chupa_logo.jpg') }}"/>
                                </a>
                            </div>{{-- logo end --}}

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
                                                            <a href="{{ URL::to('/login')}}" class="menu-item-link">
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
                                                                    @include('cartButtonThree')
                                                            </button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <ul class="navbar-nav accounts my-2 my-lg-0">
                                            <li class="cart-header dropdown nav-item head-cart-content" id="shopping_button">
                                                @include('cartButtonThree')
                                            </li>                                          
                                        </ul> 
                                    </div>{{-- menu items end --}}

                </div>{{-- row end --}}              
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
    