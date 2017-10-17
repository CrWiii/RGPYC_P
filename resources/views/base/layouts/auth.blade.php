<!DOCTYPE html>
<html>

@section('htmlheader')
    @include('base.layouts.partials.htmlheader')
    @section('styles')
    @show
@show


<body>
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>

    <div class="wrapper pa-0">
    	@yield('content') 
    </div>

    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
</body>
</html>