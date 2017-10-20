    <div class="col-md-12">
        <section class="scroll-area" role="main">
            <div id="MySplitter">
                <div>
                    <span class="box box-solid">
                        <span class="box-header with-border">
                          <h3 class="box-title">Lista de Anexos</h3>
                        </span>
                        <span class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <?php $j=0; ?>
                                @foreach($media_files as $file)   
                                <li id="selector" data-id="{{$file->id}}" @if($j==0) class="active" @endif ><a href="#" id="change" data-id="{{$file->id}}"><i class="fa fa-file-text-o"></i>ANEXO 0{{$j}} <span style="float: right;">{{$file->album_name}}</span> <p>{{$file->subtitle}}</p></a> </li> <?php $j++ ?>
                                @endforeach
                          </ul>
                        </span>
                    </span>
                </div>

                <div>
                    @foreach($media_files->sortBy('id') as $file)
                        <div id="pdf" data-id="{{$file->id}}">
                            <object id="pdf_content" width="100%" height="1500px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="{{asset($file->route)}}?#zoom=100&scrollbar=1&toolbar=1&navpanes=1">
                            <p>System Error - This PDF cannot be displayed, please contact IT.</p>
                            </object>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </section>
    </div>
