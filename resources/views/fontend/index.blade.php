@extends('fontend.layout.master')

@section('title', 'Trang chủ')
@section('keywords', 'Trang sức , vòng cẩm thạch')
@section('description','description')

<style>
	.more {
		overflow: hidden;
	}
</style>


@section('content')
@if(!empty($st->description))
	<div class="row">
		<div class="col-md-12">
			<div id="introduction">
				<div class="title">
					<h3 class="title-comm">
						<span class="title-holder">
						Giới Thiệu
						</span>
					</h3>

				</div>
				<div class="more">
					{!! $st->description !!}
					{{--{{ $st->description }}--}}

				</div>
			</div>
		</div>
	</div>
@endif

<div class="row">
    <div id="new_product" class="fadeInLeft animated">
    	<div>
    		<h3 class="title-comm">
				<span class="title-holder">
					Sản Phẩm mới
	    		</span>
    		</h3>
    	</div>
    	 <div class="row">

    	 	@foreach ($product as $pd)
            <div class="col-md-3 box">

            	<a href="{{ url('detail-product/' . $pd->id) }} ">
	                <div class="product">
			    		<div class="image_box">
			    			<img style="height:265px" src="{{!empty($pd->image) ? url($pd->image) : url('image/product/default.jpg') }}">
			    		</div>
			    		<div class="content_box">
				    		<div class="title">
				    			{{$pd->name}}
				    		</div>
				    		<div class="code">
				    			{{$pd->code}}
				    		</div>
				    	</div>
			    	</div>
		    	</a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
