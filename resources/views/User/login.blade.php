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
                    Silahkan masuk terlebih dahulu untuk mengakses laman pendaftaran
                </p>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-body py-3 px-md-5">
                        <h2>Masuk</h2>
                        <form class="py-3 needs-validation">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Alamat Email</label>
                                <input type="email" id="form3Example3" class="form-control" required/>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" id="form3Example4" class="form-control" required />
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid gap-2">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn text-white btn-block mb-4" style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                    Masuk
                                </button>
                            </div>
                            <p class="mb-0">Bila anda belum memiliki akun, silahkan daftar terlebih dahulu melalui <a href="{{ route('register') }}">link berikut</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection