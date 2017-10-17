<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('base.layouts.partials.htmlheader')
    @section('styles')
    @show
@show

    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>

    <div class="wrapper theme-1-active pimary-color-green">

        @include('base.layouts.partials.mainheader')
        @include('base.layouts.partials.chatbar')

        <div class="right-sidebar-backdrop"></div>

        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"></h5>
                    </div>

                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Lista de Casos</a></li>
                            <li><a href="#"><span>speciality pages</span></a></li>
                            <li class="active"><span>blank page</span></li>
                        </ol>
                    </div>
                </div> -->

                @section('main-content')
                @show

                @include('base.layouts.partials.footer')
            </div>
        </div>
    </div>





@section('scripts')
    @include('base.layouts.partials.scripts')
@show

@section('scripts2')
@show

</body>
</html>
