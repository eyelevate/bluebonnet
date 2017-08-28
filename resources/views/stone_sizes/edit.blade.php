
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
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['stone_size.update',$stone_size->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit Stone Type </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Size -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('size') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Size"
	                    b-placeholder="Size"
	                    b-name="size"
	                    b-type="text"
	                    b-value="{{ old('size') ? old('size') : $stone_size->size }}"
	                    b-err="{{ $errors->has('size') }}"
	                    b-error="{{ $errors->first('size') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $stone_size->name }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('stone_size.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Update</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

