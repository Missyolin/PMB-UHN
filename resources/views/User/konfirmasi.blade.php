@extends('Template.header')

@section('content-below')
<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('preview-formulir',['id' => $selectedUjian->id_jenis_ujian]) }}" class="btn"><h6><i class="bi bi-chevron-left"></i> Preview Formulir</h6><a>
</div>
 
<div class="card mx-5 my-5">
    <div class="card-body">
        <div class="mx-5 my-3 text-center">
            <div class="row">
                <div class="col">
                    <h6 class="text-secondary">Nama Pendaftar</h6>
                    @foreach ($dataPribadi as $pribadi)
                        <h6>{{ $pribadi->nama_lengkap }}</h6>
                    @endforeach
                </div>
                <div class="col">
                    <h6 class="text-secondary">Jenis Ujian</h6>
                    <h6>{{ $selectedUjian->nama_ujian }}</h6>
                </div>
                <div class="col">
                    <h6 class="text-secondary">Metode Ujian</h6>
                    <h6>{{ $selectedUjian->metode_ujian }}</h6>
                </div>
            </div>

            @if ($selectedUjian->metode_ujian == 'Bebas Testing')
            <div class="alert alert-primary my-5 mx-5" role="alert">
                <h4 class="alert-heading">Formulir kamu berhasil dikirimkan.</h4>
                <hr class="mx-5">
                <p>Silahkan menunggu konfirmasi Admin PMB untuk melakukan pendaftaran ulang.<br>Link daftar ulang akan diberikan ketika Admin PMB sudah mengkonfirmasi formulir anda</p>
                @if($konfirmasiStatus)
                <button class="btn text-white fw-semibold" style="background-color:#049DD9">Daftar Ulang Online</button>
                @endif
            </div>
            @else
            <div class="alert alert-primary my-5 mx-5" role="alert">
                <h4 class="alert-heading">Formulir kamu berhasil dikirimkan.</h4>
                <hr class="mx-5">
                <p>Silahkan mengerjakan ujian sampai batas akhir periode pendaftaran PMB Reguler. Pengumuman kelulusan keluar ketika anda sudah menyelesaikan  ujian anda.<br>Link ujian akan diberikan ketika Admin PMB sudah mengkonfirmasi formulir anda</p>
                @if($konfirmasiStatus)
                <button class="btn text-white fw-semibold" style="background-color:#049DD9">Mulai Ujian</button>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
