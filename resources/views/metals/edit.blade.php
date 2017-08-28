
@extends('layouts.themes.backend.layout')


@section('styles')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/metals/create.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('metal.index') }}">Metal Type</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['metal.update',$metal->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit Metal Type </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $metal->name }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-textarea class="form-group-no-border {{ $errors->has('desc') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Description (optional)"
	                    b-placeholder="Description of metal type"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') ? old('desc') : $metal->desc }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-textarea>

	                <bootstrap-input class="form-group-no-border {{ $errors->has('price') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Price"
	                    b-placeholder="00.00"
	                    b-name="price"
	                    b-type="text"
	                    b-value="{{ old('price') ? old('price') : $metal->price }}"
	                    b-err="{{ $errors->has('price') }}"
	                    b-error="{{ $errors->first('price') }}"
	                    >
	                </bootstrap-input>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('metal.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Update</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

