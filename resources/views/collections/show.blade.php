@extends($layout)
@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/home/shop.js') }}"></script>
@endsection
@section('styles')
@endsection
@section('header')
<div class="container">

</div>
@endsection
@section('content')
<div class="container" style="">
	<h3 class="text-center">{{ $collections->name }}</h3>
	<div class="row">
		@if (count($collections->collectionItem) > 0)
			@foreach($collections->collectionItem as $item)
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
				<a href="{{ route('inventory_item.shop',$item->id) }}">
			<theme1-shop-card 
			class="col-12"
			use-body="true" 
			use-img-top="true" 
			img-top-class="card-img-top-items mx-auto d-block"
			img-top-src="{{ $item->primary_src }}"
			href="{{ route('inventory_item.shop',$item->id) }}">
				<template slot="body">
					<div class="text-center">
						<h5>{{ $item->name }}</h5>
						<a class="btn btn-primary" href="{{ route('inventory_item.shop',$item->id) }}">Shop {{ $item->name }}</a>	
					</div>
				</template>
			</theme1-shop-card>
		</a>
	</div>
			@endforeach
		@endif
	</div>
</div>
@endsection
@section('modals')
@endsection
@section('variables')
@endsection