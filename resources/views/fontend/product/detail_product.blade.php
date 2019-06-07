@extends('fontend.layout.master')
@section('content')
  @section('title', 'Chi Tiết Sản Phẩm')
  @section('meta')
    @foreach ($detailProduct as $dp)


    
    <meta property="og:url" content="{{ url('detail-product/' . $dp->id) }}" />
    <!-- <meta property="og:type" content="Detail Product" /> -->
    <meta property="og:title" content="{{$dp->name}}" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{url($dp->image)}}" />
        
    @endforeach
    
  @endsection
  <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>

  
	<div class="detail_content">
    <h3 class="tde">
          <span>Chi Tiết Sản Phẩm</span>
    </h3>
    <hr>
  </div>
    <div class="row detail_product">  
    	@foreach ($detailProduct as $dp)
        <div class="col-md-4  d-inline-block">
            <img src="{{url($dp->image)}}" alt=""> 
        </div>
        <div class="col-md-8  d-inline-block content">
            <div><b>Tên sản phẩm:</b>  {{$dp->name}}</div>
           	<div><b>Mã sản phẩm:</b>  {{$dp->code}}</div>
           	<div><b>Chủng loại:</b>  {{$dp->name_sc}}</div>
           	<div><b>Kích thước:</b>  {{$dp->size}}</div>
           	<div><b>Màu sắc:</b> {{$dp->color}}</div>
           	<div><b>Kiểu dáng:</b>  {{$dp->style}}</div>
           	<div><b>Trọng lượng:</b>  {{$dp->weight}}</div>
           	<div><b>Mô tả chi tiết:</b>  {{$dp->description}}</div>
            <span id="fb-root"></span>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=145140442980988&autoLogAppEvents=1"></script>
        
            <br>
            <span class="fb-share-button" data-href="{{ url('/detail-product/' . $dp->id) }}" data-layout="button_count" data-size="small">
              Chia sẻ               
            </span>
        </div>
      @endforeach  
    </div>
    <div class="comment">
      <div class="row">
        <div class="col-md-12 col-sm-12">    
          <h5>{{count($comment)}} khách hàng đã nhận xét cho sản phẩm này</h5>
          @foreach ($commentCountSum as $cmcs)
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-2">{{$cmcs->description}} ({{$cmcs->count}})</div>
                <div class="col-md-4">
                  <div class="progress">

                    <div class="progress-bar bg-success" role="progressbar" style="width: {{($count != 0) ?(100/$count) * $cmcs->count : 0}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                  
              </div>
                
            </div>
          @endforeach

            <div class="col-md-6" style="padding-top:20px;">
                @if(session('message_success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session('message_success')}}
                    </div>
                @endif
            </div>


          <button style="margin-top:10px" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Đánh giá và nhận xét
          </button>
        
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <form id="form" method="POST"  action="{{ route('add-comment') }}">
                @csrf
                <input type="hidden" name="id_product" value="{{$detailProduct[0]->id}}">
                <div style="padding-bottom: 10px">
                <input style="opacity: 0;width:0px" type="text" class="rating rating-tooltip" name="rating"/>
                </div>
                <div class="form-group">
                 
                  <label>Tên của bạn : </label>
                  <input type="text" class="form-control" name="user_name">
                
                </div>
                <div class="form-group">
                  <label>Tiêu đề :</label>
                  <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                  <label>Nội dung đánh giá :</label>
                  <textarea class="form-control" placeholder="đánh giá của khách hàng..." rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-info pull-right">Đánh giá</button>
                </div>
              </form>
              
              
            </div>
          </div>
          <div class="comment-wrapper" style="margin-top:10px">
            <div class="panel panel-info">   
              <div class="panel-body">
                
                 <h5>Tất cả các nhận xét</h5>
                  <ul class="media-list">
                    @foreach ($comment as $cm)
                    
                    <li class="media">
                      <a href="#" class="pull-left">
                          <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                      </a>
                      <div class="media-body">
                        <!--   <span class="text-muted pull-right">
                              <small class="text-muted">30 min ago</small>
                          </span> -->
                          <strong class="text-success">{{$cm->user_name}}</strong>
                          <p>
                            {{$cm->content}}
                          </p>
                      </div>
                    </li>
                    @endforeach
                     
                  </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

<style>
 body{margin-top:20px;}

.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
    border:2px solid #e5e7e8;
    margin-right:10px;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
/*h1[alt="Simple"] {color: white;}
a[href], a[href]:hover {color: grey; font-size: 0.5em; text-decoration: none}


body
{
  background: #4a4a4c !important;
}
*/
.starrating > input {display: none;}  /* Remove radio buttons */



.starrating > span
{
  color: #222222; /* Start color when not clicked */
}

.starrating > input:checked ~ label
{ color: #ffca08 ; } /* Set yellow color when star checked */

.starrating > input:hover ~ label
{ color: #ffca08 ;  } /* Set yellow color when star hover */
</style>
<script>
  $(document).ready(function() {
      $('.rating').rating();
      $('.rating-tooltip').rating({
          extendSymbol: function (rate) {
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              title: 'Rate ' + rate
            });
          }
        });
      $('.rating-tooltip-manual').rating({
          extendSymbol: function () {
            var title;
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              trigger: 'manual',
              title: function () {
                return title;
              }
            });
            $(this).on('rating.rateenter', function (e, rate) {
              title = rate;
              $(this).tooltip('show');
            })
            .on('rating.rateleave', function () {
              $(this).tooltip('hide');
            });
          }
        });
        $('.rating').each(function () {
          $('<span class="label label-default"></span>')
            .text($(this).val() || ' ')
            .insertAfter(this);
        });
        $('.rating').on('change', function () {
         
          $(this).next('.label').html('<span class="btn btn-success">Bạn đang đánh giá :' + $(this).val() + '*</span>');
        });

      $("#form").validate({
      rules: {
        user_name: "required",
        title: "required",
        rating:"required",
        description : "required",
      },
      messages: {
        user_name: "Vui lòng nhập tên của bạn",
        title: "Vui lòng nhập tiêu đề",
        rating: "Vui lòng rating",
        description: "Vui lòng nhập description",
        // diachi: {
        //   required: "Vui lòng nhập địa chỉ",
        //   minlength: "Địa chỉ ngắn vậy, chém gió ah?"
        // }
      }
    });
  })
</script>
@endsection
