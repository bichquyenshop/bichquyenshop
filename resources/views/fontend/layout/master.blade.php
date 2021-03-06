<?php
// if (Session::get('LAST_ACTIVITY') && (time() - Session::get('LAST_ACTIVITY') > 1800 )) {
//     \App\Models\Setting::updateView();
//     Session:flush();
// }
// Session::put('LAST_ACTIVITY', time());
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bích Quyên Jewelry - @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">

    @yield('meta')


    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{url('css/bootstrap-rating.css')}}" rel="stylesheet">
    

    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquerymin.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap-rating.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.validate.min.js')}}"></script>

</head>
<body >
<div id="top_header">
    @include('fontend.layout.top-header')
</div>
<div id="header" class="container-fluid">
    @include('fontend.layout.header')

</div>
<div id="banner" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7 col-xl-8">
                    @include('fontend.layout.banner')
                </div>
                <div class="col-md-5 col-xl-4 facebook">
                    @include('fontend.layout.fanpage-facebook')
                </div>
            </div>
        </div>
    </div>
</div>



<div id="content" class="container">
    @yield('content')

</div>

<div id="footer" class="container-fluid">
    @include('fontend.layout.footer')
</div>



</body>
</html>


