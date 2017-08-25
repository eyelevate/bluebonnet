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
				<img class="img-fluid d-block lazy" src="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Rose Gold_Diamond.jpg"> 
			</div>
			<div class="col-md-6">
				<img class="img-fluid d-block lazy" src="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Yellow Gold_Diamond.jpg"> 
			</div>
		</div>
	</div>
</div>
<div class="section py-5 text-md-left">
	<div class="container">
		<div class="row hidden-lg-up">
			<div class="col-12">
				<img class="img-fluid d-block lazy" src="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Platinum_Diamond.jpg"> 
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
						<img src="https://pingendo.github.io/templates/app/reviews_logo_1.png" class="img-block mx-auto d-block" width="250">
						<blockquote class="blockquote">
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					</div>
					<div class="carousel-item flex-column">
						<img src="https://pingendo.github.io/templates/app/reviews_logo_2.png" class="img-fluid mx-auto d-block">
						<blockquote class="blockquote">
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
							<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
						</blockquote>
					</div>
					<div class="carousel-item flex-column">
						<img src="https://pingendo.github.io/templates/app/reviews_logo_3.png" class="img-fluid mx-auto d-block">
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
				<img class="img-fluid d-block lazy" src="img/themes/theme1/20170822_154703.jpg" draggable="true"> </div>
				<div class="col-md-5 my-3"> 
					<p>"Ultimately, we want our jewelry to represent true and lasting love. To us, this means making hard decisions so that we can truthfully stand for human rights, sustainability and quality at every level of production. We love the jewelry industry
					and we strive to create a product without compromise, a business that honors life and land, and a community that satisfies our customers' insistence on truth and consistency. We are proud to be a part of this and hope that you will be too.”
					-L Ramirez 
					</p>
				</div>
		</div>

		<div class="row hidden-lg-up">
			<div class="col-12">
				<img class="img-fluid d-block lazy" src="img/themes/theme1/CE1/_Looking_Down_Grey Matte Light_Yellow Gold_Diamond.jpg"> 
			</div>
		</div>
	</div>
</div>
<div class="text-center">
	<div class="container-fluid slip">

		<h1 class="text-uppercase hidden-md-down">Follow Us on Instagram!</h1>
		<h4 class="text-uppercase hidden-lg-up">Follow Us on Instagram!</h4>
		<div class="grid row">
			<div class="grid-item">
				<a href="#">
					<img class="lazy" 
						src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/599195a3197aea88ba1dbdef/1502713257154/P1030507e.jpg"
						title="Image 1" >
					</a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/5981e168914e6b3988e79210/1488377636767/" title="Image 2" ></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/598d85f5a5790a4026d6ee8f/1502447718630/hyen%2Band%2Bfriend%2Bswimming.jpg" title="Image 14"></a>
			</div>

			<div class="grid-item ">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/598df929be42d6a99f048666/1502476614304/cut+and+sticke.jpg" title="Image 3"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/5981e1aa14fd83e61028a218/1501684138200/" title="Image 4"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/59957774ff7c503027e33172/1502967675902/life+in+the+city+large+a1+collage+croppedsmall.jpg" title="Image 5"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/59919703e6f2e104f71324d3/1502713609725/P1030519e.jpg" title="Image 6"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/598df7ca7131a54f72664499/1502476245598/Screen+Shot+2016-10-17+at+14.46.44.png" title="Image 7"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/58b6d0ed3045448f30392224/1488376045394/" title="Image 8"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/58b6d52803596ebbb69d685d/1488374519859/" title="Image 9"></a>
			</div>
			<div class="grid-item ">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/58b6c62d85c5bd680c855dca/1488373293052/" title="Image 10"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/58b6d059d2b857a4ad9dc2a4/1488375516928/" title="Image 11"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/599194e8be42d6a167496aea/1502713070845/P1030513e.jpg" title="Image 12"></a>
			</div>
			<div class="grid-item">
				<a href="#"><img class="lazy" src="https://static1.squarespace.com/static/56cafe1b3c44d834793d8daf/t/5995767a15d5db786f0e8124/1502967423710/Untitled_Panorama1+cropped+small.jpg" title="Image 13"></a>
			</div>

			
		</div>
	</div>
</div>
@endsection

@section('modals')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="now-ui-icons ui-1_simple-remove"></i>
				</button>
				<h4 class="title title-up">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default">Nice Button</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
<!-- Mini Modal -->
<div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="modal-profile">
					<i class="now-ui-icons users_circle-08"></i>
				</div>
			</div>
			<div class="modal-body">
				<p>Always have an access to your profile</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link btn-neutral">Back</button>
				<button type="button" class="btn btn-link btn-neutral" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
