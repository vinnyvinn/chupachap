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
        	{{-- @include('common.header_two') --}}
        	
            @if(Request::path() == 'index' or Request::path() == '/')


            <div class="container mt-3">
              <div class="row">
                <div class="col-sm-3">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
                <div class="col-sm-6"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" /></a></div>
                <div class="col-sm-3">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
              </div>
            </div>
            @endif  
            <!-- ./end of image banners -->



	@yield('content')



    @include('common.footer')
  <!-- all js scripts including custom js -->


	@include('common.scripts')


    @if(!empty($result['commonContent']['setting'][77]->value))
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    @endif





</body>

</html>

