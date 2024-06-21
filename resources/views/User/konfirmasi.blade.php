@extends('Template.header')

@section('content-below')
<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('dashboard') }}" class="btn"><h6><i class="bi bi-chevron-left"></i> Dashboard</h6><a>
</div>
 
<div class="card mx-5 my-5">
    <div class="card-body">
        <div class="mx-5 my-3 text-center">
            <div class="row">
                <div class="col">
                    <h6 class="text-secondary">Nama Pendaftar</h6>
                    <h6>Missyolin Eunike Rungguni Samosir</h6>
                </div>
                <div class="col">
                    <h6 class="text-secondary">Jenis Ujian</h6>
                    <h6>PMB Bebas Testing</h6>
                </div>
                <div class="col">
                    <h6 class="text-secondary">Metode Ujian</h6>
                    <h6>Bebas Testing</h6>
                </div>
            </div>

            <div class="alert alert-primary my-5 mx-5" role="alert">
                <h4 class="alert-heading">Formulir kamu berhasil dikirimkan.</h4>
                <hr class="mx-5">
                <p>Silahkan menunggu konfirmasi Admin PMB untuk melakukan pendaftaran ulang.<br>Link daftar ulang akan diberikan ketika Admin PMB sudah mengkonfirmasi formulir anda</p>
                <button class="btn text-white fw-semibold" style="background-color:#049DD9">Daftar Ulang Online</button>
            </div>

            <div class="alert alert-primary my-5 mx-5" role="alert">
                <h4 class="alert-heading">Formulir kamu berhasil dikirimkan.</h4>
                <hr class="mx-5">
                <p>Silahkan mengerjakan ujian sampai batas akhir periode pendaftaran PMB Reguler. Pengumuman kelulusan keluar ketika anda sudah menyelesaikan  ujian anda.<br>Link ujian akan diberikan ketika Admin PMB sudah mengkonfirmasi formulir anda</p>
                <button class="btn text-white fw-semibold" style="background-color:#049DD9">Mulai Ujian</button>
            </div>
            
        </div>
    </div>
</div>
@endsection