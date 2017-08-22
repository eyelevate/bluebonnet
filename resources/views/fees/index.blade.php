@extends('layouts.themes.backend.layout')

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>
@endsection
@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Fees</li>
</ol>
<div class="container-fluid">
	
	<bootstrap-card use-header="true" use-body="true" use-footer="true">
		<template slot="header">Fees</template>
		<template slot="body">
			<div class="table-responsive">
				<bootstrap-table
					title="Fees Results"
					:columns="{{ $columns }}"
					:rows="{{ $rows }}"
					:paginate="true"
					:global-search="true"
					:line-numbers="true"/>
				</bootstrap-table>
		    </div>
		</template>
		<template slot="footer">
			<a href="{{ route('fee.create') }}" class="btn btn-primary">Add Fee</a>
		</template>
	</bootstrap-card>
	
</div>
@endsection

@section('modals')
@if (count($rows) > 0)
	@foreach($rows as $row)
		<bootstrap-modal id="viewModal-{{ $row->id }}">
			<template slot="header">View Fee - {{ $row->name }}</template>
			<template slot="body">
				<!-- Name -->
				<bootstrap-readonly
					use-label="true"
					b-label="Name"
					use-input="true"
					b-value="{{ $row->name }}">	
				</bootstrap-readonly>
				<!-- Desc -->
				<bootstrap-readonly
					use-label="true"
					b-label="Description"
					use-textarea="true"
					b-value="{{ $row->desc }}">	
				</bootstrap-readonly>

				<!-- Subtotal -->
				<bootstrap-readonly
					use-label="true"
					b-label="Subtotal"
					use-input="true"
					b-value="{{ $row->subtotal }}">	
				</bootstrap-readonly>
				<!-- Taxable -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ ($row->taxable == TRUE) ? 'True' : 'False' }}"
					use-label="true"
					b-label="Taxable">	
				</bootstrap-readonly>
				
			</template>
			<template slot="footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">Delete</button>	
				<a href="{{ route('fee.edit',$row->id) }}" class="btn btn-primary">Edit</a>
			</template>
		</bootstrap-modal>
		{!! Form::open(['method'=>'delete','route'=>['fee.destroy',$row->id]]) !!}
		<bootstrap-modal id="deleteModal-{{ $row->id }}">
			<template slot="header">Delete Confirmation</template>
			<template slot="body">
				Are you sure you wish to delete {{ $row->name}}?
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