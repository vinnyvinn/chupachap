<header id="header-area" class="header-area">
	<div id="header-mini">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                {{-- logo on mobile devices --}}
                <div class="small-logo"><a class="navbar-brand" href="{{ URL::to('/')}}">
                    <img src="{{ asset('images/chupa_logo.jpg') }}" alt="logo"/>
                </a></div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerChupaChap" aria-controls="navbarTogglerChupaChap
                    ChupaChap" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerChupaChap">

                        <div class="row" style="width:100%;">
                            <div class="col-sm-12 col-md-4 offset-md-4 text-center d-none d-md-block">
                                <a class="navbar-brand" href="{{ URL::to('/')}}">
                                    <img src="{{ asset('images/chupa_logo.jpg') }}" alt="logo"/>
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
                                                    <div class="col-3 text-center m-0 p-0 dropleft head-cart-content">
                                                            @include('cartButton')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-form-container mt-4 w-100">
                                                <form class="my-2 my-lg-0">
                                                        <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Search">
                                                                <div class="input-group-append">
                                                                    <button class="btn menu-search-button" type="submit">
                                                                    <i class="fa fa-search"></i>
                                                                    </button>
                                                                </div>
                                                        </div>
                                                    </form>
                                            </div>
                                    </div>

                            </div>{{-- menu items end --}}
                        </div>
                   
                    </div>
                  </nav>
</header>
<div class="container-fluid mini-header border-bottom">
    <div class="py-2">
        <ul class="nav justify-content-center">
        @foreach($result['commonContent']['categories'] as $key => $categories_data)
        
        <li class="nav-item">
            <div class="mega-menu">

                    <p class="nav-link mini-menu-link mb-0">
                        {{$categories_data->name}}<span class="sr-only">(current)</span>
                    </p>
                    <div class="mega-menu-content">
                        <div class="container py-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                            <h3 class="mega-menu-main-link">
                                                <a href="{{ URL::to('/shop')}}?category={{$categories_data->slug}}">{{ $categories_data->name}}</a>
                                            </h3>
                                    </div>
                                        <div class="col-sm-3 icon-menga-menu">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="fa fa-home mr-2"></i>Home </a></li>
                                                    <li><a href="#"><i class="fa fa-glass mr-2"></i>One </a></li>
                                                    <li><a href="#"><i class="fa fa-file-image-o mr-2"></i>Two </a></li>
                                                    <li><a href="#"><i class="fa fa-cog mr-2"></i>Three </a></li>
                                                </ul>						    
                                            
                                            </div>{{-- column one end --}}
                                        <div class="col-sm-3 border-left">
                                                <ul>
                                                    <li><a href="#">some link</a></li>
                                                    <li><a href="#">some link</a></li>
                                                    <li><a href="#">some link</a></li>
                                                </ul>
                                        </div>{{-- column two end --}}

                                        <div class="col-sm-3 border-left">
                                                <ul>
                                                <li><a href="#">some link</a></li>
                                                <li><a href="#">some link</a></li>
                                                <li><a href="#">some link</a></li>
                                                </ul>
                                        </div>{{-- column three end --}}

                                        <div class="col-sm-3 border-left">
                                                <ul>
                                                        <img src="http://placehold.it/150x120">
                                                   </ul>
                                        </div>{{-- column four end --}}
                                </div>
                        </div>
                    </div>
            </div>            
        </li>
        @endforeach
    </div>
</div>

<div class="container-fluid adds-header d-none d-md-block">
        <div class="">
            <div class="d-flex justify-content-center">
                <a class="praise-link" href="#">
                    <div class="">
                        <span class="mr-2"><i class="fa fa-trophy fa-2x" aria-hidden="true"></i></span>
                        <div class="float-right praise-link-text">
                                <p class="m-0 h6 text-uppercase">simply dummy text </p>
                                <p class="m-0"><small>simply dummy text </small></p>
                        </div>
                    </div>
                </a>

                <a class="praise-link" href="#">
                        <div class="">
                                    <span class="mr-2"><i class="fa fa-star fa-2x" aria-hidden="true"></i></span>
                            <div class="float-right praise-link-text">
                                    <p class="m-0 h6 text-uppercase">simply dummy text </p>
                                    <p class="m-0"><small>simply dummy text </small></p>
                            </div>
                        </div>
                    </a>

                    <a class="praise-link" href="#">
                            <div class="">
                                <span class="mr-2"><i class="fa fa-globe fa-2x" aria-hidden="true"></i></span>
                                <div class="float-right praise-link-text">
                                        <p class="m-0 h6 text-uppercase">simply dummy text </p>
                                        <p class="m-0"><small>simply dummy text </small></p>
                                </div>
                            </div>
                        </a>

                        <a class="praise-link" href="#">
                                <div class="">
                                    <span class="mr-2"><i class="fa fa-truck fa-2x" aria-hidden="true"></i></span>
                                    <div class="float-right praise-link-text">
                                        <p class="m-0 h6 text-uppercase">simply dummy text </p>
                                        <p class="m-0"><small>simply dummy text </small></p>
                                    </div>
                                </div>
                            </a>
            </div>
        </div>
</div>

