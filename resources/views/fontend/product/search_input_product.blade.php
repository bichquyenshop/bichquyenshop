@foreach ($listProduct as $lp)
<div class="col-md-12 box">
	<a href="{{ url('detail-product/' . $lp->id) }} ">		
        <div class="product">
    		<div class="image_box d-inline">
    			
    			<img src="{{url($lp->image)}}">
    		</div>
    		<div class="content_box d-inline-block">
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