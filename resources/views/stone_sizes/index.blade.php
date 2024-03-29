@extends('layouts.themes.backend.layout')

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/admins/index.js') }}"></script>
@endsection


@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Stone Size</li>
</ol>
<div class="container-fluid">
	
	<bootstrap-card use-header="true" use-body="true" use-footer="true">
		<template slot="header">Stone Size Type</template>
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
			<a href="{{ route('stone_size.create') }}" class="btn btn-primary">Add Stone Size</a>
			{{-- <a href="{{ route('service_item.index') }}" class="btn btn-secondary">Manage Service Items</a> --}}
		</template>
	</bootstrap-card>
	
</div>
@endsection


@section('modals')
@if (count($rows) > 0)
	@foreach($rows as $row)
		<bootstrap-modal id="viewModal-{{ $row->id }}" b-size="modal-lg">
			<template slot="header">View Stone Size - {{ $row->size }}</template>
			<template slot="body">
				<!-- Size id -->
				<bootstrap-readonly
					use-input="true"
					b-value="{{ $row->size_id }}"
					use-label="true"
					b-label="Size">	
				</bootstrap-readonly>

				<!-- Stone id -->
				<bootstrap-readonly
					use-textarea="true"
					b-value="{{ $row->stone_id }}"
					use-label="true"
					b-label="Name">
				</bootstrap-readonly>

				<!-- Price  -->
				<bootstrap-readonly
					use-textarea="true"
					b-value="{{ $row->price }}"
					use-label="true"
					b-label="Name">
				</bootstrap-readonly>


			</template>
			
			<template slot="footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">Delete</button>	
				<a href="{{ route('stone_size.edit',$row->id) }}" class="btn btn-primary">Edit</a>
			</template>
		</bootstrap-modal>

		{!! Form::open(['method'=>'delete','route'=>['stone_size.destroy',$row->id]]) !!}
		<bootstrap-modal id="deleteModal-{{ $row->id }}">
			<template slot="header">Delete Confirmation</template>
			<template slot="body">
				Are you sure you wish to delete {{ $row->name }}?
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