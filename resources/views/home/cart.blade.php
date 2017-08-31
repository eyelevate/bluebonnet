@extends($layout)

@section('scripts')
@endsection

@section('styles')

<style type="text/css">
	
@media all and (max-width: 6000px) { /* screen size until 6000px */
    body {
        font-size: 1.5em; /* 1.5x default size */
    }
    .padded-container {

	padding-left:15%;
	padding-right:15%;

	}
	h4 {

	font-size: 1.5rem;
	 margin-top: 0;
    margin-bottom: 5px;
	}
}
@media all and (max-width: 1000px) { /* screen size until 1000px */
    body {
        font-size: 1.2em; /* 1.2x default size */
        }
    .padded-container {

	padding-left:10%;
	padding-right:10%;

	}
	h4 {

	font-size: 1.2rem;
	 margin-top: 0;
    margin-bottom: 5px;

	}
    }
@media all and (max-width: 500px) { /* screen size until 500px */
    body {
        font-size: 0.8em; /* 0.8x default size */
        }
     .padded-container {

	padding-left:5%;
	padding-right:5%;

	}
	h4 {

	font-size: 0.8rem;
	 margin-top: 0;
    margin-bottom: 5px;

	}
    }



</style>

@endsection

@section('header')
@endsection

@section('content')

<div class="row justify-content-center">
  	<h3>Shopping Cart</h3>
</div>

<div class="padded-container">

	<div class="row">
	     <div class="col-4">
	     <img src="img/themes/theme2/editedRings/goldRing01.jpg">
	    </div>
	    <div class="col-4">
	      <h4>Gold Ring 01</h4>
	      <small>Quantity: <div><input class="form-control" type="number" value="1" id="example-number-input"></div></small>
	      <p>Donec id elit non mi porta gravida at eget metus.</p>
	    <small>SKU: GR01-200</small>
	    </div>
	    <div class="col-4">
	     $2,000.00
	    </div>
	</div>

	<hr>

	<div class="row">
	     <div class="col-4">
	     <img src="img/themes/theme2/editedRings/goldRing01.jpg">
	    </div>
	    <div class="col-4">
	      <h4>Gold Ring 01</h4>
	      {{--  Quantity  --}}
	      <small>Quantity: <div><input class="form-control" type="number" value="1" id="example-number-input"></div></small>
	      <p>Donec id elit non mi porta gravida at eget metus.</p>
	    <small>SKU: GR01-200</small>
	    </div>
	    <div class="col-4">
	     $2,000.00
	    </div>
	</div>

	<hr>

	<div class="row">
	     <div class="col-4">
	     <img src="img/themes/theme2/editedRings/goldRing01.jpg">
	    </div>
	    <div class="col-4">
	      <h4>Gold Ring 01</h4>
	      {{--  Quantity  --}}
	      <small>Quantity: <div><input class="form-control" type="number" value="1" id="example-number-input"></div></small>
	      <p>Donec id elit non mi porta gravida at eget metus.</p>
	    <small>SKU: GR01-200</small>
	    </div>
	    <div class="col-4">
	     $2,000.00
	    </div>
	</div>

	<hr>

	<div class="row">
	     <div class="col-4">
	    </div>
	    <div class="col-4">
	    Subtotal
	    </div>
	    <div class="col-4">
	      $6,000.00
	    </div>
	</div>

	<div class="row">
	     <div class="col-4">
	     
	    </div>
	    <div class="col-4">
	    Shipping
	    </div>
	    <div class="col-4">
	      -
	    </div>
	</div>

	<hr>

	<div class="row">
	     <div class="col-4">
	      
	    </div>
	    <div class="col-4">
	    Total
	    </div>
	    <div class="col-4">
	     $6,000.00
	    </div>
	</div>


 <div class="row align-items-center">
          
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-start">
          <a role="button" class="btn btn-primary btn-block" href="/cart">Update Cart</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-start">
 			<hr>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-end">
          <a role="button" class="btn btn-info btn-block" href="/checkout">Checkout</a>
          </div>

      </div>

