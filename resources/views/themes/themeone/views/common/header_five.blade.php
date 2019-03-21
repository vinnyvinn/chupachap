<header id="header-area" class="header-area">
	<div id="header-mini">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerChupaChap" aria-controls="navbarTogglerChupaChap
                    ChupaChap" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerChupaChap">


                        <div class="row" style="width:100%;">
                            <div class="col-sm-12 col-md-4 offset-md-4 text-center">
                                <a class="navbar-brand" href="#">
                                    <img src="https://www.thewhiskyexchange.com/media/rtwe/assets/application/images/logos/logo-flat.svg" alt="ChupaChap Logo"/>
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
                                                            <a href="" class="menu-item-link">
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
                                                    <div class="col-3 text-center m-0 p-0">
                                                            <a href="" class="menu-item-link">
                                                                <div class="menu-item-icon border-left border-right"><i class="fa fa-shopping-basket fa-lg" aria-hidden="true"></i></div>
                                                                <div class="menu-item-label">Basket</div>
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-form-container mt-3 w-100">
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
        @foreach($result['commonContent']['categories'] as $categories_data)
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('/shop')}}?category={{$categories_data->slug}}">{{$categories_data->name}}  <span class="sr-only">(current)</span></a>
        </li>
        @endforeach
    </div>
</div>

<div class="container-fluid adds-header">
        <div class="py-1">
            <div class="d-flex justify-content-center">
                <a>
                    <div class="d-flex flex-row">
                        <span><i class="fa fa-trophy fa-2x" aria-hidden="true"></i></span>
                        <div>
                            <p class="m-0 h6">simply dummy text </p>
                            <small class="m-0">simply dummy text </small>
                        </div>
                    </div>
                </a>

                <a>
                        <div class="d-flex flex-row">
                            <span>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <div>
                                <p class="m-0 h6">simply dummy text </p>
                                <small class="m-0">simply dummy text </small>
                            </div>
                        </div>
                    </a>

                    <a>
                            <div class="d-flex flex-row">
                                <span><i class="fa fa-globe fa-2x" aria-hidden="true"></i></span>
                                <div>
                                    <p class="m-0 h6">simply dummy text </p>
                                    <small class="m-0">simply dummy text </small>
                                </div>
                            </div>
                        </a>

                        <a>
                                <div class="d-flex flex-row">
                                    <span><i class="fa fa-truck fa-2x" aria-hidden="true"></i></span>
                                    <div>
                                        <p class="m-0 h6">simply dummy text </p>
                                        <small class="m-0">simply dummy text </small>
                                    </div>
                                </div>
                            </a>

            </div>
        </div>
</div>

