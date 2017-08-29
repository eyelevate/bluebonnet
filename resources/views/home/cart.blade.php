@extends($layout)

@section('scripts')
@endsection

@section('header')
@endsection

@section('content')

<div class="container hidden-sm-down">
  <div class="row justify-content-center">

    <div class="col-md-9">  
      <form action="/cart" method="post" class="form form--cart">
        <h5 class="text-center">
          All rings are made to order and take approximately 4 to 6 weeks to be completed. For rush service of less than 4 weeks, please <a href="/pages/contact">contact us</a> for availability.
        </h5>
    </div>
        
        <div class="table-responsive">
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
            {{-- In Cart Product display --}}

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
              <button name="checkout" type="submit" class="btn btn-primary">Check Out</button>
              </div>
          </div> 
  </div>    
</div>
      </div>



      {{-- Mobile Sizes --}}

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
            
            {{-- In Cart Product display --}}

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
</div>

@endsection

@section('modals')
@endsection
