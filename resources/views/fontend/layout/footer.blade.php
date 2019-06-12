<div class="container">
	<div class="row">
		<div class="col-md-6">
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
			

			</div>
		</div>
		<div class="col-md-6">
			<div style='padding:10px;' class="info">
			    <table style="width: 100%">
			        <tr >
			        	@if($st->isFakeView == 0)
			        		<td>Tổng số lượt View : {{$viewAll}}</td>
			        	
			        	@else
			        		<td>Tổng số lượt View : {{$st->num_view}}</td>
			        	@endif
			        	
			            
			        </tr>
			        <tr>
			        	@if($st->isFakeDailyView == 0)
			        		<td>Tổng số lượt View trong ngày : {{$viewDate}}</td>
			        	
			        	@else
			        		<td>Tổng số lượt View trong ngày : {{$st->num_daily_view}}</td>
			        	@endif
			        </tr>
			        
			    </table>
			

			</div>
		</div>

	</div>
</div>