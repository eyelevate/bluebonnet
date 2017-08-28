@extends('layouts.themes.backend.layout')

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Collections </li>
</ol>
<div class="container-fluid">
	
	<bootstrap-card use-header="true" use-body="true" use-footer="true">
		<template slot="header">Collection Search Results</template>
		<template slot="body">
			<div class="table-responsive">
				<bootstrap-table
					:columns="{{ $columns }}"
					:rows="{{ $rows }}"
					:paginate="true"
					:global-search="true"
					:line-numbers="true"/>
				</bootstrap-table>
		    </div>
		</template>

		<template slot="footer">
			<a href="{{ route('collection.create') }}" class="btn btn-primary">Add Collection</a>
		</template>
	</bootstrap-card>
	
</div>
@endsection

@section('modals')
@if (count($rows) > 0)
	@foreach($rows as $row)
		<bootstrap-modal id="viewModal-{{ $row->id }}" b-size="modal-lg">
			<template slot="header">View Collection - {{ $row->name }}</template>
			<template slot="body">
				<!-- Name -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ $row->name }}"
					use-label="true"
					b-label="Name">	
				</bootstrap-readonly>
			
				<!-- Description -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ $row->desc }}"
					use-label="true"
					b-label="Description">	
				</bootstrap-readonly>

				<!-- Active -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ ($row->active == TRUE) ? 'True' : 'False' }}"
					use-label="true"
					b-label="active">	
				</bootstrap-readonly>

				<!-- Status -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ $row->status }}"
					use-label="true"
					b-label="status">	
				</bootstrap-readonly>				

				
			</template>
			<template slot="footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">Delete</button>	
				<a href="{{ route('collection.edit',$row->id) }}" class="btn btn-primary">Edit</a>
			</template>
		</bootstrap-modal>

		{!! Form::open(['method'=>'delete','route'=>['collection.destroy',$row->id]]) !!}
		
		<bootstrap-modal id="deleteModal-{{ $row->id }}">
			<template slot="header">Delete Confirmation</template>
			<template slot="body">
				Are you sure you wish to delete {{ $row->full_name }}?
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