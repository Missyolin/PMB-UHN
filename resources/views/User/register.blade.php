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
                <p class="my-3" style="color: hsl(217, 10%, 50.8%)">
                    Silahkan melakukan pendaftaran akun terlebih dahulu untuk masuk ke laman pendaftaran
                </p>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body py-3 px-md-5">
                        <h2>Daftar Akun</h2>
                        <form class="my-4 needs-validation">
                            <!-- Username -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form3Example3">Username</label>
                                <input type="text" id="form3Example3" class="form-control" required/>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form3Example3">Alamat Email</label>
                                <input type="email" id="form3Example3" class="form-control" />
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" />
                            </div>

                            <!-- Password Confirmation input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Konfirmasi Password</label>
                                <input type="password" id="form3Example4" class="form-control" />
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid gap-2" >
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="my-3 btn text-white btn-block mb-4" style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                    Daftarkan Akun
                                </button>
                            </div>
                            <p class="mb-0">Bila anda sudah memiliki akun, silahkan masuk melalui <a href="{{ route('login') }}">link berikut</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
