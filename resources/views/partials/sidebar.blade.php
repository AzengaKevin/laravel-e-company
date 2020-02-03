<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">{{ config('app.name', 'James Company') }}</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="{{ $user->avatar() }}" alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name"><strong>{{ $user->name }}</strong></span>
                <span class="user-role">{{ $user->role() }}</span>
                <span class="user-status"><i class="fa fa-circle"></i><span>Online</span></span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-search">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control search-menu" placeholder="Search...">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        <span class="badge badge-pill badge-warning">New</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <span class="badge badge-pill badge-danger">3</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('users.index') }}">All Users</a></li>
                            <li><a href="#">Create User</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-comment"></i>
                        <span>Posts</span>
                        <span class="badge badge-pill badge-danger">3</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('posts.index') }}">My Posts</a></li>
                            <li><a href="{{ route('posts.create') }}">Create Post</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-gem"></i>
                        <span>Categories</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('categories.index') }}">All Categories</a></li>
                            <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>Products</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('products.index') }}">All Products</a></li>
                            <li><a href="{{ route('products.create') }}">Add Product</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Services</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('services.index') }}">All Services</a></li>
                            <li><a href="{{ route('services.create') }}">Add Service</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Adverts</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('adverts.index') }}">All Adverts</a></li>
                            <li><a href="{{ route('adverts.create') }}">Create Advert</a></li>
                        </ul>
                    </div>
                </li>

                <li class="header-menu">
                    <span>Accounts</span>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}">
                        <i class="fa fa-user"></i>
                        <span>My Profile</span>
                        <span class="badge badge-pill badge-primary">Beta</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit', $user) }}">
                        <i class="fa fa-pencil-alt"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
        @include('partials.logout')
    </div>
</nav>
