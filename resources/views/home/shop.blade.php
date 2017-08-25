@extends($layout)
@section('scripts')
<script type="text/javascript" src="{{ mix('js/views/home/shop.js') }}"></script>
@endsection
@section('styles')
@endsection
@section('header')
<div class="container">
	<div class="row-fluid" style="">
		<theme1-shop-card 
			use-body="true" 
			use-img-top="true" 
			img-top-class="shop-header">
			<template slot="body">
				<div class="text-center">
					<blockquote class="blockquote">
						<p class="mb-0 text-left">We believe that choosing a conflict free center stone sets the bar high!  Whether your center stone is lab grown, ethically sourced or inherited, we take extra care in building sustainable and beautiful rings that meet your high standards! 
						</p>
					</blockquote>
				</div>
				
			</template>
		</theme1-shop-card>
	</div>
</div>
@endsection
@section('content')
<div class="container" style="">
	<h3 class="text-center">OUR COLLECTIONS</h3>
	<div class="row">
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
		<theme1-shop-card 
			class="col-xs-12 col-sm-6 col-md-4"
			use-body="true" 
			use-img-top="true" 
			img-top-src="img/themes/theme1/CE2/_Looking Down_Grey Matte Light_Platinum_Diamond.jpg">
			<template slot="body">
				<div class="text-center">
					<h5>The New Classics</h5>
					<a class="btn btn-primary" href="#">View Collection</a>	
				</div>
				
			</template>
		</theme1-shop-card>
	</div>
</div>
@endsection
@section('modals')
@endsection
@section('variables')
@endsection