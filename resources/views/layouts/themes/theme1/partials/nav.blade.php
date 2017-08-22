

<nav class="navbar navbar-toggleable-md fixed-top bg-primary bg-faded">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home') }}">BLUE BONNET DIAMOND</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
                <a class="nav-link" href="#">SHOP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">MOISSANITE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">TESTIMONIALS</a>
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
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>
            </li>
            @endif
            <li class="nav-item clearfix" style="">
                <a class="nav-link" href="#" style="padding-right:25px;"><i class="icon-bag" style="font-size:25px; position:absolute; "><span class="cart-number">0</span></i></a>
            </li>
            <li>&nbsp;</li>
        </ul>

    </div>
</nav>
<nav class="navbar bg-transparent bg-faded"></nav>
