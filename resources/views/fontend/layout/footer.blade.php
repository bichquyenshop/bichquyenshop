<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="info">
				<div>
					<span><i class="fa fa-map-marker-alt"></i> Địa chỉ : </span>
					<span>{{!empty($st->address) ? $st->address : ''}}</span>
				</div>
				<div>
					<span><i class="fa fa-mobile"></i> Điện thoại :</span>
					<span>{{!empty($st->tel) ? $st->tel : ''}}</span>
				</div>
				<div>
					<span><i class="fa fa-envelope"></i> Email :</span>
					<span>{{!empty($st->email) ? $st->email : ''}}</span>
				</div>

			</div>
		</div>
	</div>
</div>