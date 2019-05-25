<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>BíchQuyênJewelry - Trang chủ @yield('title')</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
   
    @yield('meta')
    

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/animation.css">
    <link rel="stylesheet" type="text/css" href="/css/slider/demo.css" media="all" />
    <link rel="stylesheet" type="text/css" href="/css/slider/style.css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script type="text/javascript" src="/js/app.js"></script>
    {{--<script type="text/javascript" src="/'js/js.js'"></script>--}}
    {{--<script src="/static/components/jquery/dist/jquery.min.js"></script>--}}
    <script type="text/javascript" src="/js/readmore.min.js"></script>
    <script type="text/javascript" src="/js/slider/jquery.flexslider-min.js"></script>

</head>
<body>
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
                    <div class="col-md-8">
                        @include('fontend.layout.banner')
                    </div>
                    <div class="col-md-4 facebook">
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

<script>
    jQuery(document).ready(function() {

        jQuery('.more').readmore({
            speed: 300,
            collapsedHeight: 140,
            moreLink: '<a style="font-weight:bold" href="#">Xem tiếp</a>',
            lessLink: '<a style="font-weight:bold" href="#">Đóng</a>',
            heightMargin: 16
        });

    });
    $('.flexslider').flexslider({
        animation: "fade"
    });

    $(function() {
        $('.show_menu').click(function(){
            $('.menu').fadeIn();
            $('.show_menu').fadeOut();
            $('.hide_menu').fadeIn();
        });
        $('.hide_menu').click(function(){
            $('.menu').fadeOut();
            $('.show_menu').fadeIn();
            $('.hide_menu').fadeOut();
        });
    });
</script>

</body>
</html>


