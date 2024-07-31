@extends('Template.app')

@section('content')
    <div class="row justify-content-center my-5">
        <!-- Image -->
        <div class="col-md-8">
            <div clas="">
               <img src="{{asset('images/uhn-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 50%;">
            </div>
            <div class="my-3 card">
                <div class="card-header">
                    Verifikasi Registrasi
                </div>

                <div class="card-body">
                    Kami telah mengirimkan link ke email anda untuk memverifikasi akun anda. Silahkan klik link yang ada di email tersebut untuk dapat Login ke dalam sistem.
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
