@extends('fontend.layout.master')

@section('title', 'Trang chủ')
@section('keywords', 'Trang sức , vòng cẩm thạch')
@section('description','description')




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
					<div class="content">
						{!! $st->description !!} 
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
					<div class="col-md-4 col-xl-3 box">

						<a href="{{ url('detail-product/' . $pd->id) }} ">
							<div class="product">
								<div class="image_box">
									<img style="height:265px" src="{{!empty($pd->image) ? url($pd->image) : url('image/product/default.jpg') }}">
								</div>
								<div class="content_box">
									@if(empty($pd->name))
										<div class="title">
											-
										</div>
									@else
										<div class="title">
											{{$pd->name}}
										</div>
									@endif
									@if(empty($pd->code))
										<div class="code">
											-
										</div>
									@else
										<div class="code">
									
											{{$pd->code}}
										</div>
									@endif
									
									
								</div>
							</div>
						</a>
					</div>
				@endforeach

				
			</div>
			<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4" style="padding:10px;text-align: right">
								{{ $product->links() }}
							</div>
						</div>
					</div>
					
				</div>
		</div>
	</div>

	<style>
		.text{
			margin-left:10px;
		}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('js/readmore.js')}}"></script>
	<script>
        $(document).ready(function() {
        	$('.content').readmore({
				  speed: 75,
				  lessLink: '<a style="font-weight:bold" href="#">Đóng</a>',
				  moreLink: '<a style="font-weight:bold" href="#">Xem tiếp</a>',			});
         })
	</script>
@endsection
