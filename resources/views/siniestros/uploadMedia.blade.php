<!DOCTYPE html>
<html>
<head>
    <title>Upload Multiple Images</title>
    <script src="{{asset('/plugins/dropzone/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/plugins/dropzone/bootstrap-3.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/dropzone/dropzone.min.css')}}">
    <script src="{{asset('/plugins/dropzone/dropzone.min.js')}}"></script>
<!--
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link href="{{asset('css/media/dropzone.css')}}" rel="stylesheet">
    <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Upload Multiple Images</h1>
            
            <div>
                <form method="POST" action="mediaStore" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="mediaUpload">
                {{csrf_field()}}

                <div style="padding-bottom: 20px;">
                    <select id="tipo" name="tipo">
                        <option value="0">Seleccione un tipe</option>
                        <option value="anexos">Anexos</option>
                        <option value="imagenes">Imagenes</option>
                        <option value="informe">Informe</option>
                        <option value="videos">Videos</option>
                    </select>
                </div>
                <div style="padding-bottom: 20px;">
                    <input type="text" name="album_name">
                </div>

                    <div id="media" style="display: none">
                        <h3>Upload Multiple Image By Click On Box</h3>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('click','#tipo',function(){
        if($('#tipo').val() !== "0"){
            $('#media').show();
        }else{
            $('#media').hide();
        }    
    })
    
    Dropzone.options.imageUpload = {
        maxFilesize         :       100,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4,.pdf"
    };  
</script>

</body>
</html>