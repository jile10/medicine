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
				<h3 class="no-padding">Inventory Report</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th width="10%" class="padding-2">No</th>
						<th width="40%" class="padding-2 ">Item</th>
						<th width="25%" class="padding-2 ">Stocks</th>
						<th width="25%" class="padding-2">Date of last added Stock</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key => $data)
					<tr>
						<td class="padding-1">{{$key+1}}</td>
						<td class="padding-1">{{$data->name}}</td>
						<td class="padding-1">{{$data->stocks}}</td>
						<td class="padding-1">{{Carbon\Carbon::parse($data->restocks->last()->created_at)->format('F d,Y g:i:s A')}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>