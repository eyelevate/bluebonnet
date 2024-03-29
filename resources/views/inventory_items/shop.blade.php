@extends($layout)
@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/inventory_items/shop.js') }}"></script>
@endsection
@section('styles')
@endsection
@section('header')
{!! Form::open(['method'=>'post','route'=>['inventory_item.add_to_cart',$inventoryItem->id]]) !!}
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
			<div id="slider">
				<div id="myCarousel" class="carousel inventory-carousel slide">
					<!-- main slider carousel items -->
					<div class="carousel-inner">
						@php
							$idx = -1;
						@endphp
						@if (count($inventoryItem->images) > 0)
							@foreach($inventoryItem->images as $ikey => $image)
							@php
								$idx++;
							@endphp
							<div class="{{ ($image->primary == true) ? 'active' : '' }} item carousel-item text-center" data-slide-number="{{ $idx }}">
								<img src="{{ asset(str_replace('public/', 'storage/', $image->featured_src)) }}" class="card-img-top-featured lazy mx-auto d-block img-fluid" style="max-height:350px;">
							</div>
							@endforeach
						@endif
						@if (count($inventoryItem->videos) > 0)
							@foreach($inventoryItem->videos as $ikey => $video)
							@php
								$idx++;
							@endphp
							<div class="item carousel-item text-center" data-slide-number="{{ $idx }}">
								@desktop
								<video style="width:100%; max-height:350px;" autoplay loop muted>
								@elsedesktop
								<video style="width:100%; max-height:350px;" controls loop muted>
								@enddesktop

	    							<source src="{{ asset(str_replace('public/', 'storage/', $video->src)) }}" type="{{ $video->type }}">
	    						</video>
							</div>
							@endforeach
						@endif
	
					</div>
						{{--  Inventory Carousel Controls  --}}
							
						<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
							<div class="indicator-left">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</div>
						</a>	
					
					
						<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
							<div class="indicator-right">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</div>
						</a>	

							
				</div>
		

			</div>
			<hr/>
			<div class="row clearfix">
				@php
					$idx = -1;
				@endphp
				@if (count($inventoryItem->images) > 0)

					@foreach($inventoryItem->images as $ikey => $image)
					@php
						$idx++;
					@endphp
					<div class="col-3 col-md-2 col-lg-2 pull-left {{ ($ikey == 0) ? 'active' : '' }}" style="margin-top: 10px">
						<a id="carousel-selector-{{ $ikey }}" class="{{ ($ikey == 0) ? 'selected' : '' }}" data-slide-to="{{ $idx }}" data-target="#myCarousel">
							<img src="{{ asset(str_replace('public/', 'storage/', $image->img_src)) }}" class="img-fluid">
						</a>
					</div>
					@endforeach

				@endif
				@if (count($inventoryItem->videos) > 0)

					@foreach($inventoryItem->videos as $ikey => $video)
					@php
						$idx++;
					@endphp
					<div class="col-3 col-md-2 col-lg-2 pull-left" style="margin-top: 10px">
						<a id="carousel-selector-{{ $ikey }}" class="" data-slide-to="{{ $idx }}" data-target="#myCarousel">
							@desktop
							<video style="width:100%; height:100%;" autoplay loop muted>
							@elsedesktop
							<video style="width:100%; height:100%;" controls>
							@enddesktop
    							<source src="{{ asset(str_replace('public/', 'storage/', $video->src)) }}" type="{{ $video->type }}">
    						</video>
						</a>
					</div>
					@endforeach

				@endif

			</div>
			<hr/>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
			<h1>{{ $inventoryItem->name }}</h1>
			<p>${{ number_format($inventoryItem->subtotal, 2,".",",") }} (base price before tax and options)</p>
			<p>{{ $inventoryItem->desc }}</p>
			<p><strong>
				This piece is made to order, meaning 24 hours after your order is placed, we begin making your personalized jewelry from scratch. Please allow 2-3 weeks for us to manufacture and ship your order. All designs are owned by Freya's Fine Jewelry.
			</strong></p>
			<div class="row-fluid">
				<hr/>
				<div class="form-group {{ $errors->has('quantity') ? ' has-danger' : '' }}">
					<h5>Quantity</h5>
					{{ Form::select('quantity',[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10], (old('quantity')) ? old('quantity') : 1,['class'=>"form-control {($errors->has('quantity') ? 'form-control-danger' : ''}",'v-on:change'=>'setQuantity($event)']) }}
					<div class="{{ ($errors->has('quantity')) ? '' : 'hide' }}">
						<small class="form-control-feedback">{{ $errors->first('quantity') }}</small>
					</div>
				</div>
				
			</div>
			@if($inventoryItem->fingers)
			<div class="row-fluid">
				<hr/>
				<div class="form-group {{ $errors->has('finger_id') ? ' has-danger' : '' }}">
					<h5>Select Finger Size</h5>
					{{ Form::select('finger_id',$fingers,old('finger_id'),['class'=>"form-control {($errors->has('finger_id')) ? 'form-control-danger' : ''}",'v-on:change'=>'setFinger($event)']) }}
					<div class="{{ ($errors->has('finger_id')) ? '' : 'hide' }}">
						<small class="form-control-feedback">{{ $errors->first('finger_id') }}</small>
					</div>
				</div>
			</div>
			@endif
			@if($inventoryItem->metals)
			<div class="row-fluid">
				<hr/>
				<div class="form-group {{ $errors->has('metal_id') ? ' has-danger' : '' }}">
					<h5>Select Metal Type</h5>
					{{ Form::select('metal_id',$metals,old('metal_id'),['class'=>"form-control {($errors->has('metal_id')) ? 'form-control-danger' : ''}",'v-on:change'=>'setMetal($event)']) }}
					<div class="{{ ($errors->has('metal_id')) ? '' : 'hide' }}">
						<small class="form-control-feedback">{{ $errors->first('metal_id') }}</small>
					</div>
				</div>
			</div>
			@endif

			@if($inventoryItem->stones)
			<div class="row-fluid">
				<hr/>
				<div class="form-group {{ $errors->has('stone_id') ? ' has-danger' : '' }}">
					<h5>Select Stone Type</h5>
					{{ Form::select('stone_id',$stone_select,old('stone_id'),['class'=>"form-control {($errors->has('stone_id')) ? 'form-control-danger' : ''}",'v-on:change'=>'setStone($event)']) }}
					<div class="{{ ($errors->has('stone_id')) ? '' : 'hide' }}">
						<small class="form-control-feedback">{{ $errors->first('stone_id') }}</small>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				
				@if (count($inventoryItem->itemStone) > 0)
					@foreach($inventoryItem->itemStone as $stone)
					<div v-if="stoneId == {{ $stone->id }}">
						<hr/>
						<div class="form-group {{ $errors->has("stone_size_id.{$stone->id}") ? ' has-danger' : '' }}">
							<h5>Select Stone Size</h5>
							@if ($stone->stones->email)
							<p>Must contact us for custom price. Please continue the form and we will contact you for further instructions!</p>
							@else
							{{ Form::select('stone_size_id['.$stone->id.']',$stone_sizes[$stone->stone_id],'',['class'=>"form-control {($errors->has('stone_size_id.'.$stone->id)) ? 'form-control-danger' : ''}",'v-on:change'=>'setSize($event)','v-model'=>'sizeId']) }}
							@endif
							<div class="{{ ($errors->has("stone_size_id.{$stone->id}")) ? '' : 'hide' }}">
								<small class="form-control-feedback">{{ $errors->first("stone_size_id.{$stone->id}") }}</small>
							</div>
						</div>						
					</div>
					@endforeach
				@endif
			</div>
			@endif
			<div class="row-fluid">
				<hr/>
				<h5>Subtotal</h5>
				<input id="subtotal" readonly class="form-control" style="background-color:#ffffff; color:#000000;" v-model="subtotalFormatted"/>
			</div>
			<div class="row-fluid">
				<hr/>
				<a class="btn btn-sm btn-secondary" href="#">Back</a>
				<button type="submit" class="btn btn-success btn-sm">Add To Cart</button>
			</div>
		</div>
		
	</div>
</div>


@endsection

@section('modals')
@endsection
@section('variables')

<div id="variable-root" 
	 itemId="{{ $inventoryItem->id }}" 
	 subtotal="{{ number_format($inventoryItem->subtotal, 2,".",",") }}"
	 stoneId="{{ old('stone_id') ? old('stone_id') : '' }}">
	 	
</div>
{!! Form::close() !!}

@endsection