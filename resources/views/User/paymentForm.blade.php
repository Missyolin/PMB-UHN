@extends('Template.header')
@section('content-below')
<div class="card mx-5 my-5">
    <div class="card-header">
        <img src="{{ asset('images/uhn-logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 10%;">
    </div>
    <div class="card-body">
        <h4>Pembelian Formulir</h4>
        <!-- DETAILS -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mx-5 my-3 text-center" >
            <table class="table table-borderless">
            <thead>
                <tr>
                <th scope="col">Periode Pendaftaran</th>
                <th scope="col">Tanggal Ujian</th>
                <th scope="col">Tanggal Pengumuman</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row">{{ $selectedUjian->tanggal_buka_pendaftaran_formatted }} - {{ $selectedUjian->tanggal_tutup_pendaftaran_formatted }}</td>
                @if($selectedUjian->metode_ujian == 'Testing')
                <td scope="row">{{ $selectedUjian->tanggal_buka_pendaftaran_formatted }} - {{ $selectedUjian->tanggal_tutup_pendaftaran_formatted }}</td>
                @else
                <td>-</td>
                @endif
                <td>{{$selectedUjian->waktu_pengumuman}}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                <th scope="col">Metode Ujian</th>
                <th scope="col">Biaya Formulir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row">{{$selectedUjian->metode_ujian}}</td>
                @if($selectedUjian->biaya_ujian == 0.00)
                <td>Gratis</td>
                @else
                <td>Rp. {{$selectedUjian->biaya_ujian}}</td>
                @endif
                </tr>
            </tbody>
            </table>
        </div>
        <!-- END OF DETAILS -->
        <hr>
        <h6 class="my-3">* silahkan isi form dibawah untuk membeli Formulir</h6>
        <!-- FORM PEMBELIAN -->
        <form action="" method="">
            <div class="mx-5 my-5 text-start ">
                <div class="row d-flex justify-content-center">
                    <div class="col-4">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required>
                        <div id="namaLengkapHelper" class="form-text">Sesuai dengan KTP</div>
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" disabled readonly value="{{ Auth::user()->email }}">
                        </div>
                </div>
            </div>

            <!-- SUMBIT BUTTON -->
            <div class="text-end mx-5">
                <button type="submit" class="btn text-white" style="background-color: #049DD9; width: 24rem;"><h6>Beli Formulir</h6></button>
            </div>
        </form>
        <!-- END OF FORM PEMBELIAN -->
    </div>
</div>
@endsection