@extends('Template.app')

@section('content')
<nav class="navbar bg-white mx-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/uhn-logo.png') }}" alt="Logo" width="250" class="d-inline-block align-text-top">
        </a>

        <div class="dropdown">
            <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, {{ Auth::user()->username }} <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu">
                @if (Auth::check())
                    @if(Auth::user()->username === 'Admin')
                    <a class="text-decoration-none text-black" href="{{ route('dashboard-admin') }}">
                        <li class="mx-3"> Laman Admin  <i class="bi bi-box-arrow-left"></i>
                            <form id="admin-form" action="{{ route('dashboard-admin') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </a>
                    @endif
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <a class="text-decoration-none text-black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <li class="mx-3"> Logout  <i class="bi bi-box-arrow-left"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        </a>
                @endif
            </ul>
        </div>
    </div>
</nav>

<body>
    @yield('content-below')
</body>
@endsection
