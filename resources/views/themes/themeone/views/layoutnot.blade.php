<!doctype html>

<html>



<!-- meta contains meta taga, css and fontawesome icons etc -->

@include('common.meta')

<!-- ./end of meta -->

<!--dir="rtl"-->

<body dir="{{ session('direction')}}" class="">
	<!-- header -->

	
<h1>Sorry This Site has an Age Limit, You must be Above 18 years of Age to access it</h1>
	@yield('content')
	
  

	
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">You must be 18 years old to visit this site.</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
         
          
        </div>
        <div class="modal-body">
            <form action="{{ route('ageverfiy') }}" method="POST">
                @csrf 
              <p>Please verify your age</p>
              <div class="row">
                  
             <div class="col">
               <label for="">Enter your Date of Birth to Verify your Age and Proceed</label>
                 <input type="date" name="dob" class="form-control Datepicker">
             </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="av_verify_remember">
                        <input type="checkbox" name="remember" id="av_verify_remember" value="1" class="not-empty"> Remember me
                      </label>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Verify Age</button>
        </div>
      </form>
      </div>
    </div>
  </div>

    <script>
        $(window).on('load',function(){
             $('#myModal').modal('show');
           });
         </script>
</body>

</html>

