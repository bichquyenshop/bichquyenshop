@extends('fontend.layout.master')

@section('title', 'Page Title')


@section('content')

<div class="row">
	<div class="col-md-12">
	    <div id="introduction">
	    	<div class="title">
	    	
	    		<span>Giới Thiệu</span>
	    		
	    	</div>
	    	<div class="content">
	    		@foreach ($setting as $st)
	    			{{$st->description}}
	    		@endforeach

	          	 
	    	</div>
	    </div>
	</div>
</div>
<div class="row">
    <div id="new_product">
    	 <div class="row">
    	 	@foreach ($product as $pd)
	    	
            <div class="col-md-3 box">
            	<a href="{{ url('detail-product/' . $pd->id) }} ">		
	                <div class="product">
			    		<div class="image_box">
			    			<img src="{{url($pd->image)}}">
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
        	<!-- </a> -->
            @endforeach 
            
        </div>
    </div>
</div>
@endsection
