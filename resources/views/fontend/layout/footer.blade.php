<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="info">
				@foreach ($setting as $st)
	    			<div>
	    				<span>Địa chỉ : </span>
	    				<span>{{$st->address}}</span>
	    			</div>
					<div>
						<span>Điện thoại :</span>
						<span>{{$st->tel}}</span>
					</div>
					<div>
						<span>Email :</span>
						<span>{{$st->email}}</span>
					</div>
	    		@endforeach
				
			</div>
		</div>
	</div>
</div>