<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top"> 
            <div class="container">            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <a class="navbar-brand" href="{{ url('home') }}"> <img src="{{ asset('img/cake.png') }}" class="img"> </a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('home') }}"> 
                                Home 
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('about') }}"> 
                                About  
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('resep') }}"> 
                                Resep 
                            </a>
                        </li>
                        @if ( Auth::user()->role == 'admin')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('post') }}"> 
                                    Master Data 
                                </a>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item active">
                            <a class="nav-link"> Halo,
                                @if (empty(Auth::user()->name))
                                    {{ '' }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>