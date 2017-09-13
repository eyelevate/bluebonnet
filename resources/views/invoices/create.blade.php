
@extends('layouts.themes.backend.layout')

@section('styles')
@endsection

@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/invoices/create.js') }}"></script>
@endsection

@section('content')
<!-- Breadcrumb -->	
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoices</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<div class="container-fluid">
	{!! Form::open(['method'=>'post','route'=>['invoice.store']]) !!}

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true" v-if="current == 1">
			<template slot = "header"> Step 1 - Select Inventory Item </template>
			<template slot = "body">
	            <div class="content">
	            	<div class="row-fluid">
	            		<label>Filter By Keywords</label>
	            		<input type="text" v-model="itemName" class="form-control" @keydown.enter.prevent="searchInventoryItem"/>
	            	</div>
	            	<div class="row-fluid clearfix">
	            		<label><span>@{{ searchInventoryCount }}</span> Results Found</label>
	            		<div class="hidden-md-down" v-for="item in items">

							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pull-left">
								<bootstrap-card				
									class=""
									use-header="true"
									use-img-top="true"
									:img-top-src="item.primary_src"
									use-body="true"
									use-footer="true"
								>
									<template slot="header">@{{ item.name_short }}</template>
									<template slot="body">
										<p class="text-center">$@{{ item.subtotal }}</p>
									</template>
									<template slot="footer">
										<div class="form-button-group">
											<button class="remove-set btn btn-sm btn-block btn-success" type="button" @click="selectItem(item.id)">Select</button>
										</div>
									</template>
								</bootstrap-card>
							</div>


						</div>
						<div class="hidden-lg-up" v-for="item in items">
							<div class="media">
								<img class="d-flex mr-3" :src="item.primary_src" style="height:50px;width:50px;" alt="Generic placeholder image">
								<div class="media-body">
									<h5 class="mt-0">@{{ item.name_short }}</h5>
									<p >$@{{ item.subtotal }}</p>
									<button class="remove-set btn btn-sm btn-block btn-success" type="button" @click="selectItem(item.id)">Select</button>
								</div>
							</div>
							<hr/>
						</div>
	            	</div>

		        </div>
			</template>

			<template slot = "footer">
				<a href="{{ route('invoice.index') }}" class="btn btn-secondary">Cancel</a>

				<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepOne">Next</button>

				<button type="button" class = "btn btn-default pull-right disabled" v-if="!stepOne">Next</button>	

				
			</template>
		</bootstrap-card>
		<bootstrap-card use-header = "true" use-body="true" use-footer = "true" v-if="current == 2">
			<template slot = "header"> Step 2 - Selected Item Options </template>
			<template slot = "body">
	            <div class="content">
	            	<div v-for="option, okey in selectedOptions">
	            		<div class="media" >
							<img class="d-flex mr-3" :src="option.inventoryItem.primary_src" alt="Generic placeholder image" style="height:75px;">
							<div class="media-body">
								<h5 class="mt-0">@{{ option.inventoryItem.name }}</h5>
								<div class="row-fluid">
									<div>
										<bootstrap-control
											use-label="true"
											label="Quantity"
										>
											<template slot="control">
												<select class="form-control" v-on:change="quantitySelected(okey,$event)">
													<option v-for="opt, key in option.quantity_select" :value="key" v-if="key == ''" checked>@{{ opt }}</option>
													<option v-for="opt, key in option.quantity_select" :value="key" >@{{ opt }}</option>
												</select>
											</template>
										</bootstrap-control>
									</div>
									<div v-if="option.inventoryItem.fingers">
										<bootstrap-control
											use-label="true"
											label="Ring Size"
										>
											<template slot="control">
												<select class="form-control"  v-on:change="fingerSelected(okey,$event)">
													<option v-for="opt, key in option.fingers" :value="key" v-if="key == ''" checked>@{{ opt }}</option>
													<option v-for="opt, key in option.fingers" :value="key" >@{{ opt }}</option>
												</select>
											</template>
										</bootstrap-control>
									</div>
									<div v-if="option.inventoryItem.stones">
										<bootstrap-control
											use-label="true"
											label="Stone Type"
										>
											<template slot="control">
												<select class="form-control" :name="'item['+option.inventoryItem.id+'][stone_id]'" v-on:change="stoneSelected(okey, $event)">
													<option v-for="opt, key in option.stone_select" :value="key" v-if="key == ''" checked>@{{ opt }}</option>
													<option v-for="opt, key in option.stone_select" :value="key" else>@{{ opt }}</option>
												</select>
											</template>
										</bootstrap-control>
										<div v-if="option.inventoryItem.sizes">

											<div v-for="size, stone_id in option.stone_sizes" v-if="option.stones_compare[option.stone_id] == stone_id">

												<bootstrap-control
													use-label="true"
													label="Stone Size"
												>
													<template slot="control">
														<select class="form-control" v-on:change="sizeSelected(okey, $event)">
															<option v-for="svalue, skey in size" :value="skey" v-if="skey == ''" checked>@{{ svalue }}</option>
															<option v-for="svalue, skey in size" :value="skey" else>@{{ svalue }}</option>
														</select>
													</template>
												</bootstrap-control>	
											</div>
											
										</div>
									</div>
									
									<div v-if="option.inventoryItem.metals">
										<bootstrap-control
											use-label="true"
											label="Metal Type"
										>
											<template slot="control">
												<select class="form-control" :name="'item['+option.inventoryItem.id+'][metal_id]'" v-on:change="metalSelected(okey, $event)">
													<option v-for="opt, key in option.metals" :value="key" v-if="key == ''" checked>@{{ opt }}</option>
													<option v-for="opt, key in option.metals" :value="key" else>@{{ opt }}</option>
												</select>
											</template>
										</bootstrap-control>
									</div>

									<div class="row-fluid">
										<bootstrap-control
											use-label="true"
											label="Subtotal"
										>
											<template slot="control">
												<input :name="'item['+option.inventoryItem.id+'][subtotal]'" v-model="option.subtotal" class="form-control"/>
											</template>
										</bootstrap-control>
									</div>
									<button type="button" class="btn btn-danger btn-block" @click="removeItem(okey,$event)">Remove</button>
								</div>

							</div>
						</div>	


						<hr/>
	            	</div>
					
		        </div>
			</template>

			<template slot = "footer">
				<button type="button" class="btn btn-secondary" @click="back">Back</a>
				<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepTwo">Next</button>

				<button type="button" class = "btn btn-default pull-right disabled" v-if="!stepTwo">Next</button>	
			</template>
		</bootstrap-card>

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true" v-if="current == 3">
			<template slot = "header"> Step 3 - Shipping Information </template>
			<template slot = "body">
	            <div class="content">
	            	<!-- First Name -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "First Name">
	                    <template slot="control">
	                    	<input type="text" required v-model="firstName" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- Last Name -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Last Name">
	                    <template slot="control">
	                    	<input type="text" required v-model="lastName" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- Phone -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Phone">
	                    <template slot="control">
	                    	<input type="text" required v-model="phone" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- Email -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Email">
	                    <template slot="control">
	                    	<input type="email" required v-model="email" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- Street -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Street">
	                    <template slot="control">
	                    	<input type="text" required v-model="street" class="form-control"/>
	                    </template>
	                </bootstrap-control>
	                <!-- Suite -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Suite (optional)">
	                    <template slot="control">
	                    	<input type="text" v-model="suite" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- City -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "City">
	                    <template slot="control">
	                    	<input type="text" v-model="city" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- state -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "State">
	                    <template slot="control">
	                    	{{ Form::select('',$states,'',['class'=>'form-control','v-model'=>'state']) }}
	                    </template>
	                </bootstrap-control>

	                <!-- country -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Country">
	                    <template slot="control">
	                    	{{ Form::select('',$countries,'US',['class'=>'form-control','v-model'=>'country']) }}
	                    </template>
	                </bootstrap-control>

		        </div>
			</template>

			<template slot = "footer">
				<button type="button" class="btn btn-secondary" @click="back">Back</a>
				<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepThree">Next</button>

				<button type="button" class = "btn btn-default pull-right disabled" v-if="!stepThree">Next</button>	
			</template>
		</bootstrap-card>

		<bootstrap-card use-header = "true" use-body="true" use-footer = "true" v-if="current == 4">
			<template slot = "header"> Step 4 - Billing & Payment Information </template>
			<template slot = "body">
	            <div class="content">
	            	<!-- Street -->
	                <bootstrap-control class="form-group-no-border" >
	                    <template slot="control">
	                    	<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" @click="sameAsShipping">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">Same As Shipping?</span>
							</label>
	                    </template>
	                </bootstrap-control>
	            	<!-- Street -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Street">
	                    <template slot="control">
	                    	<input type="text" required v-model="billingStreet" class="form-control"/>
	                    </template>
	                </bootstrap-control>
	                <!-- Suite -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Suite (optional)">
	                    <template slot="control">
	                    	<input type="text" v-model="billingSuite" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- City -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "City">
	                    <template slot="control">
	                    	<input type="text" v-model="billingCity" class="form-control"/>
	                    </template>
	                </bootstrap-control>

	                <!-- state -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "State">
	                    <template slot="control">
	                    	{{ Form::select('',$states,'',['class'=>'form-control','v-model'=>'billingState']) }}
	                    </template>
	                </bootstrap-control>

	                <!-- country -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Country">
	                    <template slot="control">
	                    	{{ Form::select('',$countries,'US',['class'=>'form-control','v-model'=>'billingCountry']) }}
	                    </template>
	                </bootstrap-control>

	                <!-- card number -->
	                <bootstrap-control class="form-group-no-border" 
	                    use-label = "true"
	 					label = "Card Number">
	                    <template slot="control">
	                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'cardNumber']) }}
	                    </template>
	                </bootstrap-control>

	                <div class="row">
	                	<!-- expiration month -->
		                <bootstrap-control class="form-group-no-border col-6" 
		                    use-label = "true"
		 					label = "Expiration Month">
		                    <template slot="control">
		                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'expMonth']) }}
		                    </template>
		                </bootstrap-control>	
		                <!-- expiration month -->
		                <bootstrap-control class="form-group-no-border col-6" 
		                    use-label = "true"
		 					label = "Expiration Year">
		                    <template slot="control">
		                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'expYear']) }}
		                    </template>
		                </bootstrap-control>	
	                </div>
	                

		        </div>
		        <hr/>

			</template>

			<template slot = "footer">
				<button type="button" class="btn btn-secondary" @click="back">Back</a>
				<button type="submit" class = "btn btn-success pull-right" v-if="stepFour">Create</button>

				<button type="button" class = "btn btn-default pull-right disabled" v-if="!stepFour">Create</button>	
			</template>
		</bootstrap-card>
	{!! Form::close() !!}
</div>
@endsection
@section('variables')
<div id="variable-root"
	items="{{ (count($inventoryItems) > 0) ? json_encode($inventoryItems) : json_encode([]) }}"
>
	
</div>
@endsection

