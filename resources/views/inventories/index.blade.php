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
    <li class="breadcrumb-item active">Inventories </li>
</ol>
<div class="container-fluid">
	
	<bootstrap-card use-header="true" use-body="true" use-footer="true">
		<template slot="header">
			<ul class="nav nav-pills card-header-pills">
			@if(count($inventories))
				@foreach($inventories as $key => $inventory)
				<li class="nav-item">
					<a class="nav-link {{ ($key == 0) ? 'active' :  '' }}" href="#item-{{ $inventory->id }}" data-toggle="tab" role="tab">{{ $inventory->name }}</a>
				</li>
				@endforeach
			@endif
				
			</ul>
		</template>
		<template slot="body">
		<div class="tab-content">
		@if(count($rows))
			@foreach($rows as $k => $v)
			<div class="tab-pane {{ ($k == 0) ? 'active' :  '' }}" id="item-{{ $v->id }}" role="tabpanel">
				<div class="table-responsive">
					<bootstrap-table
						:columns="{{ $columns }}"
						:rows="{{ $v->inventoryItems }}"
						:paginate="true"
						:global-search="true"
						:line-numbers="true"/>
					</bootstrap-table>
					<hr/>
		    		<a href="{{ route('inventory_item.create',$v->id) }}" class="btn btn-success btn-block">Add {{ $v->name }}</a>
			    </div>
			</div>
			@endforeach
		@endif	
		</div>
		
		</template>

		<template slot="footer">
			<a href="{{ route('inventory.create') }}" class="btn btn-primary">Add Inventory</a>
		</template>
	</bootstrap-card>
	
</div>
@endsection

@section('modals')

@endsection

@section('variables')
@endsection
