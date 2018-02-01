@extends('admin/layouts/master')
@section('css')
<style type="text/css">
	.button{
		margin-bottom: 30px;
	}
</style>
@endsection
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
	<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
		  <li class="breadcrumb-item">Maintenance</li>
		  <li class="breadcrumb-item active">Item-Category</li>
	</ul>
</div>
<section class="forms"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
                  	<div class="card">
	                    <div class="card-header d-flex align-items-center">
	                      	<h3 class="h4">Item Category</h3>
	                    </div>
	                    <div class="card-body">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			<div class="pull-right button">
			                    		<button class="btn btn-primary mr-1"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&ensp;New Item Category</button>
			                    	</div>
	                    		</div>
		                    	<div class="col-md-12">
			                      	<table class="table table-striped" id="table">
				                        <thead>
				                          	<tr>
				                          		<th width="25%">Name</th>
				                          		<th width="40%">Description</th>
				                          		<th width="20%">Item Type</th>
				                          		<th width="15%">Actions</th>
					                        </tr>	
				                        </thead>
				                        <tbody>
				                        	@foreach($categories as $category)
					                        <tr>
					                        	<td>{{$category->name}}</td>
					                        	<td>{{$category->description}}</td>
					                        	<td>{{$category->itemtype->name}}</td>
					                        	<td>
					                        		<button class="btn btn-info butt" onclick="updateClicked({{$category->id}}		)" data-toggle="modal" data-target="#updateModal" title="Update"><i class="fas fa-pencil-alt"></i></button>
					                        		<button class="btn btn-danger butt" onclick="removeClicked({{$category->id}})"  data-toggle="modal" data-target="#removeModal" title="Delete"><i class="fa fa-trash"></i></button>
					                        	</td>
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

<!-- New Modal -->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item-category/insert" method="post">
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">New Item Type</h4>
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		            <div class="form-group row">
					  	<label for="example-text-input" class="col-3 col-form-label">Item Type<font color="red">*</font></label>
					  	<div class="col-8">
					    	<select class="form-control" name="itemtype_id">
					    		@foreach($types as $type)
					    			<option value="{{$type->id}}">{{$type->name}}</option>
					    		@endforeach
					    	</select>
					  	</div>
					</div>
		            <div class="form-group row">
					  	<label for="example-text-input" class="col-3 col-form-label">Name<font color="red">*</font></label>
					  	<div class="col-8">
					    	<input class="form-control" type="text" name="name">
					  	</div>
					</div>
					<div class="form-group row">
					  	<label for="example-search-input" class="col-3 col-form-label">Description</label>
					  	<div class="col-8">
					    	<textarea class="form-control" name="description"></textarea>
					  	</div>
					</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Save</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>

<!-- Update Modal -->
<div id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item-category/update" method="post">
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">Update Item Category</h4>
		          <input type="hidden" id="id" name="id">
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group row">
					  	<label for="example-text-input" class="col-3 col-form-label">Item Type<font color="red">*</font></label>
					  	<div class="col-8">
					    	<select class="form-control" name="itemtype_id">
					    		@foreach($types as $type)
					    			<option id="select{{$type->id}}" value="{{$type->id}}">{{$type->name}}</option>
					    		@endforeach
					    	</select>
					  	</div>
					</div>
		            <div class="form-group row">
					  	<label for="example-text-input" class="col-3 col-form-label">Name<font color="red">*</font></label>
					  	<div class="col-8">
					    	<input id="name" class="form-control" type="text" name="name">
					  	</div>
					</div>
					<div class="form-group row">
					  	<label for="example-search-input" class="col-3 col-form-label">Description</label>
					  	<div class="col-8">
					    	<textarea id="description" class="form-control" name="description"></textarea>
					  	</div>
					</div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Save</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>

<!-- Remove Modal -->
<div id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
     	<div class="modal-content">
          	<form action="/item-category/delete" method="post">
          		{{csrf_field()}}
		        <div class="modal-header">
		          <h4 id="exampleModalLabel" class="modal-title">New Item Type</h4>
		          <input type="hidden" id="delete_id" name="id">
		          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
		        </div>
		        <div class="modal-body">
			        <h3 class="h4">Are you sure you want to remove <em id="text"></em></h3>
		        </div>
		        <div class="modal-footer">
		          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		          <button type="submit" class="btn btn-primary">Continue</button>
		        </div>
          	</form>
      	</div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="/pages/item-category/app.js"></script>
<script type="text/javascript">
    $('#headtext').text('Maintenance');
    $('#maintenance').attr('aria-expanded','true');
    $('#maintenance').addClass(' collapse ');
    $('#item-category').addClass(' active ');
    $('#dropdownMaintenance').addClass(' show ');
    $('#table').DataTable();
</script>
@endsection