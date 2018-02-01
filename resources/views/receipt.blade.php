<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		.container{
			position: absolute;
			top: -20px;
			left: -35px;
			right: -35px;
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

		.table-text{
			font-size: 14px;
		}
		.right-text{
			text-align: right;
		}
		.left{
			float: left;
		}
		.right{
			float: right;
		}
		.clearfix{
			clear: both;
		}
		.footer{
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="heading">
			<h3 class="no-padding">MEDICINE POS</h3>
			<h5 class="no-padding sub-heading">Some Street zone 234 Manila City</h5>
			<h5 class="no-padding sub-heading">+639 261169912</h5>
		</div>
		<div class="body" style="text-align: center;">
			<h4 class="no-padding">Invoice</h4>
			<h5 class="no-padding sub-heading">Receipt No. : REC-{{str_pad($data['receipt_no'],'5','0',STR_PAD_LEFT)}}</h5>
			<table width="100%;" class="table-text">
				<thead>
					<tr>
						<th width="40%" >Item</th>
						<th width="20%">Quantity</th>
						<th width="20%" class="right-text">U. Price</th>
						<th width="20%" class="right-text">Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data['items'] as $item)
					<tr>
						<td>{{$item['name']}}</td>
						<td>{{$item['quantity']}}</td>
						<td class="right-text">{{$item['unit_price']}}</td>
						<td class="right-text">{{number_format($item['total'],2)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="footer">
			<div class="left" width="50%"><span>Total</span></div>
			<div class="right" width="50%"><span>{{number_format(collect($data['items'])->sum('total'),2)}}</span></div>
			<div class="clearfix"></div>
			<div class="left" width="50%"><span>Amount</span></div>
			<div class="right" width="50%"><span>{{number_format($data['amount'],2)}}</span></div>
			<div class="clearfix"></div>
			<div class="left" width="50%"><span>Change</span></div>
			<div class="right" width="50%"><span>{{number_format($data['amount'] - $data['items']->sum('total'),2)}}</span></div>
			<div class="clearfix"></div>
		</div>
	</div>
</body>
</html>