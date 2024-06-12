@extends('Template.app')

@section('content')

<div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
        <div class="row gx-lg-5 justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class=" mb-4">
                    <img src="{{ asset('images/uhn-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 50%;">
                </div>
                <h1 class="display-3 fw-bold ls-tight">
                    Penerimaan Mahasiswa Baru <br />
                    <span style="color: hsl(196.9, 96.38%, 43.33%)">Universitas HKBP Nommensen Medan</span>
                </h1>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body px-5">
                        <h2 class="mb-3">Reset Kata Sandi</h2>
                        <p class="card-text py-2">
                            Enter your email address and we'll send you an email with instructions to reset your password.
                        </p>
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="typeEmail">Alamat Email</label>
                            <input type="email" id="typeEmail" class="form-control" required/>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn text-white btn-block " style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                Reset kata sandi
                            </button>
                        </div>
                        <div class="text-end">
                            <h7 class="text-danger">Alamat email tidak ditemukan</h7>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="text-decoration-none" href="{{ route('login') }}" style="color: hsl(196.76, 97.14%, 41.18%)">Login</a>
                            <a class="text-decoration-none" href="{{ route('register') }}" style="color: hsl(196.76, 97.14%, 41.18%)">Daftar Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection