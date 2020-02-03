<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="{{ route('items.index') }}" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="{{ route('service.index') }}" class="nav-link">Services</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item"><a href="{{ route('adverts.index') }}" class="nav-link">Advert</a></li>
                <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="{{ route('services.index') }}" class="nav-link">Services</a></li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="fa fa-user"></i>
                            <span class="ml-2">My Profile</span>
                        </a>
                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                            <i class="fa fa-tachometer-alt"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            <span class="ml-2">Logout</span>
                        </a>
                        @include('partials.logout')

                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
