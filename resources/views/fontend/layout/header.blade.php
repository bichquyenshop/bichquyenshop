
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 logo">
                    @foreach ($setting as $st)
                        <a href="/"><img src="{{url($st->logo)}}"></a>
                    @endforeach
                </div>
                <div class="col-md-7 translate box_search">
                   <div class="input-group mb-3">
                        
                            
                            <div class="input-group-prepend">
                                <input id="search"  type="text" class="form-control" aria-label="Text input with dropdown button">
                                <a href="{{url('searchButtonProduct')}}"><button id="button_search" class="btn btn-outline-secondary dropdown-toggle" type="button" ><i class="fas fa-search"></i> Tìm kiếm</button>
                                </a>
                            </div>
                            <div class="result_search">
                        
                        
                        
                
                                    
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3 translate mess">
                    <i class="fab fa-facebook-messenger"></i>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 d-inline-block">
                <span class="social facebook">
                    <a href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </span>
                <span class="social youtube">
                    <a href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </span>
                <span class="social twitter">
                    <a href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                </span>
                <span class="social twitter">
                     <a href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                </span>
            </div>
            <div class="col-md-7 d-inline-block">
                
                 <table style="height: 100px;">
                    <tbody>
                        
                       <div class="menu active">
                            <a href="" >Trang chủ</a>
                        </div>
                        <div class="menu">
                            <a href="">Giới Thiệu</a>
                        </div>
                        <div class="dropdown">
                            <div class="dropbtn">
                                <a href="">Sản Phẩm</a>
                            </div>
                            <div class="dropdown-content">
                                @foreach ($categogy as $ct)
                                    <a href="{{url('product-category/'.$ct->id)}}">{{$ct->name}}</a>
                                @endforeach

                                
                               
                            </div>
                        </div>

                    </tbody>
                </table>
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
  
 });
$(window).click(function() {
    $('.result_search').fadeOut(500);  
    $('.box_search').css('z-index',0);
});
</script>

