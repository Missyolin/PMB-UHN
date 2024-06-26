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
                        <form method="POST" action="{{ route('post-register') }}">
                            @csrf
                            <div class="form-outline mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username" required />
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required />
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                                <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" required />
                                <div id="confirmPasswordError" class="text-danger" style="display:none;"></div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="mt-2 btn text-white btn-block" style="background-color: hsl(196.9, 96.38%, 43.33%)">
                                    Register
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
    document.querySelector('form').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        if (password !== confirmPassword) {
            event.preventDefault();
            document.getElementById('confirmPasswordError').innerText = 'Passwords do not match!';
            document.getElementById('confirmPasswordError').style.display = 'block';
        }
    });
</script>

@endsection
