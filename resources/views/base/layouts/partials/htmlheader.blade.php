<head>
    <meta charset="UTF-8" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>@section('htmlheader_title') @show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <style type="text/css">
        .pr-0{
            font-size: 1.4em !important;
        }
        .logo-wrap{
            padding-top: 0px !important;
        }
        .page-wrapper {
            margin-left: 0px !important;
            /*background: #ffffff !important;*/
        }
        .brand-img-f{
            height: 80px !important;
            width: 230px !important;
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
        .navbar.navbar-inverse.navbar-fixed-top .nav-header {
            height: 85px;
        }
        .navbar.navbar-inverse.navbar-fixed-top {
            min-height: 85px;
        }
        .navbar.navbar-inverse.navbar-fixed-top .nav-header {
            height: 85px;
        }
        .navbar.navbar-inverse.navbar-fixed-top .nav.navbar-right {
            margin-right: 0;
            height: 85px !important;
            vertical-align: middle;
            padding-top: 10px !important;
        }
    </style>

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
