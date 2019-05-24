<div class="container top-content">
	<div class="row">
	        <div class="col-md-12">
	            <div class="row">
					<div class="col-md-3">
						<i class="fa fa-building"></i> <span>{{!empty($st->address) ? $st->address : ''}}</span>
					</div>
					<div class="col-md-6">
						<i class="fa fa-envelope"></i><span>{{!empty($st->email) ? $st->email : ''}}</span>
					</div>
					<div class="col-md-3 top-phone">
						<i class="fa fa-phone"></i></i><span>{{!empty($st->tel) ? $st->tel : ''}}</span>
					</div>
	            </div>
	        </div>
	    </div>
	            
	</div>
</div>
