@extends('fontend.layout.master')
@section('content')
<div class="row">
    <div id="new_product">
		 <div class="title">
			<h3 class="title-comm">
				<span class="title-holder">
					{{$categoryDetail['name']}}
				</span>
			</h3>

		</div>
		@if(!empty($categoryDetail['description']))
			<div style="padding:10px;" class="content">
				{!! $categoryDetail['description'] !!}
			</div>
		@endif
    	 <div class="row a">
    	 	@foreach ($listProduct as $lp)

            <div class="col-md-3 box">
            	<a href="{{ url('detail-product/' . $lp->id) }} ">
	                <div class="product">
			    		<div class="image_box">
			    			<img src="{{!empty($lp->image) ? url($lp->image) : url('image/product/default.jpg') }}">
			    		</div>
			    		<div class="content_box">
							@if(empty($lp->name))
								<div class="title">
									-
								</div>
							@else
								<div class="title">
									{{$lp->name}}
								</div>
							@endif
							@if(empty($lp->code))
								<div class="code">
									-
								</div>
							@else
								<div class="code">
							
									{{$lp->code}}
								</div>
							@endif
							
							
						</div>
			    	</div>
		    	</a>
            </div>
        	<!-- </a> -->
            @endforeach
            
        </div>
        <div style="text-align: center;margin-top:20px">
		  	<div class="text"></div>
		  	<input type="hidden" name="cate_id" value= "{{$idCate}}">
		  	<input type="hidden" name="offset" value="0">
		  	<button type="button" class="btn btn-success load_more">XEM TIẾP</button>
		 
		  </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('js/readmore.js')}}"></script>

<script>
$( document ).ready(function() {
    $('.content').readmore({
        speed: 75,
        lessLink: '<a class="read" style="font-weight:bold" href="#">Đóng</a>',
        moreLink: '<a class="read" style="font-weight:bold" href="#">Xem tiếp</a>',
    });

	$('.load_more').click(function(){
		var offset = parseInt($('input[name="offset"]').val()) + 8;
		var loadMore = 1 //Nếu loadMore = 1 thì sẽ render view loadMore 
		var idCate = $('input[name="cate_id"]').val()
		$.ajax({
	        type: "GET",
	        url: '{{route("product-category-load-more")}}',
	        data: {idCate:idCate,offset:offset,loadMore:loadMore},
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        success: function (data) {
	        	if(data == ""){
	        		$( ".text" ).text("Đã hết sản phẩm bạn muốn tìm kiếm").fadeIn(5000);
	        		$('.load_more').attr('disabled','disabled');
	        	}
	        	else{
	        		$('input[name="offset"]').val(offset);
	          		$( ".a" ).append(data).fadeIn(5000);
	        	}
	        	
	        }
	    })
	})
})

</script>	
@endsection
