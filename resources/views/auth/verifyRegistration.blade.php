@extends('Template.app')

@section('content')
    <div class="row justify-content-center my-5">
        <!-- Image -->
        <div class="col-md-8">
            <div class="text-center mb-4">
               <img src="{{ asset('images/uhn-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 50%;">
            </div>
            <div class="card">
                <div class="card-header text-center">
                    Verifikasi Pendaftaran
                </div>

                <div class="card-body">
                    <p class="card-text text-center">
                        Hi, ini permintaan reset password, silahkan klik tombol di bawah ini untuk mereset:<br><br>
                        <a href="{{ route('verify-email', ['token' => $token]) }}" class="btn btn-primary">Verifikasi Akun</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
