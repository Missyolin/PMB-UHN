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

            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body py-3 px-md-5">
                        <h2>Masuk</h2>
                        <form class="py-3 needs-validation" method="post" action="{{ route('post-login') }}">
                            @csrf
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="email" id="email" name="email" class="form-control" required/>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required />
                            </div>
                            <!-- Forgot password -->
                            <div class="mb-4">
                                <a href="{{ route('forgot-password') }}" class="text-decoration-none" style="color: hsl(196.76, 97.14%, 41.18%)">Lupa kata sandi?</a>
                            </div>
                            <!-- Submit button -->
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn text-white btn-block" style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                    Masuk
                                </button>
                            </div>
                            <!-- Error Message -->
                            @if (session('error'))
                                <div class="text-end mt-2">
                                    <h7 class="text-danger">{{ session('error') }}</h7>
                                </div>
                            @endif
                            <p class="mt-2 mb-0 text-center">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none" style="color: hsl(196.76, 97.14%, 41.18%)">Daftar sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
