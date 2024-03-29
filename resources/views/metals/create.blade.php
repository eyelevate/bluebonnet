
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
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'post','route'=>['metal.store']]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Create A Metal Type </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-textarea class="form-group-no-border {{ $errors->has('desc') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Description"
	                    b-placeholder="Description"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-textarea>

					<!-- Price -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('price') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "+ Price"
	                    b-placeholder="0.00"
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
				<a href="{{ route('metal.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

