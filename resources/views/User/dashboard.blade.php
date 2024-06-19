@extends('Template.header')

@section('content-below')

<!-- Title -->
<div class="text-secondary text-center my-3">
    <h4>Jalur Seleksi<br>Penerimaan Mahasiswa Baru</h4>
</div>

<!-- Cards -->
<div class="row row-cols-1 row-cols-md-3 g-4 mx-5 my-3" >

    <div class="col">
        <div class="card" style="position: relative;">
            <img src="{{ asset('images/bg-open.png') }}" class="card-img-top" alt="...">

            <div class="card-img-overlay text-center text-white mt-5" style="">
                <h4 class="card-title mt-3 fw-bolder">PMB Bebas Testing<br><span class="fw-light">Gelombang I</span></h4>
            </div>

            <div class="card-body" style="z-index: 2; position: relative;">
                <p class="card-text fw-semibold text-secondary">Periode Pendaftaran<br><span class="text-black">5 Februari 2024 - 8 Juni 2024</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Ujian<br><span class="text-black">-</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Pengumuman<br><span class="text-black">Realtime</span></p>
                <p class="card-text fw-semibold text-secondary">Metode Ujian<br><span class="text-black">Bebas Testing</span></p>
                <h5 class="card-text fw-semibold text-secondary text-center mt-2">Biaya<span class="text-black mx-2">Gratis</span></h5>
                <!-- Add the button here -->
                <div class="text-center mt-3">
                    <a href="{{ route('formulir-pmb') }}" class="btn text-white text-bold" style="width:20rem; background-color:#049DD9;">Daftar Ujian</a>
                </div>
            </div>

        </div>
    </div>


    <div class="col">
        <div class="card">
            <img src="{{ asset('images/bg-open.png') }}" class="card-img-top" alt="...">
            <div class="card-img-overlay text-center mt-5">
                <h4 class="card-title mt-3 fw-bolder text-white">PMB Reguler<br><span class="fw-light">Gelombang I<span></h4>
            </div>

            <div class="card-body" style="z-index: 2; position: relative;">
                <p class="card-text fw-semibold text-secondary">Periode Pendaftaran<br><span class="text-black">10 Juni 2024 - 10 Juli 2024</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Ujian<br><span class="text-black">-</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Pengumuman<br><span class="text-black">Realtime</span></p>
                <p class="card-text fw-semibold text-secondary">Metode Ujian<br><span class="text-black">Bebas Testing</span></p>
                <h5 class="card-text fw-semibold text-secondary text-center mt-2">Biaya<span class="text-black mx-2">Rp 250.000</span></h5>
                <!-- Add the button here -->
                <div class="text-center mt-3">
                    <button type="button" class="btn text-white text-bold" style="width:20rem;background-color:#049DD9;">Daftar Ujian</button>
                </div>
            </div>

        </div>
    </div>

    <div class="col">
        <div class="card">
            <img src="{{ asset('images/bg-close.png') }}" class="card-img-top" alt="...">
            <div class="card-img-overlay text-center mt-5">
                <h4 class="card-title mt-3 fw-bolder text-black">PMB Khusus Fakultas Kedokteran<br><span class="fw-light">Gelombang I<span></h4>
            </div>

            <div class="card-body" style="z-index: 2; position: relative;">
                <p class="card-text fw-semibold text-secondary">Periode Pendaftaran<br><span class="text-black">10 Juni 2024 - 10 Juli 2024</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Ujian<br><span class="text-black">-</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Pengumuman<br><span class="text-black">Realtime</span></p>
                <p class="card-text fw-semibold text-secondary">Metode Ujian<br><span class="text-black">Bebas Testing</span></p>
                <h5 class="card-text fw-semibold text-secondary text-center mt-2">Biaya<span class="text-black mx-2">Rp 1.000.000</span></h5>
                <!-- Add the button here -->
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-secondary text-white text-bold" style="width:20rem;" disabled>Daftar Ujian</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <img src="{{ asset('images/bg-close.png') }}" class="card-img-top" alt="...">
            <div class="card-img-overlay text-center mt-5">
                <h4 class="card-title mt-3 fw-bolder text-black">PMB Khusus Fakultas Kedokteran<br><span class="fw-light">Gelombang II<span></h4>
            </div>

            <div class="card-body" style="z-index: 2; position: relative;">
                <p class="card-text fw-semibold text-secondary">Periode Pendaftaran<br><span class="text-black">10 Juni 2024 - 10 Juli 2024</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Ujian<br><span class="text-black">-</span></p>
                <p class="card-text fw-semibold text-secondary">Tanggal Pengumuman<br><span class="text-black">Realtime</span></p>
                <p class="card-text fw-semibold text-secondary">Metode Ujian<br><span class="text-black">Bebas Testing</span></p>
                <h5 class="card-text fw-semibold text-secondary text-center mt-2">Biaya<span class="text-black mx-2">Rp 1.000.000</span></h5>
                <!-- Add the button here -->
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-secondary text-white text-bold" style="width:20rem;" disabled>Daftar Ujian</button>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection