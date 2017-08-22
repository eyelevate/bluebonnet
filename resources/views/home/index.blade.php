@extends('layouts.themes.theme1.layout')

@section('header')
<div class="cover d-flex align-items-center pt-5 bg-primary" id="cover-main" style="background-image: url(&quot;https://pingendo.com/assets/photos/wireframe/photo-1.jpg&quot;); 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height:600px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-right">
					<h2 class="text-uppercase">Socially Responsible</h2>
					<h2 class="text-uppercase">Eco Friendly</h2>
					<h2 class="text-uppercase">Zero Compromises</h2>
					<br>
					<a class="btn btn-secondary btn-lg">
						Shop Now
					</a>
				</div>
			</div>
		</div>
		<br/>
		<br/>
	</div>
</div>
@endsection

@section('content')
<div class="section py-5 text-md-left" id="app">
	<div class="container">
		<div class="row">
			<div class="col-md-7 my-3 align-self-center">
				<h1 class="my-3 text-uppercase">Who We Are</h1>
			</div>
			<div class="col-md-5 my-3"> 
				<p>We are jewelry lovers with a passion for responsibly sourced gemstones and diamonds that are not only affordable, but beautiful! We don't believe in compromising these principles and this applies to every aspect of the jewelry making process!
				</p>
			</div>
		</div>
	</div>
</div>
<div class="section py-5">
	<div class="container">
		<div class="row pi-draggable" draggable="true">
			<div class="col-md-4">
				<img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
				<div class="col-md-4">
					<img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
					<div class="col-md-4">
						<img class="img-fluid d-block" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg"> </div>
					</div>
				</div>
			</div>
			<div class="section py-5 text-md-left" id="app">
				<div class="container">
					<div class="row">
						<div class="col-md-7 my-3 align-self-center">
							<h1 class="my-3 text-uppercase">What We Do</h1>
						</div>
						<div class="col-md-5 my-3"> 
							<p>We are committed to creating beautiful yet sustainable jewelry that is made right here by our local artisans of recycled metals and a variety of gemstones you can be proud to wear! 
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="py-5 section bg-faded" id="reviews">
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
			</div>
			<div class="section py-5 text-md-left">
				<div class="container">
					<div class="row">
						<div class="col-md-7 my-3 ">
							<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
							<div class="col-md-5 my-3"> 
								<p>"Ultimately, we want our jewelry to represent true and lasting love. To us, this means making hard decisions so that we can truthfully stand for human rights, sustainability and quality at every level of production. We love the jewelry industry
								and we strive to create a product without compromise, a business that honors life and land, and a community that satisfies our customers' insistence on truth and consistency. We are proud to be a part of this and hope that you will be too.”
								-L Ramirez 
								</p>
							</div>
							</div>
						</div>
					</div>
					<div class="section py-5 text-md-center">
						<div class="container hidden-sm-down">
							<h1 class="text-uppercase">Follow Us on Instagram!</h1>
							<div class="row">
								<div class="col-3">
									<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
									<div class="col-3">
										<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
										<div class="col-3">
											<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
											<div class="col-3">
												<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
											</div>
											<br>
											<div class="row">
												<div class="col-3">
													<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
													<div class="col-3">
														<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
														<div class="col-3">
															<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
															<div class="col-3">
																<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
															</div>
														</div>
														<div class="container hidden-md-up">
															<h1 class="text-uppercase">Follow Us on Instagram!</h1>
															<div class="row">
																<div class="col-6">
																	<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																	<div class="col-6">
																		<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col-6">
																			<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																			<div class="col-6">
																				<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																			</div>
																			<br>
																			<div class="row">
																				<div class="col-6">
																					<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																					<div class="col-6">
																						<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																					</div>
																					<br>
																					<div class="row">
																						<div class="col-6">
																							<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
																							<div class="col-6">
																								<img class="img-fluid d-block pi-draggable" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg" draggable="true"> </div>
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
