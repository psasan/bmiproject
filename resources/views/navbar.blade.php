<nav class="navbar navbar-default">
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">K24 BMI Calculator</a>
    </div>

    <div class="collapse navbar-collapse"
        id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">           
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li><a href="{{ url('login') }}">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a href="{{ url('login') }}">Login</a></li>
            @endif
        </ul>
    </div>
</div>
</nav>