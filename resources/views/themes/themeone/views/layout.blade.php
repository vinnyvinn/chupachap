<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

@include('common.meta')

<!-- ./end of meta -->

<!--dir="rtl"-->
@if(Request::path() == 'index' or Request::path() == '/')
<body class="home">
@else
<body>
@endif
	<!-- header -->

    
          @include('common.header_five')
          <hr/>
        	@include('common.header_two')
        	
            @if(Request::path() == 'index' or Request::path() == '/')
            <section class="carousel-content" style="margin:15px 0">
              <div class="container">
                <div class="row">
                 <div class="col-3">
                  @include('plugins.top_sellers')
                 </div>
                 <div class="col-6 p-0"> @include('common.carousel') </div>
                 <div class="col-3">
                    @include('plugins.top_sellers_week')
                 </div>
                </div>
              </div>
            </section>
            @endif
           
            <!-- ./end of header -->



	@yield('content')



    @include('common.footer')
  <!-- all js scripts including custom js -->


	@include('common.scripts')


    @if(!empty($result['commonContent']['setting'][77]->value))
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    @endif





</body>

</html>

