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
					<div class="content more">
						{{$st->description}}
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

	<style>
		.text{
			margin-left:10px;
		}
	</style>
	<script>
        $(document).ready(function() {
            var showChar = 1000;

            $('.more').each(function() {
                var content = $('#introduction .content').text();
                var c = content.substr(0, showChar); // 700 kí tự
                var h = content.substr(showChar-1, content.length - showChar); // số kí tự còn lại
                var firstContent = '<span class="more">' + c + '</span><span class="less">'+ h +'</span><span class="text"></span>';

                if(content.length > showChar) {
                    $(this).html(firstContent);
                    $('.less').css('display','none');

                }


            });
            if($('.less').is(':visible')){
                $('.text').html('<button class="btn btn-success">Xem ít hơn</button>')
            }
            else{

                $('.text').html('<button class="btn btn-success">Xem nhiều hơn</button>')
            }
            $('.text').click(function(){
                if($('.less').is(':visible')){
                    $('.text').html('<button class="btn btn-success">Xem nhiều hơn</button>')
                }
                else{
                    $('.text').html('<button class="btn btn-success">Xem ít hơn</button>')
                }
                $('.less').fadeToggle();
            })
        });
	</script>
@endsection
