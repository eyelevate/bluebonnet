<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul>
                    <li class="col-12"><h5 class="text-center"><strong>Information</strong></h5></li>
                    <li class="col-12 text-center"><a href="{{ route('home.faq') }}">FAQ</a></li>
                    <li class="col-12 text-center"><a href="{{ route('home.tos') }}">Terms Of Service</a></li>
                    <li class="col-12 text-center"><a href="{{ route('home.shipping') }}">Shipping</a></li>
                    <li class="col-12 text-center"><a href="{{ route('home.privacy') }}">Privacy Policy</a></li> 
                    <li class="col-12 text-center"></li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul>
                    <li class="col-12 text-center"><h5 class="text-center"><strong>Contact Us</strong></h5></li>
                    <li class="col-12 text-center">{{ $company->street }}</li>
                    <li class="col-12 text-center">{{ ucFirst($company->city) }}, {{ strtoupper($company->state) }} {{ $company->zipcode }}</li>
                    <li class="col-12 text-center">{{ $company->phone }}</li>
                    <li class="col-12 text-center">contact@bluebonnet.com</li>
                    <li class="col-12 text-center"><a class="btn btn-sm btn-primary">map</a></li> 
                    <li class="col-12 text-center"></li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <ul>
                    <li class="col-12 text-center"><h5 class="text-center"><strong>Follow Us</strong></h5></li>
                    <li class="col-12 text-center social-icons-footer">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-tumblr"></i></a>
                    </li>
                    <li class="col-12 text-center"></li>
                </ul>
            </div>
        </div>
        <br/><br/>
        <div class="row">
            <ul class="flex-row d-flex justify-content-center col-12">
                <li>{{ date('©Y') }} blue bonnet diamond llc.</li>
            
          </ul>
        </div>
    </div>
</footer>