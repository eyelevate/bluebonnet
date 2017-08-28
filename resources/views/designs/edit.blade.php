
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
    <li class="breadcrumb-item"><a href="{{ route('design.index') }}">Design</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['design.update',$design->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit Design</template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $stone->name }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-textarea class="form-group-no-border {{ $errors->has('desc') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Description (optional)"
	                    b-placeholder="Description of stone type"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') ? old('desc') : $stone->desc }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >

    					<!-- Prototype -->
	                <bootstrap-select class="form-group-no-border {{ $errors->has('prototype') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Prototype"
	                    b-placeholder="Prototype"
	                    b-name="prototype"
	                    b-err="{{ $errors->has('prototype') }}"
	                    b-error="{{ $errors->first('prototype') }}"
	                    >
	                	<template slot="select">
	                		{{ Form::select('prototype',[0=>'No', 1=>'Yes'],old('prototype'),['class'=>'custom-select col-12']) }}
	                	</template>

	                </bootstrap-select>

	                </bootstrap-textarea>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('design.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Update</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

