<?php
  \App\Models\View::insertView();
?>
<div id="fb-root"></div>
<script>
    
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v3.3'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="151133041704175"
     logged_in_greeting="Shop có thể giúp gì cho bạn không?"
     logged_out_greeting="Shop có thể giúp gì cho bạn không?">
</div>

<!-- Your customer chat code -->
<div style="top:10px" class="fb-customerchat"
     attribution=setup_tool
     page_id="429999077779521">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-xl-2 logo">
                    @if(!empty($st->logo))
                        <a href="/"><img src="{{url($st->logo)}}"></a>
                    @else
                        <a href="/"><img src="{{url('image/logo/logo.png')}}"></a>
                    @endif

                </div>
                <div class="col-md-9 col-xl-10 translate box_search">
                    <div class="input-group mb-3">

                        <form id="formSearch"  method="GET" action="{{ url('searchButtonProduct') }}" width="100%">
                            <div class="input-group-prepend">


                                <input id="search"  type="text" class="form-control" aria-label="Text input with dropdown button" name="stringSearch">
                                <button id="button_search" class="btn btn-outline-secondary dropdown-toggle" type="submit" ><i class="fas fa-search"></i> Tìm kiếm</button>
                            </div>
                            <div class="result_search"></div>
                        </form>





                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 col-xl-2 align-self-center sidenav">
                <div id="mySidenav">
                    <span class="social facebook">
                        <a target="blank" href="{{!empty($st->link_fb) ? $st->link_fb : ''}}" id="facebook">
                            <img src="{{url('image/icon/facebook.png')}}">
                        </a>
                    </span>
                    <span target="blank" class="social twitter">
                        <a href="{{!empty($st->link_ins) ? $st->link_ins : ''}}" id="twitter">
                            <img src="{{url('image/icon/instagram.png')}}">
                            
                        </a>
                    </span>
                    <span target="blank" class="social youtube">
                        <a href="{{!empty($st->link_youtube) ? $st->link_youtube : ''}}" id="youtube">
                            <img src="{{url('image/icon/youtube.png')}}">
                        </a>
                    </span>
                    
                </div>
             
            </div>
            <div class="col-md-9  col-xl-10 add width ">

                <nav class="navbar navbar-expand-md navbar-light">


                    <button id="openMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="javascript:void(0)" class="closebtn">&times;</a>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul  id="menuNav" class="navbar-nav align-middle">
                            <li class="nav-item  align-self-center">
                                <span class="nav-link dropdown-toggle" >
                                <a class="parent dropdown-item dropdown-toggle" href="/"><i class="fa fa-home"> Trang chủ </i></a>
                                </span>

                            </li>
                            @foreach ($categogy as $ct)
                            <li class="nav-item dropdown align-self-center">

                                <span class="nav-link dropdown-toggle" onclick="void(0)">
                                    <a href="{{ url('product-category/' . $ct->id) }}" class="dropdown-item dropdown-toggle"><b style="font-family:'Font Awesome 5 Free'">{{$ct->name}}</b></a>
                                </span>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach ($subCategory as $sc)
                                        @if($ct->id == $sc->category_id)
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item" href="{{ url('product-sub-category/' . $sc->id) }} ">{{$sc->name}}
                                                </a>


                                            </li>
                                        @endif
                                    @endforeach

                                </ul>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>

            </div>
        </div>



    </div>
</div>
</div>



<script>
    $( document ).ready(function() {
        $("#search").keyup(function(){
            var stringSearch = $('#search').val();
            $.ajax({
                type: "POST",
                url: '{{route("searchInputProduct")}}',
                data: {stringSearch: stringSearch},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data != ""){
                        $('.box_search').css('z-index',10);
                        $('.result_search').fadeIn(500);
                        $( ".result_search" ).html(data);

                    }
                    else{
                        $( ".result_search" ).html("<p> Không có kết quả </p>");
                    }
                }
            });
        })
        $('.add').load(
            function()
            {
                $(this).removeClass('.closebtn');
            }
        );

        $('#openMenu').click(function(){
            $('.add').addClass('mymenu');

            $('#navbarNavDropdown').show();
            if ($('.add').hasClass('mymenu')) {

                $('#openMenu').hide();
                $('.closebtn').css('opacity',1);
            }
            else{
                $('#openMenu').attr('aria-expanded','false');
                $('#openMenu').show();
            }

        })

        $('.closebtn').click(function(){
            $('#openMenu').show();
            $('.add').removeClass('mymenu');

            if ($('.add').hasClass('mymenu')) {

                $('#navbarNavDropdown').show(0);
            }
            else{
                $('.closebtn').css('opacity',0);
                $('#navbarNavDropdown').hide();
            }


        })
        
    });
        $(window).click(function() {
        $('.result_search').fadeOut(500);
        $('.box_search').css('z-index',0);
    });
    $( document ).ready(function() {
        
        var search_width = $("#search").width();
        var menuWidth = $("#menuNav").width(search_width);
        if(navigator.userAgent.match(/iPad/i)){
            $("#formSearch").width('100%');
            $("iframe").height('200px');
        }
        var isMobile = /iPhone|iPod|Android/i.test(navigator.userAgent);
        if(isMobile){
            $("#formSearch").width('100%');
        }
    });
</script>

