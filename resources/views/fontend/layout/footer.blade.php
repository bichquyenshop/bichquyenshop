<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style='padding:10px;' class="info">
			    <table style="width: 100%">
			        <tr >
			            <td style="width: 5%;" class="text-center"><i class="fa fa-map-marker-alt"></i></td>
			            <td>&nbsp;{{!empty($st->address) ? $st->address : ''}}</td>
			        </tr>
			        <tr>
			            <td  style="width: 5%;" class="text-center"><i class="fa fa-mobile"></i></td>
			            <td>&nbsp;{{!empty($st->tel) ? $st->tel : ''}}</td>
			        </tr>
			        <tr>
			            <td  style="width: 5%;" class="text-center" ><i class="fa fa-envelope"></i></td>
			            <td>&nbsp;{{!empty($st->email) ? $st->email : ''}}</td>
			        </tr>
			    </table>
					<!--<div>-->
				<!--	<span><i class="fa fa-map-marker-alt"></i> Địa chỉ: </span>-->
				<!--	<span>{{!empty($st->address) ? $st->address : ''}}</span>-->
				<!--</div>-->
				<!--<div>-->
				<!--	<span><i class="fa fa-mobile"></i> Điện thoại: </span>-->
				<!--	<span>{{!empty($st->tel) ? $st->tel : ''}}</span>-->
				<!--</div>-->
				<!--<div>-->
				<!--	<span><i class="fa fa-envelope"></i> Email: </span>-->
				<!--	<span>{{!empty($st->email) ? $st->email : ''}}</span>-->
				<!--</div>-->

			</div>
		</div>
	</div>
</div>