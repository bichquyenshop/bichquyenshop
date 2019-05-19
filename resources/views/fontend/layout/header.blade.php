<!-- Load Facebook SDK for JavaScript -->
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
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="429999077779521">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 logo">
                    @forelse($setting as $st)
                        <a href="/"><img src="{{url($st->logo)}}"></a>
                    @empty
                        <a href="/"><img src="{{url('image/logo/logo.png')}}"></a>
                        
                    @endforelse
                </div>
                <div class="col-md-7 translate box_search">
                   <div class="input-group mb-3">
                        
                        <form style ="width:100%" method="GET" action="{{ url('searchButtonProduct') }}">    
                            <div class="input-group-prepend">
                               
                                
                                <input id="search"  type="text" class="form-control" aria-label="Text input with dropdown button" name="stringSearch">
                                <button id="button_search" class="btn btn-outline-secondary dropdown-toggle" type="submit" ><i class="fas fa-search"></i> Tìm kiếm</button>
                                </a>
                            </div>
                            <div class="result_search">
                        </form>
                        
                        
                
                                    
                            
                        </div>
                    </div>
                </div>
               <!--  <div class="col-md-3 translate mess">
                    <i class="fab fa-facebook-messenger"></i>
                </div> -->
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 align-self-center sidenav" id="mySidenav">
                    
                    <span class="social facebook">
                        <a href="" id="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </span>
                    <span class="social youtube">
                        <a href="" id="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </span>
                    <span class="social twitter">
                        <a href="" id="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </span>
                    <span class="social twitter">
                         <a href="" id="as">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </span>
                </div>
                <div class="col-md-10 add width">
                     
                    <nav class="navbar navbar-expand-md navbar-light">
                       
                      
                      <button id="openMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>
                      </button>
                       <a href="javascript:void(0)" class="closebtn">&times;</a>

                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item active">
                            <a class="nav-link" href="/"><i class="fa fa-home"> Trang chủ </i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/"> Giới Thiệu</i></a>
                          </li>
                          <li class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle">
                              Sản Phẩm
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($categogy as $ct) 
                                <li class="dropdown-submenu"><a href="{{ url('product-category/' . $ct->id) }}" class="dropdown-item dropdown-toggle">{{$ct->name}}</a>
                                    <ul class="dropdown-menu">
                                    @foreach ($subCategory as $sc)
                                    
                                        @if($ct->id == $sc->category_id)

                                        
                                        <li>
                                            <a class="dropdown-item" href="{{ url('product-sub-category/' . $sc->id) }} ">{{$sc->name}}</a>
                                        </li>
                                          
                                          
                                        
                                        @endif
                                        
                                    @endforeach
                                    </ul>
                                    </li>
                                @endforeach
                             
                            </ul>
                          </li>
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



</script>

