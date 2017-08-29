@extends($layout)
@section('scripts')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="{{ mix('/js/views/home/index.js') }}"></script>
@endsection
@section('header')
<header class="page-header">
	<div class="page-header-image"></div>
	<div class="container-fluid hidden-md-down">
		<div class="row-fluid" style="padding-top:100px; padding-bottom:100px;">
			<div class="text-right col-12">
				<h2 class="text-uppercase" style="color:#ffffff;">Socially Responsible</h2>
				<h2 class="text-uppercase" style="color:#ffffff;">Eco Friendly</h2>
				<h2 class="text-uppercase" style="color:#ffffff;">Zero Compromises</h2>
				<br>
				<a href="{{ route('home.shop') }}" class="btn btn-primary btn-lg" style="color:#000000;">
					Shop Now
				</a>
			</div>
		</div>
	</div>
	<div class="container-fluid hidden-lg-up" style="background-color: rgba(0,0,0,0.5); height:100%;">
		<div class="row-fluid" style="padding-top:100px; padding-bottom:100px;">
			<div class="text-center col-12">
				<h3 class="text-uppercase" style="color:#ffffff;">Socially Responsible</h3>
				<h3 class="text-uppercase" style="color:#ffffff;">Eco Friendly</h3>
				<h3 class="text-uppercase" style="color:#ffffff;">Zero Compromises</h3>
				<br>
				<a href="{{ route('home.shop') }}" class="btn btn-primary btn-lg" style="color:#000000; z-index:9999">
					Shop Now
				</a>
			</div>
		</div>
	</div>
</header>


@endsection

@section('content')
<div class="text-md-left section py-5 " >
	<div class="container">

		<div class="row">
			<div class="col-md-7 my-3 align-self-center">
				<h1 class="my-3 text-uppercase hidden-md-down">Who We Are</h1>
				<h3 class="my-3 text-uppercase hidden-lg-up">Who We Are</h3>
			</div>
			<div class="col-md-5 my-3"> 
				<p>We are jewelry lovers with a passion for responsibly sourced gemstones and diamonds that are not only affordable, but beautiful! We don't believe in compromising these principles and this applies to every aspect of the jewelry making process!
				</p>
			</div>
		</div>
	</div>
</div>
<div class="hidden-md-down">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="img-fluid d-block lazy" data-original="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Rose Gold_Diamond.jpg"> 
			</div>
			<div class="col-md-6">
				<img class="img-fluid d-block lazy" data-original="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Yellow Gold_Diamond.jpg"> 
			</div>
		</div>
	</div>
</div>

<div class="section py-5 text-md-left">
	<div class="container">
		<div class="row hidden-lg-up">
			<div class="col-12">
				<img class="img-fluid d-block lazy" data-original="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Platinum_Diamond.jpg"> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 my-3 align-self-center">
				<h1 class="my-3 text-uppercase hidden-md-down">What We Do</h1>
				<h3 class="my-3 text-uppercase hidden-lg-up">What We Do</h3>
			</div>
			<div class="col-md-5 my-3"> 
				<p>We are committed to creating beautiful yet sustainable jewelry that is made right here by our local artisans of recycled metals and a variety of gemstones you can be proud to wear! 
				</p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active flex-column mx-auto">
						<img data-original="https://pingendo.github.io/templates/app/reviews_logo_1.png" class="img-block mx-auto d-block" width="250">
						<blockquote class="blockquote">
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					</div>

					<div class="carousel-item flex-column">
						<img data-original="https://pingendo.github.io/templates/app/reviews_logo_2.png" class="img-fluid mx-auto d-block">
						<blockquote class="blockquote">
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					</div>
					
					<div class="carousel-item flex-column">
						<img data-original="https://pingendo.github.io/templates/app/reviews_logo_3.png" class="img-fluid mx-auto d-block">
						<blockquote class="blockquote">
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span></a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>
</div>

<div class="section py-5 text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-md-7 my-3 ">
				<img class="img-fluid d-block lazy" data-original="img/themes/theme1/20170822_154703.jpg" draggable="true"> </div>
				<div class="col-md-5 my-3"> 
					<p>"Ultimately, we want our jewelry to represent true and lasting love. To us, this means making hard decisions so that we can truthfully stand for human rights, sustainability and quality at every level of production. We love the jewelry industry
					and we strive to create a product without compromise, a business that honors life and land, and a community that satisfies our customers' insistence on truth and consistency. We are proud to be a part of this and hope that you will be too.”
					-L Ramirez 
					</p>
				</div>
		</div>

		<div class="row hidden-lg-up">
			<div class="col-12">
				<img class="img-fluid d-block lazy" data-original="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Yellow Gold_Diamond.jpg"> 
			</div>
		</div>
	</div>
</div>
<div class="text-center">
	<div class="container-fluid slip">

		<h1 class="text-uppercase hidden-md-down">Follow Us on Instagram!</h1>
		<h4 class="text-uppercase hidden-lg-up">Follow Us on Instagram!</h4>
		<div class="grid row">
		@if(count($feed) > 0)
			@foreach($feed as $key => $value)
			<div class="grid-item" style="padding: 1%;">

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
</div>
@endsection

@section('modals')

@endsection
