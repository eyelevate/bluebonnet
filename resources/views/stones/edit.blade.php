
@extends('layouts.themes.backend.layout')


@section('styles')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/stones/create.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('stone.index') }}">Stone Type</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['stone.update',$stone->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit Stone Type </template>
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

    					<!-- Price -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('price') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Price"
	                    b-placeholder="00.00"
	                    b-name="price"
	                    b-type="text"
	                    b-value="{{ old('price') ? old('price'): $stone->price }}"
	                    b-err="{{ $errors->has('price') }}"
	                    b-error="{{ $errors->first('price') }}"
	                    >
	                </bootstrap-input>

	                <bootstrap-select class="form-group-no-border {{ $errors->has('email') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Email"
	                    b-placeholder="Email"
	                    b-name="email"
	                    b-err="{{ $errors->has('email') }}"
	                    b-error="{{ $errors->first('email') }}"
	                    >
	                	<template slot="select">
	                		{{ Form::select('email',[0=>'No', 1=>'Yes'],old('email'),['class'=>'custom-select col-12']) }}
	                	</template>

	                </bootstrap-select>

	                </bootstrap-textarea>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('stone.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Update</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

