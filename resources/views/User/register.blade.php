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
                        <h2>Daftar Akun</h2>
                        <form id="registerForm" class="my-4 needs-validation" action="{{ route('post-register') }}" method="post">
                            @csrf
                            <!-- Username -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required/>
                            </div>
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" required/>
                                @error('email')
                                    <div class="invalid-feedback">Email sudah terdaftar</div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required/>
                            </div>

                            <!-- Password Confirmation input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required />
                                <div id="passwordError" class="text-danger" style="display: none;">Password dan Konfirmasi Password tidak cocok.</div>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid gap-2" >
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="mt-2 btn text-white btn-block" style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                    Daftar
                                </button>
                            </div>
                            <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none" style="color: hsl(196.76, 97.14%, 41.18%)">Login sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                event.preventDefault();
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        });
    });
</script>

@endsection
