<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="info">
				@foreach ($setting as $st)
	    			<div>
	    				<span><i class="fa fa-map-marker-alt"></i> Địa chỉ : </span>
	    				<span>{{$st->address}}</span>
	    			</div>
					<div>
						<span><i class="fa fa-mobile"></i> Điện thoại :</span>
						<span>{{$st->tel}}</span>
					</div>
					<div>
						<span><i class="fa fa-envelope"></i> Email :</span>
						<span>{{$st->email}}</span>
					</div>
	    		@endforeach
				
			</div>
		</div>
	</div>
</div>