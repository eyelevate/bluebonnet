
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
    <li class="breadcrumb-item"><a href="{{ route('finger.index') }}">Finger Size</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'post','route'=>['finger.store']]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Create A Finger Size </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Size -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('size') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Size"
	                    b-placeholder="Size"
	                    b-name="size"
	                    b-type="text"
	                    b-value="{{ old('size') }}"
	                    b-err="{{ $errors->has('size') }}"
	                    b-error="{{ $errors->first('size') }}"
	                    >
	                </bootstrap-input>

					<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Unit"
	                    b-placeholder="E.g. 4 1/4 (2-1/4 in. || 60mm)"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('finger.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

