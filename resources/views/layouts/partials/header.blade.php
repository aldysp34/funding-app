<div class="navbar navbar-expand navbar-shadow px-0  pl-lg-16pt navbar-light bg-body" id="default-navbar" data-primary>

    <!-- Navbar toggler -->
    <button class="navbar-toggler d-block d-lg-none rounded-0"
            type="button"
            data-toggle="sidebar">
        <span class="material-icons">menu</span>
    </button>

    <!-- Navbar Brand -->
    <div
        class="navbar-brand mr-16pt d-lg-none">
        <img class="navbar-brand-icon mr-0 mr-lg-8pt"
            src="{{asset('assets/images/logo/accent-teal-100@2x.png')}}"
            width="32"
            alt="Huma">
        <span class="d-none d-lg-block">Huma</span>
    </div>

    <!-- <button class="btn navbar-btn mr-16pt" data-toggle="modal" data-target="#apps">Apps <i class="material-icons">arrow_drop_down</i></button> -->


    <div class="flex"></div>


    <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
        <div class="nav-item dropdown d-none d-sm-flex">
            <a href="#"
                class="nav-link d-flex align-items-center dropdown-toggle"
                data-toggle="dropdown">
                <span class="flex d-flex flex-column mr-8pt">
                    <span class="navbar-text-100">@yield('name')</span>
                    <small class="navbar-text-50">@yield('role')</small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header"><strong>Account</strong></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
