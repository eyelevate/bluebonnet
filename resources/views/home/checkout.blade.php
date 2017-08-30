@extends($layout)

@section('scripts')
@endsection

@section('styles')
<style>

.order-summary{
    padding-right: 50px;
    border-left: 1px solid #ccc;
    padding-left: 50px;

}

.customer-form{
    padding-right: 50px;
    padding-left: 50px;

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
      <h1>Freya's Fine Jewelry</h1>
      </div>
    <div class="row justify-content-center">
      <nav class="breadcrumb">
      <a class="breadcrumb-item" href="/">Home</a>
      <a class="breadcrumb-item" href="/shop">Shop</a>
      <a class="breadcrumb-item" href="/cart">Shopping Cart</a>
      <span class="breadcrumb-item active">Checkout</span>
      </nav>
    </div>
    <div class="row justify-content-center">
      <button type="button" class="btn btn-warning"><img src="//cdn.shopify.com/s/assets/checkout/easy-checkout-btn-paypal-9835af2c2b0e2a543b2905789a7f08b678d62de2c77c1b0d16fd7689aff463f3.png" alt="PayPal"></button>
    </div>

    <div class="row">

      <div class="col-5"><hr></div>
      <div class="col-2 d-flex justify-content-center">OR</div>
      <div class="col-5"><hr></div>
        
    </div>
  
  {{-- Customer Form --}}
      <div class="row">
          
          <div class="col-6 d-flex justify-content-start">
          <h5>Customer Information</h5>
          </div>
          <div class="col-6 d-flex justify-content-end">
          Already have an Account? &nbsp; <a href="#">Log in</a>
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
        <div class="col-6">
        <form>
                 
                  <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                  <small id="firstNameHelp" class="form-text text-muted">Please enter your first name.</small>
        </form>
        </div>
              <div class="col-6">
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
          
              <div class="col-6 d-flex justify-content-start">
              <h5>Shipping Address</h5>
              </div>

          </div>
{{-- Form Row 4 --}}
      <div class="form-group row">
        <div class="col-8">
        <form>
                 
                  <input type="text" class="form-control" id="Address" placeholder="Address">
                  <small id="addressHelp" class="form-text text-muted">Please enter your address.</small>
        </form>
        </div>
              <div class="col-4">
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
        <div class="col-6">
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
              <div class="col-3">
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
              <div class="col-3">
              <form>
                     
                      <input type="number" class="form-control" id="zipCode" placeholder="Zip Code">
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


</div>
</div>

{{-- Customer Order Summary Sidebar --}}

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-center">

    <div class="order-summary hidden-md-down">
      @include('layouts.themes.theme2.partials.checkout-side')
    </div>
    <div class="hidden-lg-up">
      <hr>
      @include('layouts.themes.theme2.partials.checkout-side')
    </div>
</div>
</div>

{{-- <div class="banner" data-header>
<div class="wrap">
        
<a href="https://www.annasheffield.com" class="logo logo--center">
    <h1 class="logo__text visually-hidden">Anna Sheffield Jewelry</h1>
    <img alt="Anna Sheffield Jewelry" class="logo__image logo__image--small" src="//cdn.shopify.com/s/files/1/0039/8002/files/logo.jpg?12345709250930579744" />
</a>

      </div>
    </div>

    <button class="order-summary-toggle order-summary-toggle--show" data-drawer-toggle="[data-order-summary]">
  <div class="wrap">
    <div class="order-summary-toggle__inner">
      <div class="order-summary-toggle__icon-wrapper">
        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
          <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"/>
        </svg>
      </div>
      <div class="order-summary-toggle__text order-summary-toggle__text--show">
        <span>Show order summary</span>
        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z" /></svg>
      </div>
      <div class="order-summary-toggle__text order-summary-toggle__text--hide">
        <span>Hide order summary</span>
        <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z" /></svg>
      </div>
      <div class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
        <span class="total-recap__final-price" data-checkout-payment-due-target="705000">$7,050.00</span>
      </div>
    </div>
  </div>
</button>


    <div class="content" data-content>
      <div class="wrap">
        <div class="sidebar" role="complementary">
          <div class="sidebar__header">
            
<a href="https://www.annasheffield.com" class="logo logo--center">
    <h1 class="logo__text visually-hidden">Anna Sheffield Jewelry</h1>
    <img alt="Anna Sheffield Jewelry" class="logo__image logo__image--small" src="//cdn.shopify.com/s/files/1/0039/8002/files/logo.jpg?12345709250930579744" />
</a>

          </div>
          <div class="sidebar__content">
            <div class="order-summary order-summary--is-collapsed" data-order-summary>
  <h2 class="visually-hidden">Order summary</h2>

  <div class="order-summary__sections">
    <div class="order-summary__section order-summary__section--product-list">
  <div class="order-summary__section__content">
    <table class="product-table">
      <caption class="visually-hidden">Shopping cart</caption>
      <thead>
        <tr>
          <th scope="col"><span class="visually-hidden">Product image</span></th>
          <th scope="col"><span class="visually-hidden">Description</span></th>
          <th scope="col"><span class="visually-hidden">Quantity</span></th>
          <th scope="col"><span class="visually-hidden">Price</span></th>
        </tr>
      </thead>
      <tbody data-order-summary-section="line-items">
        <tr class="product" data-product-id="5904256965" data-variant-id="18916996229" data-product-type="Bracelets">
          <td class="product__image">
            <div class="product-thumbnail">
  <div class="product-thumbnail__wrapper">
    <img alt="Attelage Pavé Cuff - Rose Gold & Champagne Diamond" class="product-thumbnail__image" src="//cdn.shopify.com/s/files/1/0039/8002/products/attelage-pave-cuff-rg-cd-front_small.jpg?12345709250930579744" />
  </div>
    <span class="product-thumbnail__quantity" aria-hidden="true">1</span>
</div>

          </td>
          <td class="product__description">
            <span class="product__description__name order-summary__emphasis">Attelage Pavé Cuff - Rose Gold & Champagne Diamond</span>
            <span class="product__description__variant order-summary__small-text"></span>

          </td>
          <td class="product__quantity visually-hidden">
            1
          </td>
          <td class="product__price">
            <span class="order-summary__emphasis">$6,500.00</span>
          </td>
        </tr>
        <tr class="product" data-product-id="395077424" data-variant-id="1063458156" data-product-type="Bracelets">
          <td class="product__image">
            <div class="product-thumbnail">
  <div class="product-thumbnail__wrapper">
    <img alt="Bea Hand Harness - Sterling Silver & Black Diamonds" class="product-thumbnail__image" src="//cdn.shopify.com/s/files/1/0039/8002/products/bea_b-18_ss-bd_small.jpg?12345709250930579744" />
  </div>
    <span class="product-thumbnail__quantity" aria-hidden="true">1</span>
</div>

          </td>
          <td class="product__description">
            <span class="product__description__name order-summary__emphasis">Bea Hand Harness - Sterling Silver & Black Diamonds</span>
            <span class="product__description__variant order-summary__small-text"></span>

          </td>
          <td class="product__quantity visually-hidden">
            1
          </td>
          <td class="product__price">
            <span class="order-summary__emphasis">$550.00</span>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="order-summary__scroll-indicator">
      Scroll for more items
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12"><path d="M9.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L4.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/></svg>
    </div>
  </div>
</div>


      <div class="order-summary__section order-summary__section--discount" data-reduction-form="update">
        <form class="edit_checkout" action="/398002/checkouts/7d65685aaef99438fa1fc7a935fe6b7a" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="iLUglKVSDCyAlN6n/dLlUPssfWTRDTAdvvFjHYiMDR760sW9BUaS/UxnP+hxtUwgn4Quop7/kZp+6pHjcCJA9Q==" />
  <input type="hidden" name="step" value="contact_information" />

  <div class="fieldset">
    <div class="field ">
      <label class="field__label" for="checkout_reduction_code">Gift card or discount code</label>
      <div class="field__input-btn-wrapper">
        <div class="field__input-wrapper">
          <input placeholder="Gift card or discount code" class="field__input" data-discount-field="true" autocomplete="off" aria-required="true" size="30" type="text" name="checkout[reduction_code]" id="checkout_reduction_code" />
        </div>

        <button type="submit" class="field__input-btn btn btn--disabled">
          <span class="btn__content visually-hidden-on-mobile">Apply</span>
          <i class="btn__content shown-on-mobile icon icon--arrow"></i>
          <i class="btn__spinner icon icon--button-spinner"></i>
        </button>
      </div>

    </div>
  </div>
</form>
<form class="edit_checkout" action="/398002/checkouts/7d65685aaef99438fa1fc7a935fe6b7a" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="BJOPobUtsG0LApbaRkhCC4CC2Ta7WOyAJabfwBNW3YV29GqIFTkuvMfxd5XKL+t75CqK8PSqTQflvS0+6/iQbg==" />
  <input type="hidden" name="step" value="contact_information" />

</form>
      </div>

    <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
      <table class="total-line-table" aria-live="polite" aria-atomic="true">
  <caption class="visually-hidden">Cost summary</caption>
  <thead>
    <tr>
      <th scope="col"><span class="visually-hidden">Description</span></th>
      <th scope="col"><span class="visually-hidden">Price</span></th>
    </tr>
  </thead>
    <tbody class="total-line-table__tbody">
      <tr class="total-line total-line--subtotal">
        <td class="total-line__name">Subtotal</td>
        <td class="total-line__price">
          <span class="order-summary__emphasis" data-checkout-subtotal-price-target="705000">
            $7,050.00
          </span>
        </td>
      </tr>


        <tr class="total-line total-line--shipping">
          <td class="total-line__name">Shipping</td>
          <td class="total-line__price">
            <span class="order-summary__emphasis" data-checkout-total-shipping-target="0">
              —
            </span>
          </td>
        </tr>

        <tr class="total-line total-line--taxes hidden" data-checkout-taxes>
          <td class="total-line__name">Taxes</td>
          <td class="total-line__price">
            <span class="order-summary__emphasis" data-checkout-total-taxes-target="0">$0.00</span>
          </td>
        </tr>

    </tbody>
  <tfoot class="total-line-table__footer">
    <tr class="total-line">
      <td class="total-line__name payment-due-label">
        <span class="payment-due-label__total">Total</span>
      </td>
      <td class="total-line__price payment-due">
          <span class="payment-due__currency">USD</span>
        <span class="payment-due__price" data-checkout-payment-due-target="705000">
          $7,050.00
        </span>
      </td>
    </tr>
  </tfoot>
</table>

    </div>
  </div>
</div>

          </div>
        </div>
        <div class="main" role="main">
          <div class="main__header">
            
<a href="https://www.annasheffield.com" class="logo logo--center">
    <h1 class="logo__text visually-hidden">Anna Sheffield Jewelry</h1>
    <img alt="Anna Sheffield Jewelry" class="logo__image logo__image--small" src="//cdn.shopify.com/s/files/1/0039/8002/files/logo.jpg?12345709250930579744" />
</a>

              <ul class="breadcrumb breadcrumb--center">
      <li class="breadcrumb__item breadcrumb__item--completed">
        <a class="breadcrumb__link" href="https://www.annasheffield.com/cart">Cart</a>
        <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/></svg>
      </li>

      <li class="breadcrumb__item breadcrumb__item--current">
        <span class="breadcrumb__text">Customer information</span>
          <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/></svg>
      </li>
      <li class="breadcrumb__item breadcrumb__item--blank">
        <span class="breadcrumb__text">Shipping method</span>
          <svg class="icon-svg icon-svg--size-10 breadcrumb__chevron-icon rtl-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/></svg>
      </li>
      <li class="breadcrumb__item breadcrumb__item--blank">
        <span class="breadcrumb__text">Payment method</span>
      </li>
  </ul>

            <div data-alternative-payments>
    <div class="alt-payment-list-container">
      <ul class="alt-payment-list alt-payment-list--center">

          <li class="alt-payment-list__item alt-payment-list__item--paypal">
            <a class="alt-payment-list__item__link" id="paypal-express-checkout-btn" href="/398002/checkouts/7d65685aaef99438fa1fc7a935fe6b7a/express/redirect"><img alt="Checkout with: PayPal" class="alt-payment-list__item__logo" src="//cdn.shopify.com/s/assets/checkout/easy-checkout-btn-paypal-9835af2c2b0e2a543b2905789a7f08b678d62de2c77c1b0d16fd7689aff463f3.png" /></a>
          </li>

      </ul>
    </div>

    <div class="alternative-payment-separator" data-alternative-payment-separator>
      <span class="alternative-payment-separator__content">
        OR
      </span>
    </div>
</div>

          </div>
          <div class="main__content">
            <div class="step" data-step="contact_information">
  <form novalidate="novalidate" class="edit_checkout" data-customer-information-form="true" data-email-or-phone="false" action="/398002/checkouts/7d65685aaef99438fa1fc7a935fe6b7a" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="crG0+r2W6Sdmgb+XWMVvIzuMJt+fL5xQghc0yLkgNSQA1lHTHYJ39qpyXtjUosZTXyR1GdDdPddCDMY2QY54zw==" />

  <input type="hidden" name="previous_step" id="previous_step" value="contact_information" />
  <input type="hidden" name="step" value="shipping_method" />

  <div class="step__sections">
      
<div class="section section--contact-information">
  <div class="section__header">
    <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
      <h2 class="section__title layout-flex__item layout-flex__item--stretch">Customer information</h2>

        <p class="layout-flex__item">
          <span aria-hidden="true">Already have an account?</span>
          <a href="/account/login?checkout_url=%2F398002%2Fcheckouts%2F7d65685aaef99438fa1fc7a935fe6b7a%3Fstep%3Dcontact_information">
            <span class="visually-hidden">Already have an account?</span>
            Log in
</a>        </p>
    </div>
  </div>
  <div class="section__content" data-section="customer-information">
        <div class="fieldset">
          <div class="field field--required">
            <label class="field__label" for="checkout_email">Email</label>
            <div class="field__input-wrapper">
              <input placeholder="Email" autocapitalize="off" spellcheck="false" autocomplete="shipping email" data-remember-me-handle="true" data-autofocus="true" data-backup="customer_email" class="field__input" aria-required="true" size="30" type="email" name="checkout[email]" id="checkout_email" />
            </div>
</div>        </div> 

        <div class="fieldset-description" data-buyer-accepts-marketing>
          <div class="section__content">
            <div class="checkbox-wrapper">
  <div class="checkbox__input">
    <input name="checkout[buyer_accepts_marketing]" type="hidden" value="0" /><input class="input-checkbox" data-backup="buyer_accepts_marketing" type="checkbox" value="1" checked="checked" name="checkout[buyer_accepts_marketing]" id="checkout_buyer_accepts_marketing" />
  </div>
  <label class="checkbox__label" for="checkout_buyer_accepts_marketing">
    Subscribe to our newsletter
</label></div>

          </div>
        </div>
  </div> 
</div> 


  <div class="section section--shipping-address" data-shipping-address
                                                    data-update-order-summary>

    <div class="section__header">
      <h2 class="section__title">
          Shipping address
      </h2>
    </div>

    <div class="section__content">
      <div class="fieldset" data-address-fields>

        <input class="visually-hidden" autocomplete="shipping given-name" tabindex="-1" data-autocomplete-field="first_name" aria-required="true" size="30" type="text" name="checkout[shipping_address][first_name]" />
<input class="visually-hidden" autocomplete="shipping family-name" tabindex="-1" data-autocomplete-field="last_name" aria-required="true" size="30" type="text" name="checkout[shipping_address][last_name]" />
<input class="visually-hidden" autocomplete="shipping organization" tabindex="-1" data-autocomplete-field="company" size="30" type="text" name="checkout[shipping_address][company]" />
<input class="visually-hidden" autocomplete="shipping address-line1" tabindex="-1" data-autocomplete-field="address1" aria-required="true" size="30" type="text" name="checkout[shipping_address][address1]" />
<input class="visually-hidden" autocomplete="shipping address-line2" tabindex="-1" data-autocomplete-field="address2" size="30" type="text" name="checkout[shipping_address][address2]" />
<input class="visually-hidden" autocomplete="shipping address-level2" tabindex="-1" data-autocomplete-field="city" aria-required="true" size="30" type="text" name="checkout[shipping_address][city]" />
<input class="visually-hidden" autocomplete="shipping country" tabindex="-1" data-autocomplete-field="country" aria-required="true" size="30" type="text" name="checkout[shipping_address][country]" />
<input class="visually-hidden" autocomplete="shipping address-level1" tabindex="-1" data-autocomplete-field="province" aria-required="true" size="30" type="text" name="checkout[shipping_address][province]" />
<input class="visually-hidden" autocomplete="shipping postal-code" tabindex="-1" data-autocomplete-field="zip" aria-required="true" size="30" type="text" name="checkout[shipping_address][zip]" />
<input class="visually-hidden" autocomplete="shipping tel" tabindex="-1" data-autocomplete-field="phone" aria-required="true" size="30" type="text" name="checkout[shipping_address][phone]" />


<div class="field--half field field--required" data-address-field="first_name">
  <label class="field__label" for="checkout_shipping_address_first_name">First name</label>
  <div class="field__input-wrapper">
    <input placeholder="First name" autocomplete="shipping given-name" data-backup="first_name" class="field__input" aria-required="true" size="30" type="text" name="checkout[shipping_address][first_name]" id="checkout_shipping_address_first_name" />
  </div>
</div>
<div class="field--half field field--required" data-address-field="last_name">
  <label class="field__label" for="checkout_shipping_address_last_name">Last name</label>
  <div class="field__input-wrapper">
    <input placeholder="Last name" autocomplete="shipping family-name" data-backup="last_name" class="field__input" aria-required="true" size="30" type="text" name="checkout[shipping_address][last_name]" id="checkout_shipping_address_last_name" />
  </div>
</div>
  <div data-address-field="company" class="field field--optional">
    <label class="field__label" for="checkout_shipping_address_company">Company (optional)</label>
    <div class="field__input-wrapper">
      <input placeholder="Company (optional)" autocomplete="shipping organization" data-backup="company" class="field__input" size="30" type="text" name="checkout[shipping_address][company]" id="checkout_shipping_address_company" />
    </div>
</div>
<div class="field--two-thirds field field--required" data-address-field="address1" data-google-places="true">
  <label class="field__label" for="checkout_shipping_address_address1">Address</label>
  <div class="field__input-wrapper">
    <input placeholder="Address" autocomplete="shipping address-line1" data-backup="address1" data-google-autocomplete="true" data-google-autocomplete-title="Suggestions" class="field__input" aria-required="true" size="30" type="text" name="checkout[shipping_address][address1]" id="checkout_shipping_address_address1" />
  </div>
</div>
  <div class="field--third field field--optional" data-address-field="address2">
    <label class="field__label" for="checkout_shipping_address_address2">Apt, suite, etc. (optional)</label>
    <div class="field__input-wrapper">
      <input placeholder="Apt, suite, etc. (optional)" autocomplete="shipping address-line2" data-backup="address2" class="field__input" size="30" type="text" name="checkout[shipping_address][address2]" id="checkout_shipping_address_address2" />
    </div>
</div>
<div data-address-field="city" data-google-places="true" class="field field--required">
  <label class="field__label" for="checkout_shipping_address_city">City</label>
  <div class="field__input-wrapper">
    <input placeholder="City" autocomplete="shipping address-level2" data-backup="city" class="field__input" aria-required="true" size="30" type="text" name="checkout[shipping_address][city]" id="checkout_shipping_address_city" />
  </div>
</div>
<div class="field--three-eights field field--required" data-address-field="country" data-google-places="true">
  <label class="field__label" for="checkout_shipping_address_country">Country</label>
  <div class="field__input-wrapper field__input-wrapper--select">
    <select size="1" autocomplete="shipping country" data-backup="country" class="field__input field__input--select" aria-required="true" name="checkout[shipping_address][country]" id="checkout_shipping_address_country"><option data-code="US" selected="selected" value="United States">United States</option>
<option data-code="CA" value="Canada">Canada</option>
<option data-code="AU" value="Australia">Australia</option>
<option data-code="GB" value="United Kingdom">United Kingdom</option>
<option disabled="disabled" value="---">---</option>
<option data-code="AF" value="Afghanistan">Afghanistan</option>
<option data-code="AX" value="Aland Islands">Åland Islands</option>
<option data-code="AL" value="Albania">Albania</option>
<option data-code="DZ" value="Algeria">Algeria</option>
<option data-code="AD" value="Andorra">Andorra</option>
<option data-code="AO" value="Angola">Angola</option>
<option data-code="AI" value="Anguilla">Anguilla</option>
<option data-code="AG" value="Antigua And Barbuda">Antigua &amp; Barbuda</option>
<option data-code="AR" value="Argentina">Argentina</option>
<option data-code="AM" value="Armenia">Armenia</option>
<option data-code="AW" value="Aruba">Aruba</option>
<option data-code="AU" value="Australia">Australia</option>
<option data-code="AT" value="Austria">Austria</option>
<option data-code="AZ" value="Azerbaijan">Azerbaijan</option>
<option data-code="BS" value="Bahamas">Bahamas</option>
<option data-code="BH" value="Bahrain">Bahrain</option>
<option data-code="BD" value="Bangladesh">Bangladesh</option>
<option data-code="BB" value="Barbados">Barbados</option>
<option data-code="BY" value="Belarus">Belarus</option>
<option data-code="BE" value="Belgium">Belgium</option>
<option data-code="BZ" value="Belize">Belize</option>
<option data-code="BJ" value="Benin">Benin</option>
<option data-code="BM" value="Bermuda">Bermuda</option>
<option data-code="BT" value="Bhutan">Bhutan</option>
<option data-code="BO" value="Bolivia">Bolivia</option>
<option data-code="BA" value="Bosnia And Herzegovina">Bosnia &amp; Herzegovina</option>
<option data-code="BW" value="Botswana">Botswana</option>
<option data-code="BV" value="Bouvet Island">Bouvet Island</option>
<option data-code="BR" value="Brazil">Brazil</option>
<option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option data-code="VG" value="Virgin Islands, British">British Virgin Islands</option>
<option data-code="BN" value="Brunei">Brunei</option>
<option data-code="BG" value="Bulgaria">Bulgaria</option>
<option data-code="BF" value="Burkina Faso">Burkina Faso</option>
<option data-code="BI" value="Burundi">Burundi</option>
<option data-code="KH" value="Cambodia">Cambodia</option>
<option data-code="CM" value="Republic of Cameroon">Cameroon</option>
<option data-code="CA" value="Canada">Canada</option>
<option data-code="CV" value="Cape Verde">Cape Verde</option>
<option data-code="KY" value="Cayman Islands">Cayman Islands</option>
<option data-code="CF" value="Central African Republic">Central African Republic</option>
<option data-code="TD" value="Chad">Chad</option>
<option data-code="CL" value="Chile">Chile</option>
<option data-code="CN" value="China">China</option>
<option data-code="CX" value="Christmas Island">Christmas Island</option>
<option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option data-code="CO" value="Colombia">Colombia</option>
<option data-code="KM" value="Comoros">Comoros</option>
<option data-code="CG" value="Congo">Congo - Brazzaville</option>
<option data-code="CD" value="Congo, The Democratic Republic Of The">Congo - Kinshasa</option>
<option data-code="CK" value="Cook Islands">Cook Islands</option>
<option data-code="CR" value="Costa Rica">Costa Rica</option>
<option data-code="HR" value="Croatia">Croatia</option>
<option data-code="CU" value="Cuba">Cuba</option>
<option data-code="CW" value="Curaçao">Curaçao</option>
<option data-code="CY" value="Cyprus">Cyprus</option>
<option data-code="CZ" value="Czech Republic">Czech Republic</option>
<option data-code="CI" value="Côte d&#39;Ivoire">Côte d’Ivoire</option>
<option data-code="DK" value="Denmark">Denmark</option>
<option data-code="DJ" value="Djibouti">Djibouti</option>
<option data-code="DM" value="Dominica">Dominica</option>
<option data-code="DO" value="Dominican Republic">Dominican Republic</option>
<option data-code="EC" value="Ecuador">Ecuador</option>
<option data-code="EG" value="Egypt">Egypt</option>
<option data-code="SV" value="El Salvador">El Salvador</option>
<option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>
<option data-code="ER" value="Eritrea">Eritrea</option>
<option data-code="EE" value="Estonia">Estonia</option>
<option data-code="ET" value="Ethiopia">Ethiopia</option>
<option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands</option>
<option data-code="FO" value="Faroe Islands">Faroe Islands</option>
<option data-code="FJ" value="Fiji">Fiji</option>
<option data-code="FI" value="Finland">Finland</option>
<option data-code="FR" value="France">France</option>
<option data-code="GF" value="French Guiana">French Guiana</option>
<option data-code="PF" value="French Polynesia">French Polynesia</option>
<option data-code="TF" value="French Southern Territories">French Southern Territories</option>
<option data-code="GA" value="Gabon">Gabon</option>
<option data-code="GM" value="Gambia">Gambia</option>
<option data-code="GE" value="Georgia">Georgia</option>
<option data-code="DE" value="Germany">Germany</option>
<option data-code="GH" value="Ghana">Ghana</option>
<option data-code="GI" value="Gibraltar">Gibraltar</option>
<option data-code="GR" value="Greece">Greece</option>
<option data-code="GL" value="Greenland">Greenland</option>
<option data-code="GD" value="Grenada">Grenada</option>
<option data-code="GP" value="Guadeloupe">Guadeloupe</option>
<option data-code="GT" value="Guatemala">Guatemala</option>
<option data-code="GG" value="Guernsey">Guernsey</option>
<option data-code="GN" value="Guinea">Guinea</option>
<option data-code="GW" value="Guinea Bissau">Guinea-Bissau</option>
<option data-code="GY" value="Guyana">Guyana</option>
<option data-code="HT" value="Haiti">Haiti</option>
<option data-code="HM" value="Heard Island And Mcdonald Islands">Heard &amp; McDonald Islands</option>
<option data-code="HN" value="Honduras">Honduras</option>
<option data-code="HK" value="Hong Kong">Hong Kong SAR China</option>
<option data-code="HU" value="Hungary">Hungary</option>
<option data-code="IS" value="Iceland">Iceland</option>
<option data-code="IN" value="India">India</option>
<option data-code="ID" value="Indonesia">Indonesia</option>
<option data-code="IR" value="Iran, Islamic Republic Of">Iran</option>
<option data-code="IQ" value="Iraq">Iraq</option>
<option data-code="IE" value="Ireland">Ireland</option>
<option data-code="IM" value="Isle Of Man">Isle of Man</option>
<option data-code="IL" value="Israel">Israel</option>
<option data-code="IT" value="Italy">Italy</option>
<option data-code="JM" value="Jamaica">Jamaica</option>
<option data-code="JP" value="Japan">Japan</option>
<option data-code="JE" value="Jersey">Jersey</option>
<option data-code="JO" value="Jordan">Jordan</option>
<option data-code="KZ" value="Kazakhstan">Kazakhstan</option>
<option data-code="KE" value="Kenya">Kenya</option>
<option data-code="KI" value="Kiribati">Kiribati</option>
<option data-code="XK" value="Kosovo">Kosovo</option>
<option data-code="KW" value="Kuwait">Kuwait</option>
<option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>
<option data-code="LA" value="Lao People&#39;s Democratic Republic">Laos</option>
<option data-code="LV" value="Latvia">Latvia</option>
<option data-code="LB" value="Lebanon">Lebanon</option>
<option data-code="LS" value="Lesotho">Lesotho</option>
<option data-code="LR" value="Liberia">Liberia</option>
<option data-code="LY" value="Libyan Arab Jamahiriya">Libya</option>
<option data-code="LI" value="Liechtenstein">Liechtenstein</option>
<option data-code="LT" value="Lithuania">Lithuania</option>
<option data-code="LU" value="Luxembourg">Luxembourg</option>
<option data-code="MO" value="Macao">Macau SAR China</option>
<option data-code="MK" value="Macedonia, Republic Of">Macedonia</option>
<option data-code="MG" value="Madagascar">Madagascar</option>
<option data-code="MW" value="Malawi">Malawi</option>
<option data-code="MY" value="Malaysia">Malaysia</option>
<option data-code="MV" value="Maldives">Maldives</option>
<option data-code="ML" value="Mali">Mali</option>
<option data-code="MT" value="Malta">Malta</option>
<option data-code="MQ" value="Martinique">Martinique</option>
<option data-code="MR" value="Mauritania">Mauritania</option>
<option data-code="MU" value="Mauritius">Mauritius</option>
<option data-code="YT" value="Mayotte">Mayotte</option>
<option data-code="MX" value="Mexico">Mexico</option>
<option data-code="MD" value="Moldova, Republic of">Moldova</option>
<option data-code="MC" value="Monaco">Monaco</option>
<option data-code="MN" value="Mongolia">Mongolia</option>
<option data-code="ME" value="Montenegro">Montenegro</option>
<option data-code="MS" value="Montserrat">Montserrat</option>
<option data-code="MA" value="Morocco">Morocco</option>
<option data-code="MZ" value="Mozambique">Mozambique</option>
<option data-code="MM" value="Myanmar">Myanmar (Burma)</option>
<option data-code="NA" value="Namibia">Namibia</option>
<option data-code="NR" value="Nauru">Nauru</option>
<option data-code="NP" value="Nepal">Nepal</option>
<option data-code="NL" value="Netherlands">Netherlands</option>
<option data-code="AN" value="Netherlands Antilles">Netherlands Antilles</option>
<option data-code="NC" value="New Caledonia">New Caledonia</option>
<option data-code="NZ" value="New Zealand">New Zealand</option>
<option data-code="NI" value="Nicaragua">Nicaragua</option>
<option data-code="NE" value="Niger">Niger</option>
<option data-code="NG" value="Nigeria">Nigeria</option>
<option data-code="NU" value="Niue">Niue</option>
<option data-code="NF" value="Norfolk Island">Norfolk Island</option>
<option data-code="KP" value="Korea, Democratic People&#39;s Republic Of">North Korea</option>
<option data-code="NO" value="Norway">Norway</option>
<option data-code="OM" value="Oman">Oman</option>
<option data-code="PK" value="Pakistan">Pakistan</option>
<option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territories</option>
<option data-code="PA" value="Panama">Panama</option>
<option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>
<option data-code="PY" value="Paraguay">Paraguay</option>
<option data-code="PE" value="Peru">Peru</option>
<option data-code="PH" value="Philippines">Philippines</option>
<option data-code="PN" value="Pitcairn">Pitcairn Islands</option>
<option data-code="PL" value="Poland">Poland</option>
<option data-code="PT" value="Portugal">Portugal</option>
<option data-code="QA" value="Qatar">Qatar</option>
<option data-code="RE" value="Reunion">Réunion</option>
<option data-code="RO" value="Romania">Romania</option>
<option data-code="RU" value="Russia">Russia</option>
<option data-code="RW" value="Rwanda">Rwanda</option>
<option data-code="SX" value="Sint Maarten">Saint Martin</option>
<option data-code="WS" value="Samoa">Samoa</option>
<option data-code="SM" value="San Marino">San Marino</option>
<option data-code="ST" value="Sao Tome And Principe">São Tomé &amp; Príncipe</option>
<option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>
<option data-code="SN" value="Senegal">Senegal</option>
<option data-code="RS" value="Serbia">Serbia</option>
<option data-code="SC" value="Seychelles">Seychelles</option>
<option data-code="SL" value="Sierra Leone">Sierra Leone</option>
<option data-code="SG" value="Singapore">Singapore</option>
<option data-code="SK" value="Slovakia">Slovakia</option>
<option data-code="SI" value="Slovenia">Slovenia</option>
<option data-code="SB" value="Solomon Islands">Solomon Islands</option>
<option data-code="SO" value="Somalia">Somalia</option>
<option data-code="ZA" value="South Africa">South Africa</option>
<option data-code="GS" value="South Georgia And The South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
<option data-code="KR" value="South Korea">South Korea</option>
<option data-code="SS" value="South Sudan">South Sudan</option>
<option data-code="ES" value="Spain">Spain</option>
<option data-code="LK" value="Sri Lanka">Sri Lanka</option>
<option data-code="BL" value="Saint Barthélemy">St. Barthélemy</option>
<option data-code="SH" value="Saint Helena">St. Helena</option>
<option data-code="KN" value="Saint Kitts And Nevis">St. Kitts &amp; Nevis</option>
<option data-code="LC" value="Saint Lucia">St. Lucia</option>
<option data-code="MF" value="Saint Martin">St. Martin</option>
<option data-code="PM" value="Saint Pierre And Miquelon">St. Pierre &amp; Miquelon</option>
<option data-code="VC" value="St. Vincent">St. Vincent &amp; Grenadines</option>
<option data-code="SD" value="Sudan">Sudan</option>
<option data-code="SR" value="Suriname">Suriname</option>
<option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard &amp; Jan Mayen</option>
<option data-code="SZ" value="Swaziland">Swaziland</option>
<option data-code="SE" value="Sweden">Sweden</option>
<option data-code="CH" value="Switzerland">Switzerland</option>
<option data-code="SY" value="Syria">Syria</option>
<option data-code="TW" value="Taiwan">Taiwan</option>
<option data-code="TJ" value="Tajikistan">Tajikistan</option>
<option data-code="TZ" value="Tanzania, United Republic Of">Tanzania</option>
<option data-code="TH" value="Thailand">Thailand</option>
<option data-code="TL" value="Timor Leste">Timor-Leste</option>
<option data-code="TG" value="Togo">Togo</option>
<option data-code="TK" value="Tokelau">Tokelau</option>
<option data-code="TO" value="Tonga">Tonga</option>
<option data-code="TT" value="Trinidad and Tobago">Trinidad &amp; Tobago</option>
<option data-code="TN" value="Tunisia">Tunisia</option>
<option data-code="TR" value="Turkey">Turkey</option>
<option data-code="TM" value="Turkmenistan">Turkmenistan</option>
<option data-code="TC" value="Turks and Caicos Islands">Turks &amp; Caicos Islands</option>
<option data-code="TV" value="Tuvalu">Tuvalu</option>
<option data-code="UM" value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
<option data-code="UG" value="Uganda">Uganda</option>
<option data-code="UA" value="Ukraine">Ukraine</option>
<option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>
<option data-code="GB" value="United Kingdom">United Kingdom</option>
<option data-code="US" value="United States">United States</option>
<option data-code="UY" value="Uruguay">Uruguay</option>
<option data-code="UZ" value="Uzbekistan">Uzbekistan</option>
<option data-code="VU" value="Vanuatu">Vanuatu</option>
<option data-code="VA" value="Holy See (Vatican City State)">Vatican City</option>
<option data-code="VE" value="Venezuela">Venezuela</option>
<option data-code="VN" value="Vietnam">Vietnam</option>
<option data-code="WF" value="Wallis And Futuna">Wallis &amp; Futuna</option>
<option data-code="EH" value="Western Sahara">Western Sahara</option>
<option data-code="YE" value="Yemen">Yemen</option>
<option data-code="ZM" value="Zambia">Zambia</option>
<option data-code="ZW" value="Zimbabwe">Zimbabwe</option></select>
  </div>
</div>
<div class="field--three-eights field field--required" data-address-field="province" data-google-places="true">
  <label class="field__label" for="checkout_shipping_address_province">State</label>
  <div class="field__input-wrapper field__input-wrapper--select">
    <input placeholder="Texas" autocomplete="shipping address-level1" value="Texas" data-backup="province" class="field__input" aria-required="true" type="text" name="checkout[shipping_address][province]" id="checkout_shipping_address_province" />
  </div>
</div>
<div class="field--quarter field field--required" data-address-field="zip" data-google-places="true">
  <label class="field__label" for="checkout_shipping_address_zip">Zip code</label>
  <div class="field__input-wrapper">
    <input placeholder="90210" autocomplete="shipping postal-code" data-backup="zip" data-google-autocomplete="true" data-google-autocomplete-title="Suggestions" class="field__input field__input--zip" aria-required="true" size="30" type="text" name="checkout[shipping_address][zip]" id="checkout_shipping_address_zip" />
  </div>
</div>
  <div data-address-field="phone" class="field field--required">
    <label class="field__label" for="checkout_shipping_address_phone">Phone</label>
    <div class="field__input-wrapper">
      <input placeholder="Phone" autocomplete="shipping tel" data-backup="phone" data-phone-formatter="true" data-phone-formatter-country-select="[name=&#39;checkout[shipping_address][country]&#39;]" class="field__input field__input--numeric" aria-required="true" size="30" type="tel" name="checkout[shipping_address][phone]" id="checkout_shipping_address_phone" />
    </div>
</div>


      </div> 
    </div> 
  </div> 




    
  </div> --}}

  

{{-- <div class="step__footer" data-step-footer>

  <button name="button" type="submit" class="step__footer__continue-btn btn ">
  <span class="btn__content">Continue to shipping method</span>
  <i class="btn__spinner icon icon--button-spinner"></i>
</button>
  <a class="step__footer__previous-link" href="https://www.annasheffield.com/cart"><svg class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon rtl-flip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/></svg><span class="step__footer__previous-link-content">Return to cart</span></a>
</div>


</form>
  <div class="hidden" data-remember-me-popover-content>
    <div data-remember-me class="popover__content-wrapper remember-me">
  <div id="popover-close-text" class="hidden">Close</div>
  <div data-popover-pane="content" class="popover-pane">
    <div class="popover__content">
      <h3 class="remember-me__header" id="popover-title">
        Use your saved information
      </h3>
      <p class="remember-me__content" id="remember-me__content">
        You saved your information during a previous purchase, so you won’t need to enter it again. To use these details for checkout, enter the verification code sent to your phone.
      </p>
      <div data-remember-me-fieldset-wrapper>
        <div data-remember-code-not-received class="hidden remember-me__code-not-received">
          <p>
            Didn&#39;t receive your code?
          </p>
          <button type="button" data-remember-me-dismiss class="link">
            <span data-remember-code-not-received-button="contact_information_step" class="hidden">
              Continue to the regular checkout
            </span>
            <span data-remember-code-not-received-button="payment_information_step" class="hidden">
              Enter your payment information
            </span>
          </button>
        </div>
        <form autocomplete="off" action="https://pay.shopify.com/customers/validate" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="drwF5YEjaYiYVTNJFHfGUKjw1+YIrnbrDCYY7WB7/WkE2+DMITf3WVSm0gaYEG8gzFiEIEdc12zMPeoTmNWwgg==" />
          <div class="fieldset remember-me__fieldset">
            <div class="field field--hidden-label remember-me__field">
              <label class="visually-hidden" for="validation-code">Verification code number that you received by text message</label>
              <input type="tel" name="checkout[validation_code]" id="validation-code" class="remember-me__input" maxlength="6" aria-describedby="remember-me__content" />
                <div class="remember-me__field-underline-box"></div>
                <div class="remember-me__field-underline-box"></div>
                <div class="remember-me__field-underline-box"></div>
                <div class="remember-me__field-underline-box"></div>
                <div class="remember-me__field-underline-box"></div>
                <div class="remember-me__field-underline-box"></div>
            </div>
          </div>
</form>      </div>
    </div>

    <div class="remember-me-footer remember-me-footer--message">
      <div class="remember-me-footer__icon-wrapper">
        <div class="remember-me-icon-loading">
          <svg class="icon-svg icon-svg--size-32 icon--double-spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path class="icon--double-spinner__circle icon--double-spinner__outer-circle" d="M0 15c0 8.284 6.716 15 15 15 8.284 0 15-6.716 15-15 0-8.284-6.716-15-15-15-.552 0-1 .448-1 1s.448 1 1 1c7.18 0 13 5.82 13 13s-5.82 13-13 13S2 22.18 2 15c0-.552-.448-1-1-1s-1 .448-1 1z"/><path class="icon--double-spinner__circle icon--double-spinner__inner-circle" d="M4 15c0 6.075 4.925 11 11 11s11-4.925 11-11S21.075 4 15 4c-.552 0-1 .448-1 1s.448 1 1 1c4.97 0 9 4.03 9 9s-4.03 9-9 9-9-4.03-9-9c0-.552-.448-1-1-1s-1 .448-1 1z"/></svg>
        </div>
      </div>

      <div class="remember-me-footer__icon-wrapper">
        <div class="remember-me-icon-success">
          <svg class="icon-svg icon-svg--color-accent icon-svg--size-32" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34"><g fill-rule="evenodd"><circle fill="#EBEBEB" cx="17" cy="17" r="17"/><path d="M10.6 17.4c-.3-.3-1-.3-1.3 0-.4.4-.4 1 0 1.4l5.2 5.2 10.3-11.4c.3-.4.3-1 0-1.4-.5-.3-1-.3-1.5 0l-9 10-3.7-3.8z"/></g></svg>
        </div>
      </div>

      <div class="remember-me-footer__error" aria-live="polite">
        <span aria-hidden="true" data-remember-me-error="wrong-code">The code you entered is incorrect</span>
        <span aria-hidden="true" data-remember-me-error="no-code" class="hidden">Enter a valid verification code</span>
        <span aria-hidden="true" data-remember-me-error="server" class="hidden">{:title=&gt;&quot;Shopify Pay unavailable&quot;, :body=&gt;&quot;Your saved information can’t be used for this purchase. Please continue to the regular checkout.&quot;}</span>
        <span aria-hidden="true" data-remember-me-error="throttle" class="hidden">{:title=&gt;&quot;Attempt limit is reached&quot;, :body=&gt;&quot;Your code was incorrectly entered too many times. Please continue to the regular checkout.&quot;}</span>
      </div>
      <div class="remember-me-footer__message">
        <div class="remember-me__phone-icon">
          <div class="remember-me__phone-icon-inner">
            <svg class="icon-svg icon-svg--size-24" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 2.99C5 1.34 6.342 0 8.003 0h7.994C17.655 0 19 1.342 19 2.99v18.02c0 1.65-1.342 2.99-3.003 2.99H8.003C6.345 24 5 22.658 5 21.01V2.99zM7 5c0-.552.456-1 .995-1h8.01c.55 0 .995.445.995 1v14c0 .552-.456 1-.995 1h-8.01C7.445 20 7 19.555 7 19V5zm5 18c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z" fill-rule="evenodd"/></svg>
          </div>
        </div>
        <div class="remember-me-footer__text">
          <div class="remember-me-footer__text-1" aria-hidden="true">
              Sending code to (•••)&nbsp;•••&nbsp;•<span data-remember-me-customer-phone></span>
          </div>
          <div class="remember-me-footer__text-2">
              Code sent to (•••)&nbsp;•••&nbsp;•<span data-remember-me-customer-phone></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div data-popover-pane="error" class="popover-pane popover-pane--hidden remember-me-error-pane" aria-hidden="true">
    <div class="remember-me-error-pane__icon">
      <svg class="icon-svg icon-svg--size-32" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><g fill="none" fill-rule="evenodd"><path d="M18 36c9.94 0 18-8.06 18-18S27.94 0 18 0 0 8.06 0 18s8.06 18 18 18z" fill="#FF3E3E"/><path fill="#FFF" d="M17 9h2v13h-2z"/><rect fill="#FFF" x="16.5" y="26" width="3" height="3" rx="1.5"/></g></svg>
    </div>
    <h4 class="remember-me-error-pane__title">
      <span data-remember-me-error="server" class="hidden">Shopify Pay unavailable</span>
      <span data-remember-me-error="throttle" class="hidden">Attempt limit is reached</span>
      <span data-remember-me-error="authorize" class="hidden">Shopify Pay unavailable</span>
    </h4>
    <p class="remember-me-error-pane__content">
      <span data-remember-me-error="server" class="hidden">Your saved information can’t be used for this purchase. Please continue to the regular checkout.</span>
      <span data-remember-me-error="throttle" class="hidden">Your code was incorrectly entered too many times. Please continue to the regular checkout.</span>
      <span data-remember-me-error="authorize" class="hidden">Your saved information can’t be used at the moment. Enter your payment information to continue.</span>
    </p>
    <div class="remember-me-error-pane__footer">
      <button type="button" data-remember-me-dismiss class="link">
        <span data-remember-me-error="authorize" class="hidden">Enter payment information</span>
        <span data-remember-me-error="server" class="hidden">Close</span>
        <span data-remember-me-error="throttle" class="hidden">Close</span>
      </button>
    </div>
  </div>
</div>

  </div>

</div>

          </div>
          <div class="main__footer">
            <div class="modals">
    <div class="modal-backdrop" role="dialog" id="policy-93782" aria-labelledby="policy-93782-title" data-modal-backdrop>
  <div class="modal">
    <div class="modal__header">
      <h1 class="modal__header__title" id="policy-93782-title">
        Refund policy
      </h1>
      <div class="modal__close">
        <button type="button" class="icon icon--close-modal" data-modal-close>
          <span class="visually-hidden">
            Close
          </span>
        </button>
      </div>
    </div>
    <div class="modal__content">
      <svg class="modal__loading-icon icon icon--spinner" width="32" height="32" xmlns="http://www.w3.org/2000/svg"><path d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z" /></svg>

    </div>
  </div>
</div>

</div>


<div role="contentinfo" aria-label="Footer">
    <ul class="policy-list">
        <li class="policy-list__item">
          <a title="Refund policy" data-modal="policy-93782" data-close-text="Close" href="/398002/policies/93782.html">Refund policy</a>
        </li>
    </ul>
</div>

          </div>
        </div>
      </div>
    </div>

    
      <script type="text/javascript">
        
      window.ShopifyAnalytics = window.ShopifyAnalytics || {};
      window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
      window.ShopifyAnalytics.meta.currency = 'USD';
      var meta = {"page":{"path":"\/checkout\/contact_information","search":"?_ga=2.247359874.704693059.1504021134-126469668.1503596018","url":"https:\/\/www.annasheffield.com\/398002\/checkouts\/7d65685aaef99438fa1fc7a935fe6b7a?_ga=2.247359874.704693059.1504021134-126469668.1503596018"}};
      for (var attr in meta) {
        window.ShopifyAnalytics.meta[attr] = meta[attr];
      }
    
      </script>

      <script type="text/javascript">
        window.ShopifyAnalytics.merchantGoogleAnalytics = function() {
          _gaq.push(['_setDomainName', 'www.annasheffield.com']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_addIgnoredRef', 'annasheffield.com']);
        };
      </script>

      <script type="text/javascript" class="analytics">
        (window.gaDevIds=window.gaDevIds||[]).push('BwiEti');
        

        (function () {
          var customDocumentWrite = function(content) {
            var jquery = null;

            if (window.jQuery) {
              jquery = window.jQuery;
            } else if (window.Checkout && window.Checkout.$) {
              jquery = window.Checkout.$;
            }

            if (jquery) {
              jquery('body').append(content);
            }
          };

          var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
          if (trekkie.integrations) {
            return;
          }
          trekkie.methods = [
            'identify',
            'page',
            'ready',
            'track',
            'trackForm',
            'trackLink'
          ];
          trekkie.factory = function(method) {
            return function() {
              var args = Array.prototype.slice.call(arguments);
              args.unshift(method);
              trekkie.push(args);
              return trekkie;
            };
          };
          for (var i = 0; i < trekkie.methods.length; i++) {
            var key = trekkie.methods[i];
            trekkie[key] = trekkie.factory(key);
          }
          trekkie.load = function(config) {
            trekkie.config = config;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.onerror = function(e) {
              (new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';
            };
            script.async = true;
            script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2017.03.29.1';
            var first = document.getElementsByTagName('script')[0];
            first.parentNode.insertBefore(script, first);
          };
          trekkie.load(
            {"Trekkie":{"appName":"checkout","development":false,"defaultAttributes":{"shopId":398002,"isMerchantRequest":null,"themeId":170407440,"themeCityHash":17664283668954249954,"checkoutToken":"7d65685aaef99438fa1fc7a935fe6b7a"}},"Performance":{"navigationTimingApiMeasurementsEnabled":true,"navigationTimingApiMeasurementsSampleRate":0.1},"Google Analytics":{"trackingId":"UA-22156508-1","domain":"auto","siteSpeedSampleRate":"10","enhancedEcommerce":true,"doubleClick":true,"includeSearch":true},"Facebook Pixel":{"pixelIds":["142062136336885"],"agent":"plshopify1.2"},"Clickstream":{},"Session Attribution":{}}
          );

          var loaded = false;
          trekkie.ready(function() {
            if (loaded) return;
            loaded = true;

            window.ShopifyAnalytics.lib = window.trekkie;
            
      ga('require', 'linker');
      function addListener(element, type, callback) {
        if (element.addEventListener) {
          element.addEventListener(type, callback);
        }
        else if (element.attachEvent) {
          element.attachEvent('on' + type, callback);
        }
      }
      function decorate(event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        if (target && (target.getAttribute('action') || target.getAttribute('href'))) {
          ga(function (tracker) {
            var linkerParam = tracker.get('linkerParam');
            document.cookie = '_shopify_ga=' + linkerParam + '; ' + 'path=/';
          });
        }
      }
      addListener(window, 'load', function(){
        for (var i=0; i < document.forms.length; i++) {
          var action = document.forms[i].getAttribute('action');
          if(action && action.indexOf('/cart') >= 0) {
            addListener(document.forms[i], 'submit', decorate);
          }
        }
        for (var i=0; i < document.links.length; i++) {
          var href = document.links[i].getAttribute('href');
          if(href && href.indexOf('/checkout') >= 0) {
            addListener(document.links[i], 'click', decorate);
          }
        }
      });
    

            var originalDocumentWrite = document.write;
            document.write = customDocumentWrite;
            try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
            document.write = originalDocumentWrite;

            
        window.ShopifyAnalytics.lib.page(
          "Checkout - Contact information",
          {"path":"\/checkout\/contact_information","search":"?_ga=2.247359874.704693059.1504021134-126469668.1503596018","url":"https:\/\/www.annasheffield.com\/398002\/checkouts\/7d65685aaef99438fa1fc7a935fe6b7a?_ga=2.247359874.704693059.1504021134-126469668.1503596018"}
        );
      
            
        window.ShopifyAnalytics.lib.track(
          "Started Order",
          {"step":1,"products":[{"variantId":18916996229,"productId":5904256965,"category":"Bracelets","sku":"ASB28 rg\/cd\/rh","name":"Attelage Pavé Cuff - Rose Gold \u0026 Champagne Diamond","price":"6500.00","quantity":1,"brand":"Anna Sheffield Jewelry","variant":""},{"variantId":1063458156,"productId":395077424,"category":"Bracelets","sku":"ASB18 ss\/bd","name":"Bea Hand Harness - Sterling Silver \u0026 Black Diamonds","price":"550.00","quantity":1,"brand":"AS Fine Jewelry","variant":""}],"currency":"USD","revenue":"7050.00"}
        );
      
          });

          
      var eventsListenerScript = document.createElement('script');
      eventsListenerScript.async = true;
      eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-4c5801cae3452eff0ededa0ac07d432c1240b78b7e11282cceb3c3213951104b.js";
      document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
    
        })();
      </script>
    
  </body> --}}

@endsection
@section('modals')
@endsection
@section('variables')
@endsection
