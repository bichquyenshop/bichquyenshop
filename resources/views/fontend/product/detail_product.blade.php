@extends('fontend.layout.master')
@section('content')
  @section('title', 'Chi Tiết Sản Phẩm')
  @foreach ($detailProduct as $dp)


  
  <meta property="og:url" content="{{ url('detail-product/' . $dp->id) }}" />
  <meta property="og:type" content="Detail Product" />
  <meta property="og:title" content="{{$dp->name}}" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="{{url($dp->image)}}" />
      
  @endforeach
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
            <span id="fb-root"></span>
        

     
            <span class="fb-share-button" 

              data-href="{{ ('http://bichquyenjewelry.com/detail-product/' . $dp->id) }}" 
              data-layout="button_count">
            </span>
        </div>

        @endforeach
        
    </div>

      
@endsection
