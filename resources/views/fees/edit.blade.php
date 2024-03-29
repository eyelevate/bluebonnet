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
    <li class="breadcrumb-item"><a href="{{ route('fee.index') }}">Fees</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['fee.update',$fee->id]]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			
			<template slot = "header"> Create A Fee </template>
			<template slot = "body">
			

	            <div class="content">
	            	
	            	<!-- First Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $fee->name }}"
	                    b-err="{{ $errors->has('name') }}"
	                    b-error="{{ $errors->first('name') }}"
	                    >
	                </bootstrap-input>

					<!-- Description -->
	                <bootstrap-textarea class="form-group-no-border {{ $errors->has('desc') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Fee Description"
	                    b-placeholder="detailed description of fee"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') ? old('desc') : $fee->desc }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-textarea>


					<!-- Subtotal -->
	              	<bootstrap-input class="form-group-no-border {{ $errors->has('subtotal') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Subtotal"
	                    b-placeholder="0.00"
	                    b-name="subtotal"
	                    b-type="text"
	                    b-value="{{ old('subtotal') ? old('subtotal') : $fee->subtotal }}"
	                    b-err="{{ $errors->has('subtotal') }}"
	                    b-error="{{ $errors->first('subtotal') }}"
	                    
	                    >
	                </bootstrap-input>
	          		
	          		<!-- Taxable -->
	                <bootstrap-select class="form-group-no-border {{ $errors->has('taxable') ? ' has-danger' : '' }}"
	                	use-label="true"
	                	label="Taxable?"
	                	b-err="{{ $errors->has('taxable') }}"
	                	b-error="{{ $errors->first('taxable') }}"
	                >
	                	<template slot="select">
	                		{{ Form::select('taxable',[1=>'Yes',0=>'No'],old('taxable') ?  old('taxable') : $fee->taxable,['class'=>'custom-select col-12']) }}
	                	</template>

	                </bootstrap-select>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('fee.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>

			
		</bootstrap-card>
	{!! Form::close() !!}
</div>






@endsection

@section('modals')

@endsection