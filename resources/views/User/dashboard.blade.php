@extends('Template.header')

@section('content-below')

<!-- Title -->
<div class="text-secondary text-center my-3">
    <h4>Jalur Seleksi<br>Penerimaan Mahasiswa Baru</h4>
</div>

<!-- Cards -->
@foreach($tahun_ajaran as $tahun)
        <div class="row row-cols-1  row-cols-md-1  row-cols-lg-3 g-4 mx-5 my-3" >
            @foreach($tahun->jenisUjian as $ujian)
                @if(!$ujian->flag_is_ujian_hidden)
                    <div class="col">
                        <div class="card" style="position: relative;">
                            @if($ujian->flag_is_ujian_opened)
                            <img src="{{ asset('images/bg-open.png') }}" class="card-img-top" alt="...">
                            @else
                            <img src="{{ asset('images/bg-close.png') }}" class="card-img-top" alt="...">
                            @endif

                            @if($ujian->flag_is_ujian_opened)
                            <div class="card-img-overlay text-center text-white mt-4" style="">
                                <h4 class="card-title fw-bolder">{{$ujian->nama_ujian}}<br><span class="fw-light">Gelombang {{$ujian->gelombang_ujian}}</span><br><span class="fw-light"><small>{{$tahun->tahun_mulai}}/{{$tahun->tahun_selesai}}</small></span></h4>
                            </div>
                            @else
                            <div class="card-img-overlay text-center text-black mt-4" style="">
                                <h4 class="card-title fw-bolder">{{$ujian->nama_ujian}}<br><span class="fw-light">Gelombang {{$ujian->gelombang_ujian}}</span><br><span class="fw-light"><small>{{$tahun->tahun_mulai}}/{{$tahun->tahun_selesai}}</small></span></h4>
                            </div>
                            @endif

                            <div class="card-body" style="z-index: 2; position: relative;">
                                @if($ujian->flag_is_ujian_opened)
                                <div class=" rounded" style="background-color:#E7F1F5;">
                                    <p class="card-text fw-semibold text-secondary p-3">Periode Pendaftaran<br><span class="text-black">{{ $ujian->tanggal_buka_pendaftaran_formatted }} - {{ $ujian->tanggal_tutup_pendaftaran_formatted }}</span></p>
                                </div>
                                @else
                                <div class=" rounded bg-body-secondary">
                                    <p class="card-text fw-semibold text-secondary p-3">Periode Pendaftaran<br><span class="text-black">{{ $ujian->tanggal_buka_pendaftaran_formatted }} - {{ $ujian->tanggal_tutup_pendaftaran_formatted }}</span></p>
                                </div>
                                @endif
                                
                                @if($ujian->metode_ujian === 'Bebas Testing')
                                <p class="card-text fw-semibold text-secondary px-3 py-2">Tanggal Ujian<br><span class="text-black">-</span></p>
                                @else
                                <p class="card-text fw-semibold text-secondary px-3 py-2">Tanggal Ujian<br><span class="text-black">{{ $ujian->tanggal_buka_pendaftaran_formatted }} - {{ $ujian->tanggal_tutup_pendaftaran_formatted }}</span></p>
                                @endif
                                
                                @if($ujian->flag_is_ujian_opened)
                                <div class=" rounded" style="background-color:#E7F1F5;">
                                    <p class="card-text fw-semibold text-secondary p-3 rounded" style="background-color:#E7F1F5;">Tanggal Pengumuman<br><span class="text-black">{{$ujian->waktu_pengumuman}}</span></p>
                                </div>
                                @else
                                <div class="rounded bg-body-secondary ">
                                    <p class="card-text fw-semibold text-secondary p-3 rounded">Tanggal Pengumuman<br><span class="text-black">{{$ujian->waktu_pengumuman}}</span></p>
                                </div>
                                @endif

                                <div class="row py-2">
                                    <div class="col">
                                        <p class="card-text fw-semibold text-secondary px-3">Metode Ujian<br><span class="text-black">{{$ujian->metode_ujian}}</span></p>
                                    </div>
                                    <div class="col">
                                        @if($ujian->biaya_ujian == 0.00)
                                        <p class="card-text fw-semibold text-secondary">Biaya<br><span class="text-black">Gratis</span></p>
                                        @else
                                        <p class="card-text fw-semibold text-secondary">Biaya<br><span class="text-black">Rp. {{$ujian->biaya_ujian}}</span></p>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <!-- Add the button here -->
                                @if($ujian->flag_is_ujian_opened)
                                <div class="text-center mt-3">
                                    <a href="{{ route('formulir-pmb',['id_ujian' => $ujian->id_jenis_ujian]) }}" class="btn text-white text-bold" style="width: 100%; background-color:#049DD9;">Daftar Ujian</a>
                                </div>
                                @else
                                <div class="text-center mt-3">
                                    <button class="btn btn-secondary"  style="width: 100%;" disabled>Daftar Ujian</button>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                @endif
            @endforeach 
        </div>
@endforeach

@endsection