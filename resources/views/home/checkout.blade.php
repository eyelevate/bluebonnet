@extends($layout)

@section('scripts')
@endsection

@section('styles')
<style>

.order-summary{
    padding-right: 10%;
    border-left: 1px solid #ccc;
    padding-left: 10%;

}

.large-order-summary{
    padding-right: 10%;
    padding-left: 10%;

}

.customer-form{
    padding-right: 10%;
    padding-left: 10%;

}

.breadcrumb{
  font-size: 12px;
  background: #fff;
  padding-top: 0px !important;

}

.paypalButton{
    padding-bottom: 20px;

}

.lowmargin{

  margin-bottom: 10px;

}


</style>


@endsection

@section('header')
@endsection

@section('content')

<div class="row justify-content-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
  <div class="customer-form">
      <div class="row justify-content-center">
      <h1 class="lowmargin">Freya's Fine Jewelry</h1>
      </div>
    <div class="row justify-content-center">
      <nav class="breadcrumb">
      <a class="breadcrumb-item" href="/cart">Shopping Cart</a>
      <span class="breadcrumb-item active">Customer Information</span>
      <a class="breadcrumb-item" href="#">Shipping Method</a>
      <a class="breadcrumb-item" href="#">Payment Method</a>
      
      
      </nav>
    </div>
    <div class="row paypalButton justify-content-center">
      <button type="button" class="btn btn-warning btn-sm"><img src="img/themes/theme2/paypal.png" alt="PayPal"></button>
    </div>

    <div class="row">

      <div class="col-5"><hr></div>
      <div class="col-2 d-flex justify-content-center">OR</div>
      <div class="col-5"><hr></div>
        
    </div>
  
  {{-- Customer Form --}}
      <div class="row">
          
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 d-flex justify-content-start">
          <h5>Customer Information</h5>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
          Already have an Account? &nbsp; <a href="/login">Log in</a>
          </div>

      </div>
{{-- Form Row 1 --}}
      <div class="form-group row">
      <div class="col-12">
      <form>
               
                <input type="email" class="form-control" id="Email" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Please enter a valid email address.</small>
              
      </form>
      </div>
      </div>
{{-- Form Row 2 --}}
      <div class="form-group row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <form>
                 
                  <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                  <small id="firstNameHelp" class="form-text text-muted">Please enter your first name.</small>
        </form>
        </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <form>
                     
                      <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                      <small id="lastNameHelp" class="form-text text-muted">Please enter your last name.</small>
                    
              </form>
              </div>
      </div>

{{-- Form Row 3 --}}
      <div class="form-group row">
      <div class="col-12">
      <form>
               
                <input type="text" class="form-control" id="Company" placeholder="Company Name (optional)">
                <small id="companyHelp" class="form-text text-muted">Please enter your company name. (optional)</small>
              
      </form>
      </div>
      </div>

{{-- Shipping Address --}}
         <div class="row">
          
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-start">
              <h5>Shipping Address</h5>
              </div>

          </div>
{{-- Form Row 4 --}}
      <div class="form-group row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <form>
                 
                  <input type="text" class="form-control" id="Address" placeholder="Address">
                  <small id="addressHelp" class="form-text text-muted">Please enter your address.</small>
        </form>
        </div>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <form>
                     
                      <input type="text" class="form-control" id="Address2" placeholder="Apt/Ste/Etc (optional)">
                    
              </form>
              </div>
      </div>
{{-- Form Row 5 --}}
      <div class="form-group row">
      <div class="col-12">
      <form>
               
                <input type="text" class="form-control" id="City" placeholder="City">
                <small id="cityHelp" class="form-text text-muted">Please enter your city.</small>
              
      </form>
      </div>
      </div>
{{-- Form Row 6 --}}
      <div class="form-group row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <form>
                 
                <select class="form-control" id="countrySelect" placeholder="Country">
                <option>United States</option>
                <option>Canada</option>
                <option>Mexico</option>
                <option>UK</option>
                <option>China</option>
                </select>
                <small id="countryHelp" class="form-text text-muted">Country</small>
        </form>
        </div>
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <form>
                     
                <select class="form-control" id="stateSelect" placeholder="State">
                <option>Texas</option>
                <option>California</option>
                <option>Oklahoma</option>
                <option>Washington</option>
                <option>Nevada</option>
                </select>
                <small id="stateHelp" class="form-text text-muted">State</small>
                    
              </form>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <form>
                     
                      <input type="integer" min="0" class="form-control" id="zipCode" placeholder="Zip Code">
                      <small id="zipHelp" class="form-text text-muted">Zip Code</small>
                    
              </form>
              </div>
      </div>
{{-- Form Row 7 --}}
      <div class="form-group row">
      <div class="col-12">
      <form>
               
                <input type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number">
                <small id="phoneHelp" class="form-text text-muted">Please enter a valid phone number.</small>
              
      </form>
      </div>
      </div>

 <div class="row align-items-center">
          
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-start">
          <a href="/cart">< Return to Cart</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
          <button type="button" class="btn btn-info btn-lg">Continue to Shipping Method</button>
          </div>

      </div>
<hr>

<div class="row align-items-center">
          
          <div class="col-12 justify-content-start">
          <a href="#">Refund Policy</a>
          </div>

      </div>


</div>
</div>

{{-- Customer Order Summary Sidebar --}}

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-center">

    <div class="order-summary hidden-md-down">
      @include('layouts.themes.theme2.partials.checkout-side')
    </div>
    <div class="lg-order-summary hidden-lg-up">
      <hr>
      @include('layouts.themes.theme2.partials.checkout-side')
    </div>
</div>
</div>


@endsection
@section('modals')
@endsection
@section('variables')
@endsection
