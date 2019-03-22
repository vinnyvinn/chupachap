<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

@include('common.meta')

<!-- ./end of meta -->

<style>

/* body{
  background-image:url("{{ asset('images/backgrounds/whiter_brick.jpg') }}")
} */
  
</style>

<!--dir="rtl"-->
@if(Request::path() == 'index' or Request::path() == '/')
<body class="home">
@else
<body>
@endif
	<!-- header -->

  <div class="container-bg">
    
          {{-- @include('common.header_six') --}}
          @include('common.header_five')
          {{-- @include('common.header_two') --}}
        	{{-- @include('common.header_two') --}}
        	
            @if(Request::path() == 'index' or Request::path() == '/')

<div class="main-wrapper">
            <div class="container">
              <div class="row pt-4">
                <div class="col-sm-3 col-md-3 d-none d-md-block">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
                <div class="col-sm-12 col-md-6"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1073_Large.jpg?v=435407423148" /></a></div>
                <div class="col-sm-3 col-md-3 d-sm-none d-none d-md-block">
                  <div class="row mb-2"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                  <div class="row"><a href=""><img src="https://www.thewhiskyexchange.com/media/rtwe/uploads/banners/1104_Small.jpg?v=435375865856" /></a></div>
                </div>
              </div>
            </div>
            @endif  
            <!-- ./end of image banners -->



	@yield('content')

</div>

    @include('common.footer')
  <!-- all js scripts including custom js -->

  </div>{{-- container bg end --}}

	@include('common.scripts')


    @if(!empty($result['commonContent']['setting'][77]->value))
		<?=stripslashes($result['commonContent']['setting'][77]->value)?>
    @endif





</body>

</html>

