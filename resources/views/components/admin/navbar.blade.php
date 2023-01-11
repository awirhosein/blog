<nav class="navbar navbar-dark flex-lg-nowrap fixed-top p-0 shadow">
    <a class="navbar-brand col-lg-2 mr-0 px-3 text-center" href="/">{{ __('Blog') }}</a>

    <button class="navbar-toggler position-absolute d-lg-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Breadcrumb --}}
    <div class="w-100 text-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                {{-- @yield('back') --}}
                {{-- <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">داشبورد</a></li> --}}
                {{-- @yield('breadcrumb') --}}
            </ol>
        </nav>
    </div>

    <ul class="navbar-nav d-none d-lg-block px-3" id="logout-btn">
        <li class="nav-item text-nowrap pointer">
            <a class="nav-link" href="/">{{ __('Logout') }}</a>
        </li>
    </ul>
</nav>
