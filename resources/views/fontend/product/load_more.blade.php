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