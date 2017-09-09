<nav class="navbar navbar-top navbar-light navbar-toggleable-md bg-primary bg-faded" style="z-index: 1000;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent0" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('home') }}" class="navbar-brand hidden-lg-up">{{ $company->name }}</a>
        <div class="collapse navbar-collapse flex-column ml-lg-0 ml-3 hidden-md-down">
            <ul class="navbar-nav">
                <li class="text-center col-12">                  
                    <a href="{{ route('home') }}" class="nav-link">
                        <strong style="font-size:25px; font-weight:100;">{{ $company->name }}</strong>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav flex-row d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.shop') }}">SHOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CUSTOM</a>
                </li>
                @if(auth()->check())

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->email }}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('home.logout') }}">Logout</a>
                        </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign-in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>

                @endif
                
                <li class="nav-item clearfix" style="">
                    <a class="nav-link" href="{{route('home.cart')}}" style="padding-right:25px;"><i class="icon-bag" style="font-size:25px; position:absolute; "><span class="cart-number">{{ (count(session()->get('cart'))) ? count(session()->get('cart')) : 0 }}</span></i></a>
                </li>
            </ul>
        </div>
        <div class="hidden-lg-up">
            <div class="collapse navbar-collapse" id="navbarSupportedContent0">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.shop') }}">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CUSTOM</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->email }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('home.logout') }}">Logout</a>
                            </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">register</a>
                    </li>
                    @endif
                    <li class="nav-item clearfix" style="">
                        <a class="nav-link" href="{{route('home.cart')}}" style="padding-right:25px;"><i class="icon-bag" style="font-size:25px; position:absolute; "><span class="cart-number">{{ (count(session()->get('cart'))) ? count(session()->get('cart')) : 0 }}</span></i></a>
                    </li>
                    <li>&nbsp;</li>
                </ul>

            </div>
        </div>
    </div>
</nav>


<nav class="navbar navbar-light navbar-toggleable-md bg-primary fixed-top bg-faded hidden-md-down" on-scroll="70" style="z-index: 999;">
    <div class="container">    
        <a class="navbar-brand" href="{{ route('home') }}">{{ $company->name }}</a>
        <div class="collapse navbar-collapse" style="">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.shop') }}">SHOP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CUSTOM</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @if (auth()->check())
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->email }}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('home.logout') }}">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">register</a>
                </li>
                @endif
                <li class="nav-item clearfix" style="">
                    <a class="nav-link" href="{{route('home.cart')}}" style="padding-right:25px;"><i class="icon-bag" style="font-size:25px; position:absolute; "><span class="cart-number">{{ (count(session()->get('cart'))) ? count(session()->get('cart')) : 0 }}</span></i></a>
                </li>
                <li>&nbsp;</li>
            </ul>

        </div>
    </div>
</nav>


<nav class="navbar navbar-light navbar-toggleable-md bg-primary bg-faded hidden-lg-up fixed-top" on-scroll="70" style="z-index: 999;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home') }}">{{ $company->name }}</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.shop') }}">SHOP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CUSTOM</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if (auth()->check())
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->email }}</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('home.logout') }}">Logout</a>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">register</a>
            </li>
            @endif
            <li class="nav-item clearfix" style="">
                <a class="nav-link" href="{{route('home.cart')}}" style="padding-right:25px;"><i class="icon-bag" style="font-size:25px; position:absolute; "><span class="cart-number">{{ (count(session()->get('cart'))) ? count(session()->get('cart')) : 0 }}</span></i></a>
            </li>
            <li>&nbsp;</li>
        </ul>

    </div>
</nav>