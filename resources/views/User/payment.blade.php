@extends('Template.header')

@section('content-below')

<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('dashboard') }}" class="btn"><h6><i class="bi bi-chevron-left"></i> Dashboard</h6><a>
</div>

<div class="card mx-5 my-5">
    <div class="card-header">
        <h4>Pembelian Formulir</h4>
        <p>Silahkan lakukan pembayaran terlebih dahulu untuk membeli formulir dan melanjutkan tahap berikutnya</p>
    </div>
    <div class="card-body">
        <div class="mx-5 my-3">
            <div class="row">
                <div class="col text-center">
                    <h6 class="text-secondary">Email Pendaftar</h6>
                    <h6>{{ Auth::user()->email }}</h6>
                </div>
                <div class="col text-center">
                    <h6 class="text-secondary">Jenis Ujian</h6>
                    <h6>PMB Reguler</h6>
                </div>
                <div class="col text-center">
                    <h6 class="text-secondary">Metode Ujian</h6>
                    <h6>Testing</h6>
                </div>
            </div>

            <div class="card mx-5 mt-5">
                <div class="card-header text-white fw-semibold" style="background-color:#049DD9;">
                    <h5>Detail Pembayaran</h5>
                </div>

                <div class="card-body mx-5">
                    <h5 class="fw-bold">Deskripsi Tagihan</h5>
                    <div class="row mt-5">
                        <div class="col">
                            <h5 class="text-secondary">Biaya pembelian formulir</h5>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                            <h5 class="">Rp 250.000</h5>
                        </div>
                    </div>
                    <hr>
                    <h5 class="fw-bold">Metode Pembayaran</h5>
                    <p>Silahkan lakukan pembayaran ke bank BRI dengan nomor Virtual Account Berikut</p>
                    <div class="row mt-5">
                        <div class="col">
                            <h6 class="text-secondary">No. Virtual Account</h6>
                            <h6>77678 19242750490</h6>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                            <h6 class="text-secondary">Total Tagihan</h6>
                            <h6>Rp 250.000</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-5">
                <p>klik <span><a href="#" class="text-decoration-none" style="font-color:#049DD9">link berikut</a></span> untuk melihat cara pembayaran menggunakan Virtual Account.</p>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-primary mx-5 text-center" role="alert">
    <h5><i class="bi bi-hourglass-split"></i><br></h5>
    Silahkan refresh halaman ini bila anda sudah melakukan pembayaran
</div>
<div class="alert alert-primary mx-5 my-5 text-center" role="alert">
    <h5><i class="bi bi-patch-check-fill"></i><br></h5>
    Pembayaran anda kami terima, silahkan klik <a href="{{ route('formulir-pmb') }}" class="alert-link">link berikut</a> untuk mengisi formulir pendaftaran
</div>
@endsection