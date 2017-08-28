
@extends('layouts.themes.backend.layout')

@section('styles')
@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/stone_sizes/create.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('stone_size.index') }}">Stone Size</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'post','route'=>['stone_size.store']]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Create A Stone Size </template>
			<template slot = "body">
	            <div class="content">


	            	
	            	<!-- Size ID -->
	                <bootstrap-select class="form-group-no-border {{ $errors->has('size_id') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "User"
	                    b-err="{{ $errors->has('size_id') }}"
	                    b-error="{{ $errors->first('size_id') }}"
	                    >
	                    <template slot="select">
	                    	<div class="input-group">
	                    		{{ Form::text('size_display',old('size_display') ? old('size_display') : $size->size_id.' ('$size->size.' '.$size->name')',['id'=>'size_display','class'=>'form-control','readonly'=>'true','style'=>'background-color:#ffffff;']) }}
	                    		<span class="input-group-btn">
									<button id="searchSizes" class="btn btn-secondary" type="button" data-toggle="modal" data-target="#sizeModal">Select Size</button>
								</span>
	                    	</div>
	                    	{{ Form::hidden('size_id',old('size_id') ? old('size_id') : $size->size_id,['id'=>'size-id-hidden-input']) }}
	                    </template>
	                    >
	                </bootstrap-select>



					<!-- Price -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('price') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Price"
	                    b-placeholder="00.00"
	                    b-name="price"
	                    b-type="text"
	                    b-value="{{ old('price') }}"
	                    b-err="{{ $errors->has('price') }}"
	                    b-error="{{ $errors->first('price') }}"
	                    >
	                </bootstrap-input>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('stone_size.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

