@extends('layouts.themes.backend.layout')

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/collections/set.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('collection.index') }}">Collections</a></li>
    <li class="breadcrumb-item active">Set Items </li>
</ol>
<div class="container-fluid">
	<div class="jumbotron">
	<h1 class="display-3">{{ $collection->name }}</h1>
		<p class="lead">{{ $collection->desc }}</p>
		<hr class="my-4">
		<p>Select from the following inventory groups below to display corresponding inventory item content.</p>
		<bootstrap-select>
			<template slot="select">
				{{ Form::select('inventory',$inventory_select,'',['class'=>'form-control','style'=>'font-size:21px;','v-on:change'=>'setInventory($event)']) }}
			</template>
		</bootstrap-select>
	</div>
	@if (count($inventories)>0)
		@foreach($inventories as $inventory)
		<div class="row-fluid" v-if="inventory_id === '{{ $inventory->id }}'">
			@if(count($inventory) > 0)
				@foreach($inventory->inventoryItems as $inventory_item)
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">			
					<bootstrap-card
						use-header="true"
						use-img-top="true"
						img-top-src="{{ asset($inventory_item->primary_src) }}"
						use-body="true"
						use-footer="true"
					>
						<template slot="header">{{ $inventory_item->name }}</template>
						<template slot="body">
							<p>{{ $inventory_item->desc }}</p>
						</template>
						<template slot="footer">
							<button class="btn btn-sm btn-danger" type="button">Remove</button>
							<button class="btn btn-sm btn-success" type="button">Set</button>
						</template>
						
					</bootstrap-card>
				</div>
				@endforeach
			@endif
		</div>

		@endforeach

	@endif

	
</div>
@endsection

@section('modals')

@endsection
@section('variables')
@endsection