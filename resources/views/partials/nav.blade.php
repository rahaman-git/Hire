<nav class="navbar navbar-inverse navbar-static-top" style="padding-bottom: 0; margin-bottom: 0">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand active" href="/home">Freelancer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::user() != null)
                    <li><a href="{{ url('/freelancers') }}">Hire</a></li>
                @endif
                @if(auth()->guard('freelancers')->user() != null)
                    <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                @endif
                {{--@if(Freelancer::user() != null)--}}
                    {{--<li><a href="{{ url('/freelancers') }}">Hire</a></li>--}}
                {{--@endif--}}
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/donate') }}">Donate</a></li>
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>

                @if (Auth::user() != null)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
                @if (auth()->guard('freelancers')->user() != null)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            {{ auth()->guard('freelancers')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/doLogout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            
        </div><!--/.nav-collapse -->
    </div>
</nav>
