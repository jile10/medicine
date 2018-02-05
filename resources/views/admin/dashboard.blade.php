@extends('admin/layouts/master')
@section('content')
<section class="forms"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
                  	<div class="card">
	                    <div class="card-header d-flex align-items-center">
	                      	<h3 class="h4">Sales</h3>
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			<canvas id="chart"></canvas>
	                    		</div>
	                    	</div>
	                    </div>
                  	</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="forms"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
                  	<div class="card">
	                    <div class="card-header d-flex align-items-center">
	                      	<h3 class="h4">Items low on stock</h3>
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			<table class="table table-striped" id="table">
				                        <thead>
				                          	<tr>
				                          		<th width="50%">Name</th>
				                          		<th width="25%">Stocks</th>
				                          		<th width="25%">Stock Last Added</th>
					                        </tr>	
				                        </thead>
				                        <tbody>
				                        	@foreach($items as $item)
				                        	<tr>
				                        		<td>{{$item->name}}</td>
				                        		<td>{{$item->stocks}}</td>
				                        		<td>{{$item->restocks->last()->created_at}}</td>
				                        	</tr>
				                        	@endforeach
				                        </tbody>
			                      	</table>
	                    		</div>
	                    	</div>
	                    </div>
                  	</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js')
<script type="text/javascript">
    $('#headtext').text('Dashboard');
    $('#dashboard').addClass(' active ');
    $('#table').DataTable();

</script>
<script>
var ctx = document.getElementById("chart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["January", "February", "March", "April", "May", "June","July","August","Septem","October","November","December"],
        datasets: [{
            label: 'Sales this year',
            data: [
		    	@foreach($sales as $sale)
		    		{{$sale}},
		    	@endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection