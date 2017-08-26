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
				<img class="d-block img-fluid lazy" data-original="img/themes/theme2/large-image-test.jpg" alt="Third slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Zero Compromises</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Zero Compromises</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop Our Collections</a></p>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid lazy" data-original="img/themes/theme2/20170822_153839.jpg" alt="First slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Socially Responsible</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Socially Responsible</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop New Arrivals</a></p>
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid lazy" data-original="img/themes/theme2/20170822_154422.jpg" alt="Second slide">
				<h2 class="text-uppercase text-center header-h2 hidden-sm-down">Eco Friendly</h2>
				<h3 class="text-uppercase text-center header-h3 hidden-md-up">Eco Friendly</h3>
				<p class="text-center"><a class="btn btn-primary" href="{{ route('home.shop') }}">Shop Engagement Rings</a></p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="container-fluid" style="margin-top:100px;">
	<div class="row-fluid">
		<h2 class="text-center header-h2 hidden-sm-down">Instant. Magnetic. Enduring. It's Alchemy.</h2>
		<h3 class="text-center header-h3 hidden-md-up">Instant. Magnetic. Enduring. It's Alchemy.</h3>
	</div>	
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="card">
				<img class="card-img-top lazy" data-original="img/themes/theme2/CE1/_Through_Finger_Grey_Matte Light_Platinum_Diamond.jpg" alt="Card image cap">
				<div class="card-block text-center">
					<p class="card-text">
						<h3 style="margin-bottom:0px;">Hazeline</h3>
						<p><a href="#" class="text-center">Shop the Icon</a></p>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="card">
				<img class="card-img-top lazy" data-original="img/themes/theme2/CE1/_Through_Finger_Grey Matte Light_Yellow Gold_Diamond.jpg" alt="Card image cap">
				<div class="card-block text-center">
					<p class="card-text text-center">
						<h3 style="margin-bottom:0px;">Purple Rain</h3>
						<p><a href="#" class="">Shop Lavender Moon Quartz</a></p>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<img class="card-img-top lazy" data-original="img/themes/theme2/CE1/_Looking_Down_Grey Matte Light_Platinum_Diamond.jpg" alt="Card image cap">
				<div class="card-block text-center">
					<p class="card-text text-center">
						<h3 style="margin-bottom:0px;">Forever Moments</h3>
						<p><a href="#" class="">Shop Eternity Bands</a></p>
					</p>
				</div>
			</div>	
		</div>
		
	</div>
	<section id="instagram">
		<div class="row text-center">
			<h4 class="col-12" style="margin-bottom:0px;">@BlueBonnet</h4>
			<p class="col-12">Everything shiny and new on instagram</p>
		</div>
		<div class="container-fluid slip">
			<div class="grid row">
			@if(count($feed) > 0)
				@foreach($feed as $key => $value)
				<div class="grid-item">

					@if($value['type'] == 1)
					<img class="lazy" src="{{ $value['src'] }}" title="{{ htmlspecialchars($value['caption']) }}" >
					@else
					<video controls height="200" width=200 style="width:100%">
						<source src="{{ $value['src'] }}" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>	
					@endif
				</div>
				@endforeach
			@endif
			</div>
		</div>
	</section>
</div>

@endsection

@section('modals')

@endsection
