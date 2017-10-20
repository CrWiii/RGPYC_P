@if($pag==1)
    <div class="col-md-12">
        <section class="scroll-area" role="main">
        <div style="padding-top: 15px;">
                <button id="video_refresh_frame" data-id="05/06/2017 - 09/06/2017">05/06/2017 - 09/06/2017</button> 
                <button id="video_refresh_frame" data-id="12/06/2017 - 16/06/2017">12/06/2017 - 16/06/2017</button>
                <button id="video_refresh_frame" data-id="19/06/2017 - 23/06/2017">19/06/2017 - 23/06/2017</button>
                <button id="video_refresh_frame" data-id="03/07/2017 - 07/07/2017">03/07/2017 - 07/07/2017</button>
            </div>
            <article class="article-columns">
                <div class="postcards">
@endif

                    @foreach($media_files as $file)    
                            <div class="postcard">
                                <div class="postcard_image">
                                    <video width="250" controls preload="none" preload="metadata">
                                      <source src="{{$file->route}}" type="video/mp4">
                                      Your browser does not support HTML5 video.
                                    </video>
                                </div> 
                                <p class="postcard_sender">
    <a download="{{$file->route}}" href="{{asset($file->route)}}">{{$file->title}}</a>  | @if(substr($file->route,21,9)==="Carretera") Solo descarga  @endif
                                </p>
                            </div> 
                    @endforeach
@if($pag==1)
                </div>
            </article>
        </section>
    </div>
    <div class="cssload-spin-box" style="display: none;"></div>
@endif