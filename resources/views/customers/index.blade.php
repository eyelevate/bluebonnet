@extends('layouts.themes.backend.layout')
@section('styles')
@endsection


@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Customer</li>
</ol>
<div class="container-fluid" style="padding-top:25px;">
	
		<bootstrap-card use-header="true" use-body="true" use-footer="true">
			<template slot="header">Customer Search Results</template>
			<template slot="body">
				<div class="table-responsive">
					<bootstrap-table
						title=""
						:columns="{{ $columns }}"
						:rows="{{ $rows }}"
						:paginate="true"
						:global-search="true"
						:line-numbers="true"/>
					</bootstrap-table>
			    </div>
			</template>
			<template slot="footer">
				<a href="{{ route('customer.create') }}" class="btn btn-primary">Add Customer</a>
			</template>
		</bootstrap-card>
	
</div>
@endsection

@section('modals')
@if (count($rows) > 0)
	@foreach($rows as $row)
		<bootstrap-modal id="viewModal-{{ $row->id }}">
			<template slot="header">View Customer Details - {{ $row->email }}</template>
			<template slot="body">
				<!-- First Name -->
				<div class="form-group">
			        <label>First Name</label>
			        <div class="input-group" >
			            <input type="text" readonly="true" class="form-control" value="{{ $row->first_name }}" style="background-color:#ffffff;"/>
			            
			        </div>
				</div>

				<!-- Last Name -->
				<div class = "form-group">
			        <label>Last Name</label>
			        <div class="input-group" >
			            <textarea type="text" readonly="true" class="form-control" style="background-color:#ffffff;">{{ $row->last_name }}</textarea>
			            
			        </div>
				</div>

				<!-- Phone -->
				<div class = "form-group">
			        <label>Phone</label>
			        <div class="input-group" >
			            <textarea type="text" readonly="true" class="form-control" style="background-color:#ffffff;">{{ $row->phone }}</textarea>
			            
			        </div>
				</div>
				<!-- Email -->
				<div class = "form-group">
			        <label>Email</label>
			        <div class="input-group" >
			            <textarea type="text" readonly="true" class="form-control" style="background-color:#ffffff;">{{ $row->email }}</textarea>
			            
			        </div>
				</div>
				
			</template>
			<template slot="footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">Delete</button>	
				<a href="{{ route('customer.edit',$row->id) }}" class="btn btn-primary">Edit</a>
			</template>
		</bootstrap-modal>
		{!! Form::open(['method'=>'delete','route'=>['customer.destroy',$row->id]]) !!}
		<bootstrap-modal id="deleteModal-{{ $row->id }}">
			<template slot="header">Delete Confirmation</template>
			<template slot="body">
				Are you sure you wish to delete {{ $row->email }}?
			</template>
			<template slot="footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger">Delete</button>	
			</template>
		</bootstrap-modal>
		{!! Form::close() !!}
	@endforeach
@endif
@endsection





@section('variables')
@endsection