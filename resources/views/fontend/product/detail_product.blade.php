@extends('fontend.layout.master')
@section('content')
  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
  </script>
	<div>Chi Tiết Sản Phẩm</div>
    <div class="row detail_product">
        
        
    	@foreach ($detailProduct as $dp)
        <div class="col-md-6  d-inline-block">
            
            <img src="{{url($dp->image)}}">
           
        </div>
        <div class="col-md-6  d-inline-block content">
           	<div>Tên sản phẩm : {{$dp->name}}</div>
           	<div>Mã sản phẩm : {{$dp->code}}</div>
           	<div>Chủng loại : {{$dp->name_sc}}</div>
           	<div>Kích thước : {{$dp->size}}</div>
           	<div>Màu sắc : {{$dp->color}}</div>
           	<div>Kiểu dáng : {{$dp->style}}</div>
           	<div>Trọng lượng : {{$dp->weight}}</div>
           	<div>Mô tả chi tiết : {{$dp->description}}</div>
        </div>
        @endforeach
        
    </div>
    <html>
      @foreach ($detailProduct as $dp)
      
      <body>

   
        <div id="fb-root"></div>
        

     
        <div class="fb-share-button" 
          data-href="{{url('detail-product/'$dp->id)}}" 
          data-layout="button_count">
        </div>

      </body>
      </html>
      @endforeach
@endsection
