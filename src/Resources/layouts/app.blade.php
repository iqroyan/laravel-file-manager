<!DOCTYPE html PUBLIC "XHTML 1.0 Transitional" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <title>WorldSkills - FileClient</title>

    <link rel="stylesheet" href="{{ asset('/files/style.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('/files/style.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('/files/main.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" media="screen">

    <style id="poshytip-css-tip-twitter" type="text/css">div.tip-twitter{visibility:hidden;position:absolute;top:0;left:0;}div.tip-twitter table, div.tip-twitter td{margin:0;font-family:inherit;font-size:inherit;font-weight:inherit;font-style:inherit;font-variant:inherit;}div.tip-twitter td.tip-bg-image span{display:block;font:1px/1px sans-serif;height:10px;width:10px;overflow:hidden;}div.tip-twitter td.tip-right{background-position:100% 0;}div.tip-twitter td.tip-bottom{background-position:100% 100%;}div.tip-twitter td.tip-left{background-position:0 100%;}div.tip-twitter div.tip-inner{background-position:-10px -10px;}div.tip-twitter div.tip-arrow{visibility:hidden;position:absolute;overflow:hidden;font:1px/1px sans-serif;}</style>
    <style id="poshytip-css-tip-yellowsimple" type="text/css">div.tip-yellowsimple{visibility:hidden;position:absolute;top:0;left:0;}div.tip-yellowsimple table, div.tip-yellowsimple td{margin:0;font-family:inherit;font-size:inherit;font-weight:inherit;font-style:inherit;font-variant:inherit;}div.tip-yellowsimple td.tip-bg-image span{display:block;font:1px/1px sans-serif;height:10px;width:10px;overflow:hidden;}div.tip-yellowsimple td.tip-right{background-position:100% 0;}div.tip-yellowsimple td.tip-bottom{background-position:100% 100%;}div.tip-yellowsimple td.tip-left{background-position:0 100%;}div.tip-yellowsimple div.tip-inner{background-position:-10px -10px;}div.tip-yellowsimple div.tip-arrow{visibility:hidden;position:absolute;overflow:hidden;font:1px/1px sans-serif;}</style>
</head>
<body onload="">
<!-- WRAPPER -->
<div id="wrapper">

    @include('partials.popup')
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

<script type="text/javascript" src="{{ asset('/js/jquery-ui/external/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/website.js') }}"></script>
</body>
</html>