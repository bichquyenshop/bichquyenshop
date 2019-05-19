@extends('fontend.layout.master')
@section('content')
<div class="row">
    <div id="new_product">
    	 <div class="row a">
    	 	@foreach ($listProduct as $lp)
	    	
            <div class="col-md-3 box">
            	<a href="{{ url('detail-product/' . $lp->id) }} ">		
	                <div class="product">
			    		<div class="image_box">
			    			<img src="{{url($lp->image)}}">
			    		</div>
			    		<div class="content_box">
				    		<div class="title">
				    			{{$lp->name}}
				    		</div>
				    		<div class="code">
				    			{{$lp->code}}
				    		</div>
				    	</div>
			    	</div>
		    	</a>
            </div> 
        	<!-- </a> -->
            @endforeach 
            
        </div>
        <div style="text-align: center;margin-top:20px">
		  	<div class="text"></div>
		  	<input type="hidden" name="sub_cate_id" value= "{{$idSubCate}}">
		  	<input type="hidden" name="offset" value="0">
		  	<button type="button" class="btn btn-primary load_more">XEM TIẾP</button>
		 
		  </div>
    </div>
</div>
	
<script>
$( document ).ready(function() {
	$('.load_more').click(function(){
		var offset = parseInt($('input[name="offset"]').val()) + 4;
		var loadMore = 1 //Nếu loadMore = 1 thì sẽ render view loadMore 
		var idSubCate = $('input[name="sub_cate_id"]').val()
		$.ajax({
	        type: "GET",
	        url: '{{route("product-sub-category-load-more")}}',
	        data: {idSubCate:idSubCate,offset:offset,loadMore:loadMore},
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
