@extends('layouts.themes.backend.layout')
@section('styles')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/inventory_items/edit.js') }}"></script>

@endsection
@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('inventory.index') }}">Inventory</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'patch','route'=>['inventory_item.update',$inventoryItem->id],'enctype'=>'multipart/form-data']) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true">
			<template slot = "header"> Create An Inventory Item </template>
			<template slot = "body">
	            <div class="content">
	            	
	            	<!-- Name -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('name') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Name"
	                    b-placeholder="Name"
	                    b-name="name"
	                    b-type="text"
	                    b-value="{{ old('name') ? old('name') : $inventoryItem->name }}"
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
	                    b-value="{{ old('desc') ? old('desc') : $inventoryItem->desc }}"
	                    b-err="{{ $errors->has('desc') }}"
	                    b-error="{{ $errors->first('desc') }}"
	                    >
	                </bootstrap-textarea>

	                <!-- Subtotal -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('subtotal') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Subtotal (Base Price)"
	                    b-placeholder="0.00"
	                    b-name="subtotal"
	                    b-type="text"
	                    b-value="{{ old('subtotal') ? old('subtotal') : $inventoryItem->subtotal }}"
	                    b-err="{{ $errors->has('subtotal') }}"
	                    b-error="{{ $errors->first('subtotal') }}"
	                    >
	                </bootstrap-input>
	                <hr/>
	                <!-- Stones -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Stones Selectable?" 
	                	input-name="stones"
	                	input-checked="{{ old('stones') ? old('stones') : ($inventoryItem->stones) ? 'true' : 'false'}}">
	                </bootstrap-switch>
	                

	                <hr/>
	                <!-- Metals -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Metals Selectable?" 
	                	input-name="metals"
	                	input-checked="{{ old('metals') ? old('metals') : ($inventoryItem->metals) ? 'true' : 'false'}}">
	                </bootstrap-switch>
	                <hr/>
	                <!-- Taxable -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Taxable?" 
	                	input-name="taxable"
	                	input-checked="{{ old('taxable') ? old('taxable') : ($inventoryItem->taxable) ? 'true' : 'false'}}">
	                </bootstrap-switch>

	                <hr/>
	                <!-- Active -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Activate?" 
	                	input-name="active"
	                	input-checked="{{ old('active') ? old('active') : ($inventoryItem->active) ? 'true' : 'false'}}">
	                </bootstrap-switch>

	                <hr/>
	                <bootstrap-control
	                	use-label="true"
	                	label="Image(s)"
	                    b-err="{{ $errors->has('img_src') }}"
	                    b-error="{{ $errors->first('img_src') }}">
	                	<template slot="control">
	                		<div class="card imagePreviewCard col-12" >
	                			<div class="row-fluid hidden-sm-down">	                				
	                				<div v-for="i,k in images">      				
		                				<div class="col-4 pull-left" v-if="i.primary">
			                				<bootstrap-card
			                					class="image-divs card-inverse bg-success"
			                					use-img-top="true"
			                					use-header="true"
			                					use-footer="true"
			                					:img-top-src="i.src"
			                				>
			                					<template slot="header">
			                						@{{ i.name }}
			                					</template>
			                					<template slot="footer">
			                						<button type="button" class="make-primary hide btn btn-primary" @click="primaryImage(k, $event)">Set Primary</button>
				                					<button type="button" class="btn btn-danger" @click="removeImage(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="i.primary_name" v-model="images[k]['primary']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
		                				<div class="col-4 pull-left" v-else>
			                				<bootstrap-card
			                					class="image-divs bg-light"
			                					use-img-top="true"
			                					use-header="true"
			                					use-footer="true"
			                					:img-top-src="i.src"
			                				>
			                					<template slot="header">
			                						@{{ i.name }}
			                					</template>
			                					<template slot="footer">
			                						<button type="button" class="make-primary btn btn-primary" @click="primaryImage(k, $event)">Set Primary</button>
				                					<button type="button" class="btn btn-danger" @click="removeImage(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="i.primary_name" v-model="images[k]['primary']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
		                				<input type="hidden" :name="i.old_name_old" v-model="images[k]['old']" v-if="i.old"/>
		                				<input type="hidden" :name="i.old_name_id" v-model="images[k]['old_id']" v-if="i.old"/>
	                				</div>
	                			</div>
	                			<div class="row-fluid hidden-md-up">
	                				<div v-for="i,k in images">      				
		                				<div class="col-12" v-if="i.primary">
			                				<bootstrap-card
			                					class="image-divs card-inverse bg-success"
			                					use-img-top="true"
			                					use-footer="true"
			                					:img-top-src="i.src"
			                					use-header="true"
			                				>
			                					<template slot="header">
			                						@{{ i.name }}
			                					</template>
			                					<template slot="footer">
			                						<button type="button" class="make-primary hide btn btn-primary" @click="primaryImage(k, $event)">Set Primary</button>
				                					<button type="button" class="btn btn-danger" @click="removeImage(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="i.primary_name" v-model="images[k]['primary']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
		                				<div class="col-12" v-else>
			                				<bootstrap-card
			                					class="image-divs bg-light"
			                					use-img-top="true"
			                					use-footer="true"
			                					:img-top-src="i.src"
			                					use-header="true"
			                				>
			                					<template slot="header">
			                						@{{ i.name }}
			                					</template>
			                					<template slot="footer">
			                						<button type="button" class="make-primary btn btn-primary" @click="primaryImage(k, $event)">Set Primary</button>
				                					<button type="button" class="btn btn-danger" @click="removeImage(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="i.primary_name" v-model="images[k]['primary']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
		                				<input type="hidden" :name="i.old_name_old" v-model="images[k]['old']" v-if="i.old"/>
		                				<input type="hidden" :name="i.old_name_id" v-model="images[k]['old_id']" v-if="i.old"/>
	                				</div>
	                			</div>

	                			
	                			<div id="image-parent" class="card-block">
	                				<input id="uploader" name="imgs[]" type="file" multiple class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
	                			</div>
	                		</div>
	                		
	                	</template>
	               	</bootstrap-control>

		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back</a>
				<button type="submit" class = "btn btn-primary">Save</button>
			</template>
		</bootstrap-card>
		{!! Form::close() !!}
</div>
@endsection

@section('modals')

@endsection

@section('variables')
<input type="hidden" value="{{ json_encode($image_variables) }}" id="image-variables">
@endsection
