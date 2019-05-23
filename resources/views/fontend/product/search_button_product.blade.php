@extends('fontend.layout.master')
@section('content')

<div class="detail_content">
    <h3 class="tde">
          <span>Kết quả tìm kiếm sản phẩm : {{$stringSearch}}</span>
    </h3> 
    <hr>
</div>
	

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

        	
            @endforeach 

            
        </div>
        
    </div>
</div>
  <div style="text-align: center;margin-top:20px">
  	<div class="text"></div>
  	<input type="hidden" name="offset" value="0">
  	<button type="button"class="btn btn-success load_more">XEM TIẾP</button>
 
  </div>
<script>
$( document ).ready(function() {
    if($('#new_product').hasClass('box') == true){
        $('.load_more').fadeOut();
    }
    
	$('.load_more').click(function(){
		var offset = parseInt($('input[name="offset"]').val()) + 4;
		var urlParams = new URLSearchParams(window.location.search);
		var stringSearch = urlParams.get('stringSearch');
		var loadMore = 1 //Nếu loadMore = 1 thì sẽ render view loadMore 
		$.ajax({
            type: "GET",
            url: '{{route("searchButtonProduct")}}',
            data: {stringSearch: stringSearch,offset:offset,loadMore:loadMore},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
            	if(data == ""){
            		$( ".text" ).text("Đã hết sản phẩm bạn muốn tìm kiếm").fadeIn(5000);
            		$('#load_more').attr('disabled','disabled');
            	}
            	else{
            		$('input[name="offset"]').val(offset);
              		$( ".a" ).append(data).fadeIn(5000);
            	}
            	
            }
        });
	})
  
	
	
	
})

</script>  
@endsection

