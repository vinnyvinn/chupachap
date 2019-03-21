<footer class="footer-content" itemscope itemtype="http://schema.org/WPFooter">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="single-footer">
          <h5>Contact Us</h5>
          <ul class="contact-list  pl-0 mb-0">
            <li> <i class="fa fa-map-marker"></i><span>{{$result['commonContent']['setting'][4]->value}} {{$result['commonContent']['setting'][5]->value}} {{$result['commonContent']['setting'][6]->value}}, {{$result['commonContent']['setting'][7]->value}} {{$result['commonContent']['setting'][8]->value}}</span> </li>
            <li> <i class="fa fa-phone"></i><span>{{$result['commonContent']['setting'][11]->value}}</span> </li>
            <li> <i class="fa fa-envelope"></i><span> <a href="mailto:info@chupachap.co.ke" class="mail-link">{{$result['commonContent']['setting'][3]->value}}</a> </span> </li>
      
          </ul>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="footer-block">
        	<div class="single-footer">
              <h5>@lang('website.Our Services')</h5>
              <ul class="links-list pl-0 mb-0">
                <li> <a href="{{ URL::to('/')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Home')</a> </li>
                <li> <a href="{{ URL::to('/shop')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Shop')</a> </li>
                <li> <a href="{{ URL::to('/orders')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Orders')</a> </li>
                <li> <a href="{{ URL::to('/viewcart')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Shopping Cart')</a> </li>            <li> <a href="{{ URL::to('/wishlist')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Wishlist')</a> </li>            
              </ul>
            </div>
            <div class="single-footer">
              <h5>@lang('website.Information')</h5>
              <ul class="links-list pl-0 mb-0">
                @if(count($result['commonContent']['pages']))
                    @foreach($result['commonContent']['pages'] as $page)
                        <li> <a href="{{ URL::to('/page?name='.$page->slug)}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{$page->name}}</a> </li>
                    @endforeach
                @endif            
                <li> <a href="{{ URL::to('/contact-us')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>@lang('website.Contact Us')</a> </li>
              </ul>
            </div>
        </div>
      </div>
      
      <div class="col-12 col-lg-4">
        <div class="single-footer">
            {{-- <div class="newsletter">
              <h5>@lang('website.Subscribe for Newsletter')</h5>
              <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <input class="form-control" type="email" placeholder="@lang('website.Your email address here')">
                  </div>
                    <button type="button" class="btn btn-primary mb-2">@lang('website.Subscribe')</button>
               
              </form>
            </div>
             --}}
            
            <div class="socials">
            	<h5>@lang('website.Follow Us')</h5>
                <ul class="social-icons">
                	<li><a href="https://www.facebook.com/chupachapKE" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/ChupaChapKE" class="fa fa-twitter"></a></li>
                    <li><a href="http://instagram.com/chupachapke" class="fa fa-instagram"></a></li>
                </ul>
            </div>
            <div class="footer-image">
                <h5>We Accepts</h5>
               <img class="img-fluid" src="{{asset('').'images/payments.png'}}">
           </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="footer pt-2">
  <div class="container">
    <div class="row">
    	
        <div class="col-12 text-center">
            <p> © <?= now()->year ?> ChupaChap. <a href="{{ url('page?name=privacy-policy') }}">@lang('website.Privacy')</a> · <a href="#">@lang('website.Terms')</a> </p>
        </div>
        <div class="floating-top"><a href="#" class="fa fa-angle-up"></a></div>
    </div>
  </div>
</div>

<!--notification-->
<div id="message_content"></div>

<!--- loader content --->
<div class="loader" id="loader">
	<img src="{{asset('').'images/loader.gif'}}">
</div>
