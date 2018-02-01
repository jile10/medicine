<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.container{
			position: absolute;
			top: -10px;
			left: -20px;
			right: -20px;
		}
		.heading{
			font-weight: normal;
			text-align: center;
		}
		.sub-heading{
			font-weight: lighter;
		}
		.no-padding{
			padding: -8px;
		}
		.table{
			width: 100%;
			border-collapse: collapse;
			border: 1px solid black;
		}
		.table thead{
			border:1px solid black;
			border-bottom: 1px solid black !important;
		}
		.table tbody tr td{
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}
		.padding-2{
			padding: 15px 10px;
		}
		.padding-1{
			padding: 10px 10px;
		}
		.right-text{
			text-align: right;
		}
		.center-text{
			text-align: center;
		}
		.double{
			border-top: 2px solid black !important;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="heading">
			<h2 class="no-padding">MEDICINE POS</h2>
			<h4 class="no-padding sub-heading">Some Street zone 234 Manila City</h4>
			<h4 class="no-padding sub-heading">+639 261169912</h4>
		</div>
		<div class="body">
			<div class="heading">
				<h3 class="no-padding">{{$var['frequency']}} Sales Report</h3>
				<h4 class="no-padding sub-heading">{{$var['value']}}</h4>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th width="25%" class="padding-2">Invoice No.</th>
						<th width="25%" class="padding-2 right-text">Amount</th>
						<th width="25%" class="padding-2 right-text">Change</th>
						<th width="25%" class="padding-2">Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $data)
					<tr>
						<td class="padding-1">REC-{{str_pad($data->id,'5','0',STR_PAD_LEFT)}}</td>
						<td class="right-text padding-1" >{{number_format($data->amount,2)}}</td>
						<td class="right-text padding-1">{{number_format($data->amount_change,2)}}</td>
						<td class="padding-1">{{Carbon\Carbon::parse($data->created_at)->format('F d, Y')}}</td>
					</tr>
					@endforeach
					<tr>
						<td class="padding-1 right-text double" colspan="4">Total: {{number_format($data->sum('amount') - $data->sum('amount_change'),2)}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>