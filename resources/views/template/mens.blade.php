<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 0, 'stickySetTop': '-37px', 'stickyChangeLogo': false}">
    <div class="header-body background-color-primary pt-0 pb-0">
        <div class="header-container container custom-position-initial">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-stripe">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 m-0">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li class="dropdown-full-color dropdown-quaternary" ><a class="nav-link" href="/">Properties</a></li>
                                        @guest
                                            <li class="dropdown-full-color dropdown-quaternary" ><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                            <li class="dropdown-full-color dropdown-quaternary" ><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                        @else
                                            <li class="dropdown-full-color dropdown-quaternary" ><a class="nav-link" href="/home">Home</a></li>
                                        <li class="dropdown dropdown-full-color dropdown-quaternary">
                                            <a class="nav-link dropdown-toggle" href="#">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if(Auth::user()->is_admin)
                                                      <li>
                                                        <a class="dropdown-item" href="/admin">Admin</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('api.index') }}">Api Token Genarater</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('tonws.index') }}">Tonws</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/admin/proparties">Proparties</a>
                                                    </li>

                                                @endif
                                                    <li>
                                                    <a  class="dropdown-item"  href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    </li>

                                                    <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" >
                                                        {{ csrf_field() }}
                                                    </form>

                                            </ul>
                                            </li>



                                    </ul>
                                    @endguest



                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div role="main" class="main">