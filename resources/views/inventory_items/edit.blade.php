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

	                <bootstrap-control
	                	use-label="true"
	                	label="Stones Selectable?">
	                	<template slot="control">
	                		<div class="row-fluid">
					            <label class="switch switch-text switch-success" >
					                <input id="switch-input-on" name="stones" type="checkbox" class="switch-input" {{ ($inventoryItem->stones) ? 'checked' : '' }} @click="setStones">
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
	                				<tr v-for="stone in stones_data" :class="(stone.active) ? '' : 'table-active'">
	                					<td>
	                						<bootstrap-control>
							                	<template slot="control">

										            <label class="switch switch-text switch-success" >
				
														<input id="switch-input-on" :name="'itemStone[' + stone.id+'][active]'" type="checkbox" class="switch-input" checked @click="activateRow($event)" v-if="stone.active">
														<input id="switch-input-on" :name="'itemStone[' + stone.id+'][active]'" type="checkbox" class="switch-input" @click="activateRow($event)" else>
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
	                							<input type="text" class="form-control active-input" :class="(stone.active) ? '' : 'hide'" :name="'itemStone['+stone.id+'][price]'" :value="stone.price" v-if="!stone.email" style="width:200px">
	                						</div>
	                					</td>
	                					<td v-if="sizes">
	                						<div v-if="stone.email">
	                							<button type="button" class="btn btn-default" disabled>Sizes</button>	
	                						</div>
	                						<div else>
	                							<button type="button" data-toggle="modal" :data-target="'#sizesModal-'+stone.id" class="active-button btn btn-info" :class="(stone.active) ? '' : 'hide'" v-if="!stone.email">Sizes</button>
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
					                <input id="switch-input-on" name="metals" type="checkbox" class="switch-input" {{ ($inventoryItem->metals) ? 'checked' : '' }} @click="setMetals">
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
	                				<tr v-for="metal in metals_data" :class="(metal.active) ? '' : 'table-active'">
	                					<td>
	                						<bootstrap-control>
							                	<template slot="control">
										            <label class="switch switch-text switch-success" >
										                <input id="switch-input-on" :name="'itemMetal[' + metal.id+'][active]'" type="checkbox" class="switch-input" checked @click="activateRow($event)" v-if="metal.active">
										                <input id="switch-input-on" :name="'itemMetal[' + metal.id+'][active]'" type="checkbox" class="switch-input"  @click="activateRow($event)" else>
										                <span class="switch-label" data-on="Yes" data-off="No"></span>
										                <span class="switch-handle" ></span>
										            </label>    

							                	</template>
							                </bootstrap-control>
	                					</td>
	                					<td>@{{ metal.name }}</td>
	                					<td><input type="text" :value="metal.price" :name="'itemMetal[' + metal.id+'][price]'" class="form-control active-input" :class="(metal.active) ? '' : 'hide'" /></td>
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
	                	input-checked="{{ old('fingers') ? old('fingers') : ($inventoryItem->fingers) ? 'true' : 'false'}}">
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
	                <!-- Featured -->

					<bootstrap-switch 
	                	switch-type=""
	                	switch-color="switch-success"
	                	use-label="true" 
	                	label="Featured?" 
	                	input-name="featured"
	                	input-checked="{{ old('featured') ? old('featured') : ($inventoryItem->featured) ? 'true' : 'false' }}">
	                </bootstrap-switch>

	                <hr/>
	                <!-- Images -->
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
			                					img-top-class="card-img-top-inventory"
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
			                					img-top-class="card-img-top-inventory"
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
			                					img-top-class="card-img-top-inventory"
			                				>
			                					<template slot="header">
			                						@{{ i.name }}
			                					</template>
			                					<template slot="footer">
			                						<button type="button" class="make-primary btn btn-primary" @click="primaryImage(k, $event)">Set Primary</button>
				                					<button type="button" class="btn btn-danger" @click="removeImage(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input class="primary-input" type="hidden" :name="i.primary_name" v-model="images[k]['primary']">	
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
	               	<!-- Videos -->
	               	<bootstrap-control
	                	use-label="true"
	                	label="Video"
	                    b-err="{{ $errors->has('video_src') }}"
	                    b-error="{{ $errors->first('video_src') }}">
	                	<template slot="control">
	                		<div class="card videoPreviewCard col-12"  style="padding-top:20px;">
	                			<div class="row-fluid">
	                				<div v-for="v,k in oVideos">      				
		                				<div class="col-xs-12 col-sm-6 col-md-4 pull-left">
			                				<bootstrap-card
			                					class="image-divs"
			                					use-body="true"
			                					use-header="true"
			                					use-footer="true"
			                				>
			                					<template slot="header">
			                						@{{ v.src_name }}
			                					</template>
			                					<template slot="body">
			                						<video style="width:100%;">
			                							<source :src="v.src_formatted" :type="v.type">
			                						</video>
			                					</template>
			                					<template slot="footer">
				                					<button type="button" class="btn btn-danger" @click="removeoVideo(k)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				                					<input type="hidden" :name="v.name" v-model="oVideos[k]['src']">	
			                					</template>
			                				</bootstrap-card>
		                				</div>
	                				</div>
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
	               	@if (count($inventoryItem->itemStone) > 0)
	               		@foreach($inventoryItem->itemStone as $stone)
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
										@if(count($inventoryItem->itemSize) > 0)
											@foreach($inventoryItem->itemSize as $size)
												@if ($size->stoneSizes->stone_id == $stone->stones->id)
												<tr class="{{ $size->active ? '' : 'table-active' }}">
													<td>
														<bootstrap-control>
										                	<template slot="control">

													            <label class="switch switch-text switch-success" >
													                <input id="switch-input-on" name="itemSize[{{ $size->id }}][active]" type="checkbox" class="switch-input" {{ $size->active ? 'checked' : '' }} @click="activateRow($event)">
													                <span class="switch-label" data-on="Yes" data-off="No"></span>
													                <span class="switch-handle" ></span>
													            </label>    

										                	</template>
										                </bootstrap-control>

													</td>
													<td>{{ $size->stoneSizes->sizes->name }}</td>
													<td><input value="{{ $size->price }}" class="{{ $size->active ? '' : 'hide' }} form-control active-input" name="itemSize[{{ $size->id }}][price]" style="width:200px;"/></td>
												</tr>
												@endif
										
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
	               	@elseif(count($stones) > 0)
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
										@if(count($stone->sizes) > 0)
											@foreach($stone->sizes as $size)
											<tr>
												<td>
													<bootstrap-control>
									                	<template slot="control">

												            <label class="switch switch-text switch-success" >
												                <input id="switch-input-on" name="itemSize[{{ $size->id }}][active]" type="checkbox" class="switch-input" checked @click="activateRow($event)">
												                <span class="switch-label" data-on="Yes" data-off="No"></span>
												                <span class="switch-handle" ></span>
												            </label>    

									                	</template>
									                </bootstrap-control>

												</td>
												<td>{{ $size->name }}</td>
												<td><input value="{{ $size->price }}" class="form-control active-input" name="itemSize[{{ $size->id }}][price]" style="width:200px;"/></td>
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

		        </div>
		        <div class="hide">
		        	{!! Form::hidden('edit_metals',(count($inventoryItem->itemMetal) > 0) ? true : false) !!}
		        	{!! Form::hidden('edit_stones',(count($inventoryItem->itemStone) > 0) ? true : false) !!}
		        	{!! Form::hidden('edit_sizes',(count($inventoryItem->itemSize) > 0) ? true : false) !!}
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
<div id="variable-root"
	stones="{{ $inventoryItem->stones }}"
	metals="{{ $inventoryItem->metals }}"
	sizes="{{ $inventoryItem->sizes }}"
	imageVariables="{{ json_encode($image_variables) }}"
	stonesData="{{ (count($inventoryItem->itemStone) > 0) ? json_encode($inventoryItem->itemStone) : json_encode($stones)  }}"
	metalsData="{{ (count($inventoryItem->itemMetal) > 0) ? json_encode($inventoryItem->itemMetal) : json_encode($metals)  }}"
	oVideos="{{ json_encode($inventoryItem->videos) }}"
></div>
@endsection
