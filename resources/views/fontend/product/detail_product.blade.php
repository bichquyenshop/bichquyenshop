@extends('fontend.layout.master')
@section('content')

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

@endsection
