<head>
    <meta charset="UTF-8" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>@section('htmlheader_title') @show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="{{ asset('/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>   
    <link href="{{ asset('/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .logo-wrap{
            padding-top: 10px !important;
        }
        .page-wrapper {
            margin-left: 0px !important;
            background: #ffffff;
        }
        .brand-img-f{
            height: 50px !important;
            width: 190px !important;
        }
        .navbar.navbar-inverse.navbar-fixed-top .nav-header {
            width: 250px !important;
        }
        .brand-text{
            height: 70px !important;
            vertical-align: middle !important;
        }
        .heading-bg {
            height: 30px !important;
            padding: 1px 0 !important;
        }
    </style>

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
