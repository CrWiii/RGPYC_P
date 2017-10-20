@extends('base.layouts.app')

@section('htmlheader_title')
	 trans('adminlte_lang::message.home') 
@endsection

@section('main-content')
<!-- <link rel="stylesheet" href="{{ asset('css/media/media.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('js/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/media/dropzone.css') }}"/>
 -->
<link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
<link rel="stylesheet" href="{{asset('css/combined-2017-03-09.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.splitter.css')}}">
<style>
    .cssload-spin-box {position: absolute; margin: auto; left: 0; /*top: 0;*/ bottom: 100px; right: 0; width: 15px; height: 15px; border-radius: 100%; box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -o-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -ms-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -webkit-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); -moz-box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); animation: cssload-spin ease infinite 4.6s; -o-animation: cssload-spin ease infinite 4.6s; -ms-animation: cssload-spin ease infinite 4.6s; -webkit-animation: cssload-spin ease infinite 4.6s; -moz-animation: cssload-spin ease infinite 4.6s; } @keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-o-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-ms-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-webkit-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } @-moz-keyframes cssload-spin {0%, 100% {box-shadow: 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223); } 25% {box-shadow: -15px 15px rgb(223,223,223), -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73); } 50% {box-shadow: -15px -15px rgb(79,77,73), 15px -15px rgb(223,223,223), 15px 15px rgb(79,77,73), -15px 15px rgb(223,223,223); } 75% {box-shadow: 15px -15px #dfdfdf, 15px 15px #4f4d49, -15px 15px #dfdfdf, -15px -15px #4f4d49; } } 
</style>
<!-- <script async="" src="{{asset('gtm.js')}}"></script> -->
<script src="{{asset('js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>   
<script src="{{asset('js/CodoPlayer.js')}}" type="text/javascript"></script>
<div class="page-content container-fluid body-centered body-loaded">
        <div class="row">
            <div class="nav-tabs-custom">
                <div class="nav" style="padding: 5px 10px;">
                    <h4> <strong>Consorcio Vial Santa Rosa - CVSR</strong></h4>
                </div>
                <ul class="nav nav-tabs pull-left ui-sortable-handle">
                {{csrf_field()}}
                    <li id="frame" data-id="informe" class="active"><a href="#informes" data-toggle="tab" aria-expanded="true">Informes</a></li>
                    <li id="frame" data-id="anexos" class=""><a href="#anexos" data-toggle="tab" aria-expanded="false">Anexos</a></li>
                    <li id="frame" data-id="imagenes" class=""><a href="#imagenes" data-toggle="tab" aria-expanded="false">Imagenes</a></li>
                    <li id="frame" data-id="videos" class=""><a href="#videos" data-toggle="tab" aria-expanded="false">Videos</a></li>
                </ul>
                    <div class="tab-content no-padding" id="principal">
                        <div class="chart tab-pane active" id="informes">
                            <div class="col-md-12">
                                <section class="scroll-area" role="main">
                                        <div class="col-md-4">
                                            <div class="box box-solid">
                                                <div class="box-header with-border">
                                                  <h3 class="box-title">Lista de Informes</h3>
                                                  <?php $i=1; ?>
                                                </div>
                                                <div class="box-body no-padding">
                                                    <ul class="nav nav-pills nav-stacked">
                                                        @foreach($media_files as $file)
                                                            <li id="pdf_list" data-id="{{$file->id}}" @if($file->num_orden==1) class="active" @endif ><a href="#" id="pdf_list" data-id="{{$file->id}}"><i class="fa fa-file-text-o"></i>{{$file->subtitle}} 0{{$i}}</a></li> <?php $i++; ?>
                                                        @endforeach
                                                  </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8" id="pdf_frames">
                                            @foreach($media_files as $file)    
                                                    <div id="pdf_i" data-id="{{$file->id}}" @if($file->num_orden == 1) style="display:block" @else style="display:none" @endif >
                                                        <object id="pdf_content" width="100%" height="1500px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="{{asset($file->route)}}?#zoom=100&scrollbar=1&toolbar=1&navpanes=1">
                                                            <p>System Error - This PDF cannot be displayed, please contact IT.</p>
                                                        </object>
                                                    </div>
                                                
                                            @endforeach
                                        </div>
                                </section>
                            </div>                            
                        </div>
                        <div class="chart tab-pane" id="anexos">
                        </div>
                        <div class="chart tab-pane" id="imagenes">
                        </div>
                        <div class="chart tab-pane" id="videos">
                        </div>


                    </div>
                </div>
        </div>
    </div>

<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script>window.jQuery || document.write('<script src="/javascript/vendor/jquery-1.10.1.min.js"><\/script>')</script> -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonry.min.js')}}"></script>
<script src="{{asset('js/front-20151006.min.js')}}"></script>
<script src="{{asset('js/zoom.min.js')}}"></script>
<script src="{{asset('js/jquery.splitter-0.14.0.js')}}"></script>
<script type="text/javascript">
    var v1 = true;
    var v2 = false;
    var v3 = false;
    var v4 = false;
    var page = 1;
    var album_name;
    var param;

    $(document).on('click','#frame', function(){
        page = 1;
        // alert($(this).attr('data-id'));
        param = $(this).attr('data-id');
        album_name = null;
        if(param =='videos'){
            album_name = '05/06/2017 - 09/06/2017';
        }

        if(param =='imagenes'){
            album_name = '05/06/2017 - 09/06/2017';
        }

        if(param != 'informe'){
            getdata(param,album_name,page);
            // if(v2 != true){
            // getdata(param);
            // }
            // else if(v3 != true){
            //     getdata(param);
            // }
            // else if(v4 != true){
            //     getdata(param);
            // }
        }
    });

    $(document).on('click','#video_refresh_frame',function(){
        // $("#"+param+"").empty();
        page = 1;
        // $("#"+param+"").hide(2000, function() {
        //     $(this).empty().show();
        // });
        album_name = $(this).attr('data-id');
        param = 'videos';
        getdata(param,album_name,page);
    });
    

    $(document).on('click','#img_refresh_frame',function(){
        page = 1;
        // $("#"+param+"").fadeOut(500, function() {
        //     $(this).empty().show();
        // });
        album_name = $(this).attr('data-id');
        param = 'imagenes';
        
        getdata(param,album_name,page);
    });

    function getdata(param,album_name,page){
        
        $.ajax({
            url: '/getFrames',
            type: 'post',
            data: {'_token':$('input[name="_token"]').val(),'param': param,'album_name': album_name,'pag':page},
            success: function(data){
                // console.log(data);
                console.log(data);
                $("#"+param+"").html(data);
                $("#"+param+"").show();
                $('#MySplitter').width(1300).height(1000).split({orientation:'vertical', limit:0, position:'40%'});
                switch(param){
                    case 'anexos':
                        v2 = true;
                    break;
                    case 'imagenes':
                        v3 = true;
                    break;
                    case 'videos':
                        v4 = true;
                    break;
                }
            },
        });
    }

    $(document).on('click','#change',function(){
        $('div#pdf').hide();
        $('[id="pdf"][data-id="'+$(this).attr('data-id')+'"]').show();
        $('li#selector').removeClass('active');
        $('[id="selector"][data-id="'+$(this).attr('data-id')+'"]').addClass('active');
    });

    $(document).ready(function () {
        $('#MySplitter').width(1300).height(1000).split({orientation:'vertical', limit:0, position:'40%'});
    });

    $(document).on('click','#pdf_list',function(){
        var pdf_id = $(this).attr('data-id');
        $('li#pdf_list').removeClass('active');
        $('div#pdf_i').hide();
        $('[id=pdf_list][data-id="'+pdf_id+'"]').addClass('active');
        $('[id="pdf_i"][data-id="'+pdf_id+'"]').show();

    //     $.ajax({

    //     });
    //     $('div#pdf_i').

    //     $('#pdf_frames').append();
    });


//track user scroll as page number, right now page number is 1
//load_more(page); //initial content load
$(window).scroll(function() { //detect page scroll
    if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
        page++; //page number increment
        load_more(page); //load content   
    }
});     
function load_more(page){   
    $.ajax(
        {
            url: '/getFrames?page=' + page,
            type: "get",
            data: {'_token':$('input[name="_token"]').val(),'param': param,'album_name': album_name,'pag':page},
            datatype: "html",
            beforeSend  : function(){
                $(".cssload-spin-box").css("display", "block");
            },
            success: function(){
                $(".cssload-spin-box").css("display", "none");
            },
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
               
                //notify user if nothing to load
                $('.ajax-loading').html("No more records!");
                return;
            }
            $('.ajax-loading').hide(); //hide loading animation once data is received
            $(".postcards").append(data); //append data into #results element          
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              
        });
 }

</script>

@endsection