</div>






{{-- <div class="container hidden-sm-down">
	<div class="row justify-content-center"> --}}



{{-- 			<div class="table-responsive">
				<table class="table-responsive">
					<thead>
						<tr>
							<th><span><h4 class="text-center">Product</h4></span></th>
							<th>&nbsp;</th>
							<th><span><h4 class="text-center">Quantity</h4></span></th>
							<th><span><h4 class="text-center">Price</h4></span></th>
						</tr>
					</thead>
					<hr>
					

					<tbody>

						<tr>
							<td class="product-image">
								<div class="td-wrapper">
									<a href="/products/attelage-pave-cuff-rose-gold-champagne-diamond"><img src="//cdn.shopify.com/s/files/1/0039/8002/products/attelage-pave-cuff-rg-cd-front_medium.jpg?v=1469660819" /></a>
								</div>
							</td>
							<td class="product-title">
								<div class="td-wrapper">


									<h2><a href="/products/attelage-pave-cuff-rose-gold-champagne-diamond"><span>Attelage Pavé Cuff </span></a></h2>

									<h3> Rose Gold &amp; Champagne Diamond</h3>


									<span class="line-item__sku">SKU: ASB28 rg/cd/rh</span>
								</div>
							</td>
							<td class="qty" style="width:25%">
								<div class="td-wrapper">
									<input type="number" 
									name="updates[]" 
									id="updates_18916996229" 
									value="1" />
								</div>
							</td>
							<td class="price">
								<div class="td-wrapper">
									$6,500
								</div>
							</td>
						</tr>           



						<tr>
							<hr>
							<td class="product-image">
								<div class="td-wrapper">
									<a href="/products/bea-hand-harness-sterling-silver-black-diamonds"><img src="//cdn.shopify.com/s/files/1/0039/8002/products/bea_b-18_ss-bd_medium.jpg?v=1491403239" /></a>
								</div>
							</td>
							<td class="product-title">
								<div class="td-wrapper">


									<h2><a href="/products/bea-hand-harness-sterling-silver-black-diamonds"><span>Bea Hand Harness </span></a></h2>

									<h3> Sterling Silver &amp; Black Diamonds</h3>


									<span class="line-item__sku">SKU: ASB18 ss/bd</span>
								</div>
							</td>
							<td class="qty">
								<div class="td-wrapper">
									<input type="number" 
									name="updates[]" 
									id="updates_1063458156" 
									value="1" />
								</div>
							</td>
							<td class="price">
								<div class="td-wrapper">
									$550
								</div>
							</td>
						</tr>           

					</tbody>
				</table>              
			</div>

			<hr>

			<div class="row justify-content-center">
				<div class="col-12 col-md-6">
					<h5 class="fine-print">Special Notes</h5>
					<textarea name="note" 
					placeholder="Enter special instructions or notes here"></textarea>
					<p>
						<a href="/pages/contact"><span>Ask a question</span></a><br />
						<a href="/pages/frequently-asked-questions"><span>see our FAQ</span></a><br />
						or call us at <a href="tel:2129257010"><span>212-925-7010</span></a>
					</p>
				</div>
				<div class="col-12 col-md-6">
					<div class="price-summary">
						<span class="h4 price">Total &nbsp;&nbsp;&nbsp;$7,050</span>
						<br />
						<br />             
						<h5 class="fine-print">Delivery Options</h5>
						<!-- Zapiet | Store Pickup + Delivery -->
						<div id="storePickupApp"></div>
						<!-- Zapiet | Store Pickup + Delivery -->
					</div>

				</div>
			</form>

		</div>

		<div class="row justify-content-center">
			<div class="col">
				<button name="update" class="btn btn-primary">Update Cart</button>	
			</div>
			<div class="col">
				<a name="checkout" type="submit" class="btn btn-primary" href="/checkout">Check Out</button>
			</div>
		</div> 
	</div>    
</div>
</div>





<div class="container hidden-md-up">
	<div class="row justify-content-center">

		<div class="col-md-9">  
			<form action="/cart" method="post" class="form form--cart">
				<h5 class="text-center">
					All rings are made to order and take approximately 4 to 6 weeks to be completed. For rush service of less than 4 weeks, please <a href="/pages/contact">contact us</a> for availability.
				</h5>
			</div>

			<div class="table-responsive">
				<table class="table-responsive">

				

					<tbody>

						<tr>
							<td class="product-image">
								<div class="td-wrapper">
									<a href="/products/attelage-pave-cuff-rose-gold-champagne-diamond"><img src="//cdn.shopify.com/s/files/1/0039/8002/products/attelage-pave-cuff-rg-cd-front_medium.jpg?v=1469660819" /></a>
								</div>
							</td>
							<td class="product-title">
								<div class="td-wrapper">


									<h4><a href="/products/attelage-pave-cuff-rose-gold-champagne-diamond"><span>Attelage Pavé Cuff </span></a></h4>

									<h5> Rose Gold &amp; Champagne Diamond</h5>


									<span class="line-item__sku">SKU: ASB28 rg/cd/rh</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="qty">
								<div class="td-wrapper">
									<input type="number" 
									name="updates[]" 
									id="updates_18916996229" 
									value="1" />
								</div>
							</td>
							<td class="price">
								<div class="td-wrapper">
									$6,500
								</div>
							</td>
						</tr>           

						<hr>

						<tr>
							<td class="product-image">
								<div class="td-wrapper">
									<a href="/products/bea-hand-harness-sterling-silver-black-diamonds"><img src="//cdn.shopify.com/s/files/1/0039/8002/products/bea_b-18_ss-bd_medium.jpg?v=1491403239" /></a>
								</div>
							</td>

							<td class="product-title">
								<div class="td-wrapper">


									<h4><a href="/products/bea-hand-harness-sterling-silver-black-diamonds"><span>Bea Hand Harness </span></a></h4>

									<h5> Sterling Silver &amp; Black Diamonds</h5>


									<span class="line-item__sku">SKU: ASB18 ss/bd</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class="qty">
								<div class="td-wrapper">
									<input type="number" 
									name="updates[]" 
									id="updates_1063458156" 
									value="1" />
								</div>
							</td>
							<td class="price">
								<div class="td-wrapper">
									$550
								</div>
							</td>
						</tr>           

					</tbody>
				</table>              
			</div>


		</form>

	</div>

	<hr>
	<div class="row justify-content-center">
		<div class="col-12 col-md-6">
			<h5 class="fine-print">Special Notes</h5>
			<textarea name="note" 
			placeholder="Enter special instructions or notes here"></textarea>
			<p>
				<a href="/pages/contact"><span>Ask a question</span></a><br />
				<a href="/pages/frequently-asked-questions"><span>see our FAQ</span></a><br />
				or call us at <a href="tel:2129257010"><span>212-925-7010</span></a>
			</p>
		</div>
		<div class="col-12 col-md-6">
			<div class="price-summary">
				<span class="h4 price">Total &nbsp;&nbsp;&nbsp;$7,050</span>
				<br />
				<br />             
				<h5 class="fine-print">Delivery Options</h5>
				<!-- Zapiet | Store Pickup + Delivery -->
				<div id="storePickupApp"></div>
				<!-- Zapiet | Store Pickup + Delivery -->
			</div>

		</div>
	</form>

</div>

<div class="row justify-content-center">
	<div class="col">
		<button name="update" class="btn btn-primary">Update Cart</button>	
	</div>
	<div class="col">
		<button name="checkout" type="submit" class="btn btn-primary">Check Out</button>
	</div>
</div> 
</div>    
</div>
</div> --}}

@endsection
@section('modals')
@endsection
@section('variables')
@endsection

