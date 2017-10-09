
@extends('layouts.themes.backend.layout')


@section('styles')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/sizes/create.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('size.index') }}">Stone Size</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['size.update',$size->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Edit Stone Size</template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Carat -->
	                <bootstrap-control class="form-group-no-border {{ $errors->has('carat') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Carat"
	                    >
	                    <template slot="control">
	                    	<input type="text" class="form-control" name="carat" value="{{ old('carat') ? old('carat') : $size->carat }}">
	                    	@if ($errors->has('carat'))
	                    	<div class="form-control-feedback">{{ $errors->first('carat') }}</div>
	                    	@endif
	                    </template>
	                </bootstrap-control>

	            	<!-- Size -->
	                <bootstrap-control class="form-group-no-border {{ $errors->has('size') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Size in millimeters"
	                    >
	                    <template slot="control">
	                    	<input type="text" class="form-control" name="size" value="{{ old('size') ? old('size') : $size->size }}">
	                    	@if ($errors->has('size'))
	                    	<div class="form-control-feedback">{{ $errors->first('size') }}</div>
	                    	@endif
	                    </template>
	                </bootstrap-control>

					<!-- Description -->
					<bootstrap-control class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    >
	                    <template slot="control">
	                    	<input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $size->name }}">
	                    	@if ($errors->has('name'))
	                    	<div class="form-control-feedback">{{ $errors->first('name') }}</div>
	                    	@endif
	                    </template>
	                </bootstrap-control>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('size.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Update</button>
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection

