					@foreach($media_files as $file)
                        <div class="postcard">
                            <div class="postcard_image">
                                <img class="postcard_image_img" data-action="zoom" src="{{asset($file->route)}}"  sizes="259px" alt="Postcard">
                            </div> 
                            <p class="postcard_sender">
                                <a download="{{$file->route}}" href="{{asset($file->route)}}">{{$file->title}}</a>
                            </p>
                        </div>
                    @endforeach