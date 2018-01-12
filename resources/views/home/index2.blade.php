@extends($layout)
@section('scripts')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="{{ mix('/js/views/home/index.js') }}"></script>
@endsection
@section('header')
<div class="container">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="d-block img-fluid lazy" src="img/themes/theme2/Edited/slider-8.jpg" alt="Third slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Zero Compromises</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Zero Compromises</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop Our Collections</a></p>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid lazy" src="img/themes/theme2/Edited/slider-5.jpg" alt="First slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Socially Responsible</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Socially Responsible</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop Our Collections</a></p>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid lazy" src="img/themes/theme2/Edited/slider-6.jpg" alt="Second slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Eco Friendly</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Eco Friendly</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop Our Collections</a></p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<section id="aboutus" class="container">
	<div class="row-fluid">
		<h2 class="text-center header-h2 hidden-sm-down">About Us</h2>
		<h3 class="text-center header-h3 hidden-md-up">About Us</h3>
	</div>	
	<div class="row">
		<blockquote class="blockquote">
			<p class="mb-0">Freya's Fine Jewelry originally started out in Dallas, Texas and specialized in assisting jewelers with making custom jewelry designs. We are now expanding our business by making our own unique line of jewelry as well as offering custom designs that are available for everyone. The jewelry industry is ever-changing, and our goal is to keep up with the latest designs and ideas so we can give our customers a quality product that they will be proud to own.</p>
			{{--  <footer class="blockquote-footer">CEO & Owner: <cite title="Source Title">K Huh</cite></footer>  --}}
		</blockquote>
	</div>
</section>
<div class="container-fluid" style="margin-top:100px;">
	<div class="row-fluid">
		<h2 class="text-center header-h2 hidden-sm-down">Instant. Magnetic. Enduring. It's Alchemy.</h2>
		<h3 class="text-center header-h3 hidden-md-up">Instant. Magnetic. Enduring. It's Alchemy.</h3>
	</div>	
</div>
<div class="container">
	@if (isset($featured_items))
	<div class="row">
		@foreach($featured_items as $item)
		<div class="col-xs-12 col-sm-6">
			<div class="card">
				<img class="card-img-top card-img-top-featured lazy mx-auto d-block" data-original="{{ $item->primary_img_src }}" alt="{{ $item->name }}">
				<div class="card-block text-center" style="">
					<p class="card-text" style="margin:0px;padding:0px;">
						<h3 style="margin-bottom:0px;">{{ $item->name }}</h3>
						<p><a href="{{ route('inventory_item.shop',$item->id) }}" class="btn btn-primary">Shop {{ $item->name }}</a></p>
					</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
	@if (isset($featured_collection))
	<div class="row">
		<div class="col-12">
			<div class="card">
				<img class="card-img-top card-img-top-collection-featured lazy mx-auto d-block" data-original="{{ asset(str_replace('public/', 'storage/', $featured_collection->featured_src)) }}" alt="{{ $featured_collection->name }}">
				<div class="card-block text-center">
					<p class="card-text text-center">
						<h3 style="margin-bottom:0px;">{{ $featured_collection->name }}</h3>
						<p><a href="{{ route('collection.show',$featured_collection->id) }}" class="btn btn-primary">Featured Collection</a></p>
					</p>
				</div>
			</div>	
		</div>
	</div>
	@endif
	<section id="instagram">
		<div class="row text-center">
			<h4 class="col-12" style="margin-bottom:0px;">@Freyas_Fine_Jewelry</h4>
			<hr>
		</div>
		<div class="container-fluid slip">
			<div class="grid row hidden-sm-down instagram-bootstrap-row">
			@if(count($feed) > 0)
				@foreach($feed as $key => $value)
				

					@if($value['type'] == 1)
					<div class="grid-item">
					<img class="lazy" src="{{ $value['src'] }}" title="{{ htmlspecialchars($value['caption']) }}" style="width:100%; height:100%;">
					</div>
					@else
					<video class="grid-item" controls style="width:100%; height:100%;">
						<source src="{{ $value['src'] }}" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>	
					@endif
					</div>
				@endforeach
			@endif
			</div>
			<div class="row hidden-md-up instagram-bootstrap-row">
			@if(count($feed) > 0)
				@foreach($feed as $key => $value)
					@if($value['type'] == 1)
					<div class="col-6" >
						<img class="lazy" data-original="{{ $value['src'] }}" title="{{ htmlspecialchars($value['caption']) }}">
					</div>
					@else
					<video class="col-6" controls >
						<source src="{{ $value['src'] }}" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
					@endif
				@endforeach
			@endif

			</div>
		</div>
	</section>
</div>

@endsection

@section('modals')

@endsection
