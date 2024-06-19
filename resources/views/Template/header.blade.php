@extends('Template.app')

@section('content')
    <nav class="navbar bg-white mx-5" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('images/uhn-logo.png') }}" alt="Logo" width="250" class="d-inline-block align-text-top">
            </a>

            <div class="dropdown">
                <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hi, Username <i class="bi bi-person-circle"></i>
                </button>
                <ul class="dropdown-menu">
                    <li class="mx-3">
                        @if (Auth::check())
                            <a class="text-decoration-none text-black" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout  <i class="bi bi-box-arrow-left"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <body>
        @yield('content-below')
    </body>

@endsection