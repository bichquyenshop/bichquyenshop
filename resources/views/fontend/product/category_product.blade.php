@extends('fontend.layout.master')
@section('content')
<div class="row">
    <div id="new_product">
    	<div class="detail_content">
		    <h3 class="tde">
		          <span>Sản Phẩm {{$categoryDetail['name']}}</span>
		    </h3> 
		    <hr>
		 </div>
    	 <div class="row a">
    	 	@foreach ($listProduct as $lp)
	    	
            <div class="col-md-3 box">
            	<a href="{{ url('detail-product/' . $lp->id) }} ">		
	                <div class="product">
			    		<div class="image_box">
			    			<!-- <img src="{{url($lp->image)}}"> -->
			    			<img style="height:265px" src="{{!empty($lp->image) ? url($lp->image) : url('image/product/default.jpg') }}">
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
		  	<input type="hidden" name="cate_id" value= "{{$idCate}}">
		  	<input type="hidden" name="offset" value="0">
		  	<button type="button" class="btn btn-success load_more">XEM TIẾP</button>
		 
		  </div>
    </div>
</div>
	
<script>
$( document ).ready(function() {
	$('.load_more').click(function(){
		var offset = parseInt($('input[name="offset"]').val()) + 4;
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
