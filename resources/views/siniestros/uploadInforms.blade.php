<!DOCTYPE html>
<html>
<head>
    <title>Carga Masiva PDFs</title>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link href="{{asset('css/media/dropzone.css')}}" rel="stylesheet">
     <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Carga Masiva PDFs</h1>
            
            <div>
                <form method="POST" action="pdfsStore" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzone dz-clickable" id="mediaUpload">
                {{csrf_field()}}

                    <div id="media">
                        <h3>Upload Multiple Image By Click On Box</h3>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize:100,
        acceptedFiles: ".pdf"
    };  
</script>

</body>
</html>