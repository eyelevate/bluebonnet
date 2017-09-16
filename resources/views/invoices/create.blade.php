
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
	<bootstrap-card use-header = "true" use-body="true" use-footer = "true" v-if="current == 1">
		<template slot = "header"> Step 1 - Select Inventory Item </template>
		<template slot = "body">
            <div class="content">
            	<div class="row-fluid">
            		<label>Filter By Keywords</label>
            		<input type="text" v-model="itemName" class="form-control" @keydown.enter.prevent="searchInventoryItem"/>
            	</div>
            	<div id="itemRow" class="row-fluid clearfix">
            		<label><span>@{{ searchInventoryCount }}</span> Results Found</label>
            		<div class="hidden-md-down" v-for="item in items">

						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 pull-left">
							<div class="card">
							    <div class="card-header">
							    	@{{ item.name_short }}
							    </div>
						        <img class="card-img-top" :src="item.primary_src" >    
						        
							    <div class="card-block">
							    	<p class="text-center">$@{{ item.subtotal }}</p>
							    </div>
							    <div class="card-footer">
							    	<div class="form-button-group">
										<button class="remove-set btn btn-sm btn-block btn-success" type="button" @click="selectItem(item.id)">Select</button>
									</div>
							    </div>
							</div>
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
			<button type="button" class="btn btn-danger" @click="reset">Reset</button>
			<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepOne">Next</button>

			<button type="button" class = "btn btn-default pull-right disabled" v-else @mouseover="validation">Next</button>	

			
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
											<select class="form-control" v-on:change="quantitySelected(okey,$event)" v-model="option.quantity">
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
											<select class="form-control"  v-on:change="fingerSelected(okey,$event)" v-model="option.finger_id">
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
											<select class="form-control" :name="'item['+option.inventoryItem.id+'][stone_id]'" v-on:change="stoneSelected(okey, $event)" v-model="option.stone_id">
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
													<select class="form-control" v-on:change="sizeSelected(okey, $event)" v-model="option.stone_size_id">
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
											<select class="form-control" :name="'item['+option.inventoryItem.id+'][metal_id]'" v-on:change="metalSelected(okey, $event)" v-model="option.metal_id">
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
											<input :name="'item['+option.inventoryItem.id+'][subtotal]'" v-model="option.subtotal" class="form-control" @blur="subtotalUpdate(okey,$event)"/>
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
	        <div class="table-responsive">
	        	<h3 class="text-center">Totals</h3>
	        	<table class="table table-condensed table-outline">
	        		<tfoot>
	        			<tr>
	        				<td class="text-right">Quantity:&nbsp;</td>
	        				<th>@{{ totals.quantity }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Subtotal:&nbsp;</td>
	        				<th>@{{ totals.subtotal }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Tax:&nbsp;</td>
	        				<th>@{{ totals.tax }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Total:&nbsp;</td>
	        				<th>@{{ totals.total }}</th>
	        			</tr>
	        		</tfoot>
	        	</table>
	        </div>
		</template>

		<template slot = "footer">
			<button type="button" class="btn btn-secondary" @click="back">Back</button>
			<button type="button" class="btn btn-danger" @click="reset">Reset</button>
			<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepTwo">Next</button>

			<button type="button" class = "btn btn-default pull-right disabled" v-else @mouseover="validation">Next</button>	
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
                    	<input type="text" required v-model="firstName" name="first_name" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- Last Name -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Last Name">
                    <template slot="control">
                    	<input type="text" required v-model="lastName" name="last_name" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- Phone -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Phone">
                    <template slot="control">
                    	<input type="text" required v-model="phone" name="phone" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- Email -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Email">
                    <template slot="control">
                    	<input type="email" required v-model="email" name="email" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- Street -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Street">
                    <template slot="control">
                    	<input type="text" required v-model="street" name="street" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>
                <!-- Suite -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Suite (optional)">
                    <template slot="control">
                    	<input type="text" v-model="suite" name="suite" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- City -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "City">
                    <template slot="control">
                    	<input type="text" v-model="city" name="city" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- state -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "State">
                    <template slot="control">
                    	{{ Form::select('state',$states,'',['class'=>'form-control','v-model'=>'state','v-on:change'=>"validation"]) }}
                    </template>
                </bootstrap-control>

                <!-- country -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Country">
                    <template slot="control">
                    	{{ Form::select('country',$countries,'US',['class'=>'form-control','v-model'=>'country','v-on:change'=>"validation"]) }}
                    </template>
                </bootstrap-control>

                <!-- Zipcode -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Zipcode">
                    <template slot="control">
                    	<input type="text" v-model="zipcode" name="zipcode" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

	        </div>
		</template>

		<template slot = "footer">
			<button type="button" class="btn btn-secondary" @click="back">Back</button>
			<button type="button" class="btn btn-danger" @click="reset">Reset</button>
			<button type="button" class = "btn btn-primary pull-right" @click="next" v-if="stepThree">Next</button>

			<button type="button" class = "btn btn-default pull-right disabled" v-else @mouseover="validation">Next</button>	
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
                    	<input type="text" required v-model="billingStreet" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>
                <!-- Suite -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Suite (optional)">
                    <template slot="control">
                    	<input type="text" v-model="billingSuite" class="form-control" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <!-- City -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "City">
                    <template slot="control">
                    	<input type="text" v-model="billingCity" class="form-control" @blur="validation"/>
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

                <!-- Zipcode -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Zipcode">
                    <template slot="control">
                    	<input type="text" class="form-control" v-model="billingZipcode" @blur="validation"/>
                    </template>
                </bootstrap-control>

                <hr/>
				<div class="row-fluid">
				<label>Shipping Type</label>
                    <div class="col-12">
                        
                        <label class="form-control-label">
                            <input type="radio" name="shipping" value="1" checked @click="updateShipping(1)">
                            &nbsp;2 Day
                        </label>
                    </div>

                    <div class="col-12">
                        
                        <label class="form-control-label">
                            <input type="radio" name="shipping" value="2" @click="updateShipping(2)">
                            &nbsp;Next Day
                        </label>
                    </div>

                </div>
                <div class="form-group">
                	<label>Shipping Price</label>
                	<div class="input-group">
                		<input class="form-control" v-model="shippingTotal"/>
                		<div class="input-group-addon" @click="getTotals">Set</div>
                	</div>	
                </div>
                <hr/>

                <!-- card number -->
                <bootstrap-control class="form-group-no-border" 
                    use-label = "true"
 					label = "Card Number">
                    <template slot="control">
                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'cardNumber','v-on:blur'=>'validation']) }}
                    </template>
                </bootstrap-control>

                <div class="row">
                	<!-- expiration month -->
	                <bootstrap-control class="form-group-no-border col-xs-12 col-sm-6 col-md-6 col-lg-4" 
	                    use-label = "true"
	 					label = "Expiration Month">
	                    <template slot="control">
	                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'expMonth','v-on:blur'=>'validation','maxlength'=>2]) }}
	                    </template>
	                </bootstrap-control>	
	                <!-- expiration month -->
	                <bootstrap-control class="form-group-no-border col-xs-12 col-sm-6 col-md-6 col-lg-4" 
	                    use-label = "true"
	 					label = "Expiration Year">
	                    <template slot="control">
	                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'expYear','v-on:blur'=>'validation','maxlength'=>4]) }}
	                    </template>
	                </bootstrap-control>
	                <!-- CVV -->
	                <bootstrap-control class="form-group-no-border col-xs-12 col-sm-6 col-md-6 col-lg-4" 
	                    use-label = "true"
	 					label = "CVV">
	                    <template slot="control">
	                    	{{ Form::text('','',['class'=>'form-control','v-model'=>'cvv','v-on:blur'=>'validation','maxlength'=>4]) }}
	                    </template>
	                </bootstrap-control>	
                </div>
	        </div>
	        <hr/>
	        <h3 class="text-center">Totals</h3>
	        <div class="table-responsive">
	        	<table class="table table-condensed table-outline">
	        		<tfoot>
	        			<tr>
	        				<td class="text-right">Quantity:&nbsp;</td>
	        				<th>@{{ totals.quantity }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Subtotal:&nbsp;</td>
	        				<th>@{{ totals.subtotal }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Tax:&nbsp;</td>
	        				<th>@{{ totals.tax }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Shipping:&nbsp;</td>
	        				<th>@{{ totals.shipping }}</th>
	        			</tr>
	        			<tr>
	        				<td class="text-right">Total:&nbsp;</td>
	        				<th>@{{ totals.total }}</th>
	        			</tr>
	        		</tfoot>
	        	</table>
	        </div>
		</template>
		<template slot = "footer">
			<button type="button" class="btn btn-secondary" @click="back">Back</button>
			<button type="button" class="btn btn-danger" @click="reset">Reset</button>
			<button type="button" class = "btn btn-success pull-right" v-if="stepFour" data-toggle="modal" data-target="#sendModal">Create</button>
			<button type="button" class = "btn btn-default pull-right disabled" v-else @mouseover="validation">Create</button>	
		</template>
	</bootstrap-card>

</div>
@endsection
@section('modals')
<bootstrap-modal id="sendModal" b-size="modal-lg">
	<template slot="header">Creating Invoice</template>
	<template slot="body">
		<div class="progress" v-if="!done">
			<div class="progress-bar progress-bar-striped bg-info" role="progressbar" :style="'width:'+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div class="progress" v-if="done">
			<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		</div>	
		<label>@{{ progress }}% Complete</label>
		<ul>
			<li class="text-muted" v-if="formStatusOne">Preparing form to create session...</li>
			<li class="text-success" v-if="formStatusOne">Successfully created session!</li>
			<li class="text-muted" v-if="formStatusThree">Authorizing Payment...</li>
			<li class="text-success" v-if="formStatusFour">Successfully made payment transaction!</li>
			<li class="text-muted" v-if="formStatusFive">Saving Invoice Information...</li>
			<li class="text-success" v-if="formStatusSix">Successfully saved invoice information!</li>
			<li class="text-muted" v-if="formStatusSeven">Emailing Customer...</li>
			<li class="text-success" v-if="formStatusEight">Successfully emailed Customer!</li>
			<li class="text-muted" v-if="formStatusNine">Forgetting session and cleaning up form data...</li>
			<li class="text-success" v-if="formStatusTen">Successfully completed all tasks!</li>
		</ul>

		<ul class="text-danger">
			<li v-if="formErrorOne">Could not save session data. Please check your internet connection and try again.</li>
			<li v-if="formErrorTwo">@{{ authorizationErrorMessage }}</li>
			<li v-if="formErrorThree">Error saving invoice</li>
			<li v-if="formErrorFour">Error Sending Email</li>
			<li v-if="formErrorFour">Error removing session. Please manually press reset form to clear.</li>

		</ul>
		
	</template>
	<template slot="footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" @click="makeSession" v-if="formErrors">Try Again</button>
		<button type="button" class="btn btn-primary" @click="makeSession" v-else>Create Invoice</button>
	</template>
</bootstrap-modal>
@endsection
@section('variables')
<div id="variable-root"
	items="{{ (count($inventoryItems) > 0) ? json_encode($inventoryItems) : json_encode([]) }}"
>
	
</div>
@endsection

