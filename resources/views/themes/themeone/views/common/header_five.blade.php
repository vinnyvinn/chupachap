<header id="header-area" class="header-area">
	<div id="header-mini">





            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerChupaChap" aria-controls="navbarTogglerChupaChap
                    ChupaChap" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerChupaChap">
                      <a class="navbar-brand" href="#">
                          <img src="https://www.thewhiskyexchange.com/media/rtwe/assets/application/images/logos/logo-flat.svg" alt="ChupaChap Logo"/>
                      </a>
                     
                      <div class="menu-items ml-auto">

                        <div class="d-flex flex-column">
                            <div class="">
                                <div class="row">
                                    <div class="col-3 text-center border-right border-left">
                                        <a href="">
                                            <span><i class="fa fa-truck fa-2x" aria-hidden="true"></i></span>
                                            <span>Delivery</span>
                                        </a>
                                    </div>
                                    <div class="col-3 text-center border-right">
                                            <a href="">
                                                    <span><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                                                    <span>Account</span>
                                                </a>
                                    </div>
                                    <div class="col-3 text-center border-right">
                                            <a href="">
                                                    <span><i class="fa fa-shopping-basket fa-2x" aria-hidden="true"></i></span>
                                                    <span>Currency</span>
                                                </a>
                                    </div>
                                    <div class="col-3 text-center border-right border-left">
                                            <a href="">
                                                    <span><i class="fa fa-truck fa-2x" aria-hidden="true"></i></span>
                                                    <span>Basket</span>
                                                </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <form class="my-2 my-lg-0">
                                        <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search this blog">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                          
                      </div>
                    </div>
                  </nav>




<hr />



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
