
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
    <li class="breadcrumb-item"><a href="{{ route('collection.index') }}">Collection List</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['collection.update', $collection->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit A Collectiona </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $collection->name }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('desc') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Description"
	                    b-placeholder="Description"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') ? old('desc') : $collection->desc }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-input>


	                <!-- Active -->
	                <bootstrap-select class="form-group-no-border {{ $errors->has('active') ? ' has-danger' : '' }}"
	                	use-label="true"
	                	label="Active?"
	                	b-err="{{ $errors->has('active') }}"
	                	b-error="{{ $errors->first('active') }}">
	                	
	                	<template slot="select">
	                		{{ Form::select('active',[1=>'Yes',0=>'No'],old('active'),['class'=>'custom-select col-12']) }}
	                	</template>
					</bootstrap-select>

	                 <!-- Status -->
	                <bootstrap-select class="form-group-no-border {{ $errors->has('status') ? ' has-danger' : '' }}"
	                	use-label="true"
	                	label="Status?"
	                	b-err="{{ $errors->has('status') }}"
	                	b-error="{{ $errors->first('status') }}">
	                	
	                	<template slot="select">
	                		{{ Form::select('status',[1=>'Active', 2 =>'Inactive', 3=> 'Pending', 4=> 'Refunded', 5 => 'Cancelled'],old('status'),['class'=>'custom-select col-12']) }}
	                	</template>
					</bootstrap-select>

		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('collection.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
		{!! Form::close() !!}
</div>
@endsection

