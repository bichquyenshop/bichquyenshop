<div class="container top-content">
	<div class="row">
	        <div class="col-md-12">
	            <div class="row">
	            	@foreach ($setting as $st)
                        <div class="col-md-3">
		                    <i class="fa fa-building"></i> <span>{{$st->address}}</span>
		                </div>
		                <div class="col-md-6">
		                    <i class="fa fa-envelope"></i><span>{{$st->email}}</span>
		                </div>
		                <div class="col-md-3 top-phone">
		                    <i class="fa fa-phone"></i></i><span>{{$st->tel}}</span> 
		                </div>
                    @endforeach
	            </div>
	        </div>
	    </div>
	            
	</div>
</div>
