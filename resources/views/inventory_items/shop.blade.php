@extends($layout)
@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/inventory_items/shop.js') }}"></script>
@endsection
@section('styles')
@endsection
@section('header')
{!! Form::open(['method'=>'post','route'=>['home.set-checkout']]) !!}
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
			<div id="slider">
				<div id="myCarousel" class="carousel inventory-carousel slide">
					<!-- main slider carousel items -->
					<div class="carousel-inner">
						@if (count($inventoryItem->images) > 0)
						@foreach($inventoryItem->images as $ikey => $image)
						<div class="{{ ($image->primary == true) ? 'active' : '' }} item carousel-item text-center" data-slide-number="{{ $ikey }}">
							<img src="{{ asset(str_replace('public/', 'storage/', $image->featured_src)) }}" class="card-img-top-featured lazy mx-auto d-block img-fluid">
						</div>
						@endforeach
						@endif
					</div>
					<!-- main slider carousel nav controls -->

				</div>
			</div>
			<hr/>
			<div class="row clearfix">
				@if (count($inventoryItem->images) > 0)

					@foreach($inventoryItem->images as $ikey => $image)
					<div class="col-3 col-md-2 col-lg-2 pull-left {{ ($ikey == 0) ? 'active' : '' }}">
						<a id="carousel-selector-{{ $ikey }}" class="{{ ($ikey == 0) ? 'selected' : '' }}" data-slide-to="{{ $ikey }}" data-target="#myCarousel">
							<img src="{{ asset(str_replace('public/', 'storage/', $image->img_src)) }}" class="img-fluid">
						</a>
					</div>
					@endforeach

				@endif

			</div>
			<hr/>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
			<h1>{{ $inventoryItem->name }}</h1>
			<p>{{ money_format('$%!.2n',$inventoryItem->subtotal) }} (base price before tax and options)</p>
			<p>{{ $inventoryItem->desc }}</p>
			<p><strong>
				While this one-of-a-kind ring has sold, we are able to create a unique version just for you. Gemstones are natural materials; production could take up to 8 weeks as a stone would have to be specially sourced. Requested modifications are subject to revised production timelines and pricing. Please contact us for more information.
			</strong></p>
			<div class="row-fluid">
				<hr/>
				<h5>Quantity</h5>
				{{ Form::select('quantity',[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10],1,['class'=>'form-control','v-on:change'=>'setQuantity($event)']) }}
			</div>
			<div class="row-fluid">
				<hr/>
				<h5>Select Finger Size</h5>
				{{ Form::select('finger_id',$fingers,'',['class'=>'form-control','v-on:change'=>'setFinger($event)']) }}
			</div>
			
			@if($inventoryItem->metals)
			<div class="row-fluid">
				<hr/>
				<h5>Select Metal Type</h5>
				{{ Form::select('metal_id',$metals,'',['class'=>'form-control','v-on:change'=>'setMetal($event)']) }}

			</div>
			@endif

			@if($inventoryItem->stones)
			<div class="row-fluid">
				<hr/>
				<h5>Select Stone Type</h5>
				{{ Form::select('stone_id',$stone_select,'',['class'=>'form-control','v-on:change'=>'setStone($event)']) }}

			</div>
			<div class="row-fluid">
				
				@if (count($stones) > 0)
					@foreach($stones as $stone)
					<div v-if="stoneId == {{ $stone->id }}">
						<hr/>
						<h5>Select Stone Size</h5>
						@if ($stone->email)
						<p>Must contact us for custom price. Please continue the form and we will contact you for further instructions!</p>
						@else
						{{ Form::select('stone_size_id['.$stone->id.']',$stone_sizes[$stone->id],'',['class'=>'form-control','v-on:change'=>'setSize($event)']) }}
						@endif
						
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
				<a class="btn btn-sm btn-secondary" href="{{ route('collection.show',$inventoryItem->collectionItem[0]->id) }}">Back</a>
				<button type="button" class="btn btn-info btn-sm">Add To Cart</button>
				<button type="submit" class="btn btn-success btn-sm">Checkout</button>
			</div>
		</div>
		
	</div>
</div>
{!! Form::close() !!}

@endsection

@section('modals')
@endsection
@section('variables')
<div id="variable-root" itemId="{{ $inventoryItem->id }}" subtotal="{{ money_format('$%!.2n',$inventoryItem->subtotal) }}"></div>
@endsection