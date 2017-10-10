@extends('layouts.themes.backend.layout')
@section('styles')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ mix('/js/views/inventory_items/create.js') }}"></script>

@endsection
@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('inventory.index') }}">Inventory</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['id'=>'item-form','method'=>'post','route'=>['inventory_item.store',$inventory->id],'enctype'=>'multipart/form-data','v-on:submit'=>'submitForm']) !!}

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

	                <!-- Subtotal -->
	                <bootstrap-input class="form-group-no-border {{ $errors->has('subtotal') ? ' has-danger' : '' }}" 
	                    use-label = "true"
	 					label = "Subtotal (Base Price)"
	                    b-placeholder="0.00"
	                    b-name="subtotal"
	                    b-type="text"
	                    b-value="{{ old('subtotal') }}"
	                    b-err="{{ $errors->has('subtotal') }}"
	                    b-error="{{ $errors->first('subtotal') }}"
	                    >
	                </bootstrap-input>
	                <hr/>
	                <!-- Stones -->

	                <bootstrap-control
	                	use-label="true"
	                	label="Stones Selectable?">
	                	<template slot="control">
	                		<div class="row-fluid">
					            <label class="switch switch-text switch-success" >
					                <input id="switch-input-on" name="stones" type="checkbox" class="switch-input"  @click="setStones">
					                <span class="switch-label" data-on="Yes" data-off="No"></span>
					                <span class="switch-handle" ></span>
					            </label>    
					        </div>
	                	</template>
	                </bootstrap-control>

	                <!-- Sizes -->
	                <hr/>
					<bootstrap-control
	                	use-label="true"
	                	label="Stones Size Selectable?">
	                	<template slot="control">
	                		<div class="row-fluid">
					            <label class="switch switch-text switch-success" >
					                <input id="switch-input-on" name="sizes" type="checkbox" class="switch-input" checked @click="setSizes" v-if="stones">
					                <input id="switch-input-on" name="sizes" type="checkbox" class="switch-input" disabled @click="setSizes" else>
					                <span class="switch-label" data-on="Yes" data-off="No" ></span>
					                <span class="switch-handle"></span>
					            </label>    
					        </div>
	                	</template>
	                </bootstrap-control>
	                
	                <div class="container" v-if="stones">
	                	<div class="table-responsive">
	                		<table class="table table-condensed">
	                			<thead>
	                				<tr>
	                					<th>Active?</th>
	                					<th>Email?</th>
	                					<th>Stone</th>
	                					<th>Price</th>
	                					<th v-if="sizes">Sizes</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<tr v-for="stone in stones_data">
	                					<td>
	                						<bootstrap-control>
							                	<template slot="control">

										            <label class="switch switch-text switch-success" >
										                <input id="switch-input-on" :name="'itemStone[' + stone.id+'][active]'" type="checkbox" class="switch-input" checked @click="activateRow($event)">
										                <span class="switch-label" data-on="Yes" data-off="No"></span>
										                <span class="switch-handle" ></span>
										            </label>    

							                	</template>
							                </bootstrap-control>
	                					</td>
	                					<td>@{{ stone.email_status }}</td>
	                					<td>@{{ stone.name }}</td>
	                					<td>
	                						<div v-if="stone.email">
	                							By Email Only
	                							<input type="hidden" :name="'itemStone['+stone.id+'][price]'" value="0" style="width:200px">
	                						</div>
	                						<div else>
	                							<input type="text" class="form-control active-input" :name="'itemStone[' + stone.id+'][price]'" :value="stone.price" v-if="!stone.email" style="width:200px">
	                						</div>
	                					</td>
	                					<td v-if="sizes">
	                						<div v-if="stone.email">
	                							<button type="button" class="btn btn-default" disabled>Sizes</button>	
	                						</div>
	                						<div else>
	                							<button type="button" data-toggle="modal" :data-target="'#sizesModal-'+stone.id" class="active-button btn btn-info" v-if="!stone.email">Sizes</button>
	                						</div>
	                					</td>
	                				</tr>
	                			</tbody>
	                		</table>
	                	</div>
	                </div>
	                

	                <hr/>
	                <!-- Metals -->

					<bootstrap-control
	                	use-label="true"
	                	label="Metals Selectable?">
	                	<template slot="control">
	                		<div class="row-fluid">
					            <label class="switch switch-text switch-success" >
					                <input id="switch-input-on" name="metals" type="checkbox" class="switch-input"  @click="setMetals">
					                <span class="switch-label" data-on="Yes" data-off="No" ></span>
					                <span class="switch-handle"></span>
					            </label>    
					        </div>
	                	</template>
	                </bootstrap-control>

	                <div class="container" v-if="metals">
	                	<div class="table-responsive">
	                		<table class="table table-condensed">
	                			<thead>
	                				<tr>
	                					<th>Active?</th>
	                					<th>Metal</th>
	                					<th>Price</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<tr v-for="metal,k in metals_data">
	                					<td>
	                						<bootstrap-control>
							                	<template slot="control">
										            <label class="switch switch-text switch-success" >
										                <input id="switch-input-on" :name="'itemMetal[' + metal.id+'][active]'" type="checkbox" class="switch-input" checked @click="activateRow($event)" >
										                <span class="switch-label" data-on="Yes" data-off="No"></span>
										                <span class="switch-handle" ></span>
										            </label>    

							                	</template>
							                </bootstrap-control>
	                					</td>
	                					<td>@{{ metal.name }}</td>
	                					<td><input type="text" :value="metal.price" :name="'itemMetal[' + metal.id+'][price]'" class="form-control active-input" v-model="metals_data[k].price"/></td>
	                				</tr>
	                			</tbody>
	                		</table>
	                	</div>
	                </div>
	                <hr/>

	                <!-- Fingers -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Selectable Ring Size?" 
	                	input-name="fingers"
	                	input-checked="false">
	                </bootstrap-switch>
	                <hr/>
	                <!-- Taxable -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Taxable?" 
	                	input-name="taxable"
	                	input-checked="true">
	                </bootstrap-switch>

	                <hr/>
	                <!-- Active -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Activate?" 
	                	input-name="active"
	                	input-checked="false">
	                </bootstrap-switch>

	                <hr/>

	                <!-- Featured -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Featured?" 
	                	input-name="featured"
	                	input-checked="false">
	                </bootstrap-switch>
	                <hr/>
	                <!-- Images -->
	                <bootstrap-control
	                	use-label="true"
	                	label="Image(s)"
	                    b-err="{{ $errors->has('img_src') }}"
	                    b-error="{{ $errors->first('img_src') }}">
	                	<template slot="control">
	                		<div class="card imagePreviewCard col-12"  style="padding-top:20px;">
	                			<div class="row-fluid">
	                				<div v-for="i,k in images">      				
		                				<div class="col-xs-12 col-sm-6 col-md-4 pull-left">
			                				<bootstrap-card
			                					class="image-divs"
			                					use-img-top="true"
			                					use-header="true"
			                					use-footer="true"
			                					:img-top-src="i.src"
			                					img-top-class="card-img-top-inventory"
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
	                				</div>
	                			</div>

	                			
	                			<div id="image-parent" class="card-block">
	                				<input id="uploader" name="imgs[]" type="file" multiple class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
	                			</div>
	                		</div>
	                		
	                	</template>
	               	</bootstrap-control>
	               	<hr/>
	               	<!-- Videos -->
	               	<bootstrap-control
	                	use-label="true"
	                	label="Video"
	                    b-err="{{ $errors->has('video_src') }}"
	                    b-error="{{ $errors->first('video_src') }}">
	                	<template slot="control">
	                		<div class="card videoPreviewCard col-12"  style="padding-top:20px;">
	                			<div class="row-fluid">
	                				<div v-for="v,k in videos">      				
		                				<div class="col-xs-12 col-sm-6 col-md-4 pull-left">
			                				<bootstrap-card
			                					class="image-divs"
			                					use-body="true"
			                					use-header="true"
			                					use-footer="true"
			                				>
			                					<template slot="header">
			                						@{{ v.name }}
			                					</template>
			                					<template slot="body">
			                						<video style="width:100%;">
			                							<source :src="v.src" :type="v.type">
			                						</video>
			                					</template>
			                					<template slot="footer">
				                					<button type="button" class="btn btn-danger" @click="removeVideo(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="v.name" v-model="videos[k]['src']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
	                				</div>
	                			</div>

	                			
	                			<div id="video-parent" class="card-block">
	                				<input id="video-uploader" name="videos[]" type="file" multiple class="form-control-file" aria-describedby="fileHelp" @change="setVideos($event)" >
	                			</div>
	                		</div>
	                		
	                	</template>
	               	</bootstrap-control>
		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back</a>
				<button type="button" class = "btn btn-primary" @click="submitForm">Save</button>
			</template>
		</bootstrap-card>
		@if(count($stones) > 0)
			@foreach($stones as $stone)
			<bootstrap-modal id="sizesModal-{{ $stone->id }}" b-size="modal-lg">
				<template slot="header">Stone Sizes - {{ $stone->name }}</template>
				<template slot="body">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<th>Active?</th>
									<th>Size</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
							@if (count($stone->sizes) > 0)
								@foreach($stone->sizes as $size)
								<tr>
									<td>
										<bootstrap-control>
						                	<template slot="control">

									            <label class="switch switch-text switch-success" >
									                <input id="switch-input-on" name="itemSize[{{ $stone->id }}][{{$size->id}}][active]" type="checkbox" class="switch-input" checked @click="activateRow($event)">
									                <span class="switch-label" data-on="Yes" data-off="No"></span>
									                <span class="switch-handle" ></span>
									            </label>    

						                	</template>
						                </bootstrap-control>

									</td>
									<td>{{ $size->name }}</td>
									<td><input value="{{ $size->price }}" class="form-control active-input" name="itemSize[{{ $stone->id}}][{{ $size->id }}][price]" style="width:200px;"/></td>
								</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
				</template>
				<template slot="footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
				</template>
			</bootstrap-modal>
			@endforeach
		@endif

		{!! Form::close() !!}
</div>
@endsection

@section('modals')

<bootstrap-modal id="send-form-modal" b-size="modal-lg">
	<template slot="header">Please Wait!</template>
	<template slot="body">
		<p class="text-center">Loading Form Images / Videos... This can take up to 20 seconds depending on the size of the resource.</p>
		<h1 class="text-center"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i><h1>
	</template>
	<template slot="footer"></template>
</bootstrap-modal>
@endsection

@section('variables')
<div id="variable-root"
	stones="{{ (count($stones)) ? json_encode($stones) : json_encode([])  }}"
	metals="{{ (count($metals)) ? json_encode($metals) : json_encode([])  }}"
></div>
@endsection
