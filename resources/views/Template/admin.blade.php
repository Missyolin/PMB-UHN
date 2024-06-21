@extends('Template.app')
@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-body-tertiary" style="position: fixed; top: 0; bottom: 0; overflow-y: auto;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mt-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"><img src="{{asset('images/uhn-logo.png')}}" style="width: 85%;"></span>
                </a>
                <hr class="text-black">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start fw-semibold" id="menu">
                    <li class="nav-item">
                        <a href="{{route('dashboard-admin')}}" class="nav-link {{ Request::is('dashboard-admin-pmb') ? ' active' : '' }} align-middle px-2">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('manajemenpmb-admin')}}" class="nav-link {{ Request::is('manajemen-pmb') ? ' active' : '' }} px-2 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Manajemen PMB</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-arms-up"></i><span class="d-none fw-semibold d-sm-inline mx-3">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item fw-semibold" href="{{route('dashboard')}}"><i class="bi bi-house p-2"></i>Lihat Dashboard PMB</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item fw-semibold" href="{{route('logout')}}"><i class="bi bi-box-arrow-left p-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3" style="margin-left: 18%;">
            @yield('content-below')
        </div>
    </div>
</div>
@endsection
