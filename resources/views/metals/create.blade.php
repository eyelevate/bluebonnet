
@extends('layouts.themes.backend.layout')


@section('styles')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/metals/create.js') }}"></script>

@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('metal.index') }}">Metal Type</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	<form class="" method="POST" action="{{ route('metal.store') }}">

	{{ csrf_field() }}

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
	                    b-placeholder="Description of metal type"
	                    b-name="desc"
	                    b-type="text"
	                    b-value="{{ old('desc') }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-textarea>

	              
	                <hr/>

{{-- 	                <div class="type-row row-fluid " type="1">
	                	<label>Width</label>
	                	<div class="form-inline">
	                		<!-- Min Width -->
			              	<bootstrap-input class="form-group-no-border {{ $errors->has('min_width') ? ' has-danger' : '' }}" 
			                    b-placeholder="Min"
			                    b-name="min_width"
			                    b-type="text"
			                    b-value="{{ old('min_width') }}"
			                    b-err="{{ $errors->has('min_width') }}"
			                    b-error="{{ $errors->first('min_width') }}"
			                    >
			                </bootstrap-input>	
			                &nbsp;
			                &nbsp;
		                	<!-- Max Width -->
			              	<bootstrap-input class="form-group-no-border {{ $errors->has('max_width') ? ' has-danger' : '' }}" 
			                    b-placeholder="Max"
			                    b-name="max_width"
			                    b-type="text"
			                    b-value="{{ old('max_width') }}"
			                    b-err="{{ $errors->has('max_width') }}"
			                    b-error="{{ $errors->first('max_width') }}"
			                    >
			                </bootstrap-input>	
	                	</div>	
	                	<hr/>
	                </div>
	                 --}}


	          		
	                <!-- Price -->
{{-- 	                <div class="type-row " type="5">
		                <bootstrap-input class="form-group-no-border {{ $errors->has('price') ? ' has-danger' : '' }}" 
		              		use-label="true"
		              		label="Fixed Price"
		                    b-placeholder="0.00"
		                    b-name="price"
		                    b-type="text"
		                    b-value="{{ old('price') }}"
		                    b-err="{{ $errors->has('price') }}"
		                    b-error="{{ $errors->first('price') }}"
		                    >
		                </bootstrap-input>	
	                </div> --}}
	              		
					<!-- Rate -->
{{-- 	          		<div class="type-row" type="6">       		
		              	<bootstrap-input class="form-group-no-border {{ $errors->has('rate') ? ' has-danger' : '' }}" 
		              		use-label="true"
		              		label="Price By Unit"
		                    b-placeholder="0.00"
		                    b-name="rate"
		                    b-type="text"
		                    b-value="{{ old('rate') }}"
		                    b-err="{{ $errors->has('rate') }}"
		                    b-error="{{ $errors->first('rate') }}"
		                    >
		                </bootstrap-input>	
	                </div> --}}
	                <!-- Taxable -->
{{-- 	                <bootstrap-select class="form-group-no-border {{ $errors->has('taxable') ? ' has-danger' : '' }}"
	                	use-label="true"
	                	label="Taxable?"
	                	b-err="{{ $errors->has('taxable') }}"
	                	b-error="{{ $errors->first('taxable') }}"
	                >
	                	<template slot="select">
	                		{{ Form::select('taxable',[1=>'Yes',0=>'No'],old('taxable'),['class'=>'custom-select']) }}
	                	</template>

	                </bootstrap-select> --}}

	                <!-- Vendor -->
{{-- 	                <bootstrap-control class="form-group-no-border {{ $errors->has('vendor_id') ? ' has-danger' : '' }}"
	                	use-label="true"
	                	label="Vendor (optional)"
	                	b-err="{{ $errors->has('vendor_id') }}"
	                	b-error="{{ $errors->first('vendor_id') }}"
	                >
	                	<template slot="control">
	                		<div class="input-group">
	                    		{{ Form::text('vendor',old('vendor'),['id'=>'vendor','class'=>'form-control','readonly'=>'true','style'=>'background-color:#ffffff;','placeholder'=>'optional','v-model'=>'name']) }}
	                    		<span class="input-group-btn">
									<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#vendorModal"><i class="icon-plus"></i></button>
								</span>
								<span class="input-group-btn">
									<button class="btn btn-danger" type="button" v-on:click="removeVendor"><i class="icon-minus"></i></button>
								</span>
	                    	</div>
	                    	<div class="vendors">
	                    		<input type="hidden" name="vendor_id" v-model="id"/>	
	                    	</div>
	                	</template>

	                </bootstrap-control> --}}


		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('metal.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
	</form>	
</div>
@endsection

