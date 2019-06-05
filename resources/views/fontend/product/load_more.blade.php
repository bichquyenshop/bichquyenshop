@foreach ($listProduct as $lp)
	    	
            <div class="col-md-3 box">
            	<a href="{{ url('detail-product/' . $lp->id) }} ">		
	                <div class="product">
			    		<div class="image_box">
			    			<img src="{{!empty($pd->image) ? url($pd->image) : url('image/product/default.jpg') }}">
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

        	
@endforeach 