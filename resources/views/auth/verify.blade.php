@extends('Template.app')

@section('content')
    <div class="row justify-content-center my-5">
        <!-- Image -->
        <div class="col-md-8">
            <div clas="">
               <img src="{{asset('images/uhn-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 50%;">
            </div>
            <div class="my-3 card">
                <div class="card-header">{{ __('Verifikasi Alamat Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    Silahkan klik tombol Verifikasi Akun untuk mengaktifkan akun anda. Verifikasi akan dikirimkan melalui email yang anda sudah daftarkan. Bila anda belum menerima email verifikasi, silahkan tekan tombol Verifikasi Akun setelah beberapa saat atau periksa kembali email yang anda daftarkan.
                    <br>
                    <div class="text-md-end text-sm-end text-end">
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn text-white align-baseline" style="background-color: hsl(196.9, 96.38%, 43.33%)">{{ __('Kirim verifikasi email kembali') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
