<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" href="{{ asset('filemanager/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('filemanager/lib/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('filemanager/css/website.css') }}">
    <title>سیستم مدیریت فایل</title>
</head>
<body onload="">
<!-- WRAPPER -->
<div id="wrapper">

    @includeIf('fileManager::partials.popup')
    <!-- HEADER -->
    <div id="header" style="height: 180px;">

        <img id="logo" src="files/logo.png" width="150">
    </div>
    <!-- ENDS HEADER -->
    <!-- MAIN -->
    <div id="main">
        <!-- content -->
        <div id="content">
           @yield('content')
        </div>
        <!-- ENDS content -->
    </div>
    <!-- ENDS MAIN -->
    <!-- FOOTER -->
    <div id="footer">
        <!-- Bottom -->
        <div id="bottom">
            18th Iran WorldSkills Competition
        </div>
        <!-- ENDS Bottom -->
    </div>
    <!-- ENDS FOOTER -->
</div>
<!-- ENDS WRAPPER -->

<script type="text/javascript" src="{{ asset('filemanager/lib/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('filemanager/lib/sweetalert/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('filemanager/js/website.jd') }}"></script>
</body>
</html>