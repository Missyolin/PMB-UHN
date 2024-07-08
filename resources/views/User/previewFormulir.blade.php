@extends('Template.header')

@section('content-below')
<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('dashboard') }}" class="btn">
        <h6><i class="bi bi-chevron-left"></i> Dashboard</h6>
    </a>
</div>
<div class="text-secondary text-center my-3">
    <h4>Detail Ujian {{$selectedUjian->nama_ujian}}</h4>
</div>

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
        <th scope="col">Lihat Informasi Ujian</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td scope="row">{{$selectedUjian->metode_ujian}}</td>
        <td>Gratis</td>
        <td>
            <a href="{{route('konfirmasi-formulir', ['id' => $selectedUjian->id_jenis_ujian])}}" class="btn bg-info-subtle fw-semibold text-info">Lihat</a>
        </td>
        </tr>
    </tbody>
    </table>
</div>

<!-- MODAL DATA PENDAFTAR -->
@foreach($peserta as $item)
<div class="">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
        </div>
        <div class="mx-3">  
            <div class="">
                <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                    <h3><div class="fw-semibold" id="dataPribadi">
                        <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">1</div>
                        Data Pribadi
                    </div></h3>
                    <!-- Nama Lengkap & NIK -->
                    <div class="mx-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                <input disabled type="text" class="form-control" id="namaLengkap" name="namaLlengkap" value="{{$item['pribadi']->nama_lengkap}}">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="nik" class="form-label">NIK</label>
                                <input disabled type="text" class="form-control" id="nik" name="nik" value="{{$item['pribadi']->nik}}">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat & Keterangan  Tinggal -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <input disabled type="text" class="form-control" id="alamat" name="alamat" value="{{$item['pribadi']->alamat}}">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="keterangan" class="form-label">Keterangan Tempat Tinggal</label>
                                <input disabled type="text" class="form-control" id="keterangan" name="keterangan" disabled value="{{$item['pribadi']->keterangan_tempat_tinggal}}">
                            </div>
                        </div>
                    </div>

                    <!-- Provinsi, Kota, Kecamatan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input disabled type="text" class="form-control" id="provinsi" name="provinsi" disabled value="{{$item['pribadi']->provinsi}}">
                            </div>
                            <div class="col">
                                <label for="kota" class="form-label">Kota</label>
                                <input disabled type="text" class="form-control" id="kota" name="kota" disabled value="{{$item['pribadi']->kota_kabupaten}}">
                            </div>
                            <div class="col">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input disabled type="text" class="form-control" id="kecamatan" name="kecamatan" disabled value="{{$item['pribadi']->kecamatan}}">
                            </div>
                        </div>
                    </div>

                    <!-- Kabupaten, Kelurahan, Kode Pos -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input disabled type="text" class="form-control" id="kelurahan" name="kelurahan" disabled value="{{$item['pribadi']->kelurahan}}">
                            </div>
                            <div class="col">
                                <label for="kodePos" class="form-label">Kode Pos</label>
                                <input disabled type="text" class="form-control" id="kodePos" name="kodePos" value="{{$item['pribadi']->kode_pos}}">
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Handphone, Email -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noHp" class="form-label">Nomor Handphone</label>
                                <input disabled type="text" class="form-control" id="noHp" name="noHp" value="{{$item['pribadi']->no_telp}}">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input disabled type="email" class="form-control" id="email" name="email" disabled readonly value="{{$item['email']}}">
                            </div>
                        </div>
                    </div>

                    <!-- Tempat Lahir, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <input disabled type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="{{$item['pribadi']->tempat_lahir}}">
                            </div>
                            <div class="col">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="{{$item['pribadi']->tanggal_lahir}}">
                            </div>
                        </div>
                    </div>

                    <!-- Kewarganegaraan, Status Sipil -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <input disabled type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" disabled value="{{$item['pribadi']->kewarganegaraan}}">
                            </div>
                            <div class="col">
                                <label for="statusSipil" class="form-label">Status Sipil</label>
                                <input disabled type="text" class="form-control" id="statusSipil" name="statusSipil" disabled value="{{$item['pribadi']->status_sipil}}">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Gereja -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agama" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agama" name="agama" disabled  value="{{$item['pribadi']->agama}}">
                            </div>
                            <div class="col">
                                <label for="gereja" class="form-label">Gereja</label>
                                <input disabled type="text" class="form-control" id="gereja" name="gereja" disabled value="{{$item['pribadi']->gereja}}">
                            </div>
                        </div>
                    </div>

                    <!-- Data Saudara Kandung di UHN -->
                     <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="npm1" class="form-label">NPM - 1</label>
                                <input disabled type="text" class="form-control" id="npm1" name="npm1" value="{{$item['pribadi']->npm_1}}">
                            </div>
                            <div class="col">
                                <label for="npm2" class="form-label">NPM - 2</label>
                                <input disabled type="email" class="form-control" id="npm2" name="npm2" value="{{$item['pribadi']->npm_2}}">
                            </div>
                        </div>
                    </div>
                
                   
                    <h3><div class="fw-semibold" id="prodi">
                        <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">2</div>
                        Pilihan Program Studi
                    </div></h3>
                    <!-- Fakultas -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <input disabled type="text" class="form-control" id="fakultas" name="fakultas" disabled value="{{$item['pendaftar']->fakultas}}">
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>

                    <!-- Program Studi -->
                    <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="prodi1" class="form-label">Program Studi - 1</label>
                                <input disabled type="text" class="form-control" id="prodi1" name="prodi1" disabled value="{{$item['pendaftar']->prodi_1}}">
                            </div>
                            <div class="col">
                                <label for="prodi2" class="form-label">Program Studi - 2</label>
                                <input disabled type="text" class="form-control" id="prodi2" name="prodi2" disabled value="{{$item['pendaftar']->prodi_2}}">
                                <div id="passwordHelpBlock" class="form-text">program studi 2 hanya berlaku untuk Fakultas Ekonomi</div>
                            </div>
                        </div>
                    </div>
                
                    
                    <h3><div class="fw-semibold" id="asalSekolah">
                        <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">3</div>
                        Data Asal Sekolah
                    </div></h3>

                    <!-- Provinsi, Kota, Kabupaten Sekolah -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="provSekolah" class="form-label">Provinsi</label>
                                <input disabled type="text" class="form-control" id="provSekolah" name="provSekolah" disabled value="{{$item['sekolah']->provinsi_sekolah}}">
                            </div>
                            <div class="col">
                                <label for="kotaSekolah" class="form-label">Kota</label>
                                <input disabled type="text" class="form-control" id="kotaSekolah" name="kotaSekolah" disabled value="{{$item['sekolah']->kota_kabupaten_sekolah}}">
                            </div>
                        </div>
                    </div>

                    <!-- Asal SMA/SMK/MA -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="nisn" class="form-label">NISN</label>
                                <input disabled type="text" class="form-control" id="nisn" name="nisn" disabled value="{{$item['sekolah']->nisn}}">
                            </div>
                            <div class="col">
                                <label for="asalSekolah" class="form-label">Asal SMA/SMK/MA</label>
                                <input disabled type="text" class="form-control" id="asalSekolah" name="asalSekolah" disabled value="{{$item['sekolah']->nama_sekolah}}">
                            </div>
                        </div>
                    </div>

                    <!-- Jurusan, Tahun Lulus -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input disabled type="text" class="form-control" id="jurusan" name="jurusan" disabled value="{{$item['sekolah']->jurusan}}">
                            </div>
                            <div class="col">
                                <label for="tahunLulus" class="form-label">Tahun Lulus</label>
                                <input disabled type="text" class="form-control" id="tahunLulus" name="tahunLulus" disabled value="{{$item['sekolah']->tahun_lulus}}">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Nilai UAN, Jumlah Mapel UAN -->
                    <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="nilaiUan" class="form-label">Jumlah Nilai UAN</label>
                                <input disabled type="text" class="form-control" id="nilaiUan" name="nilaiUan" value="{{$item['sekolah']->jumlah_nilai_uan}}">
                            </div>
                            <div class="col">
                                <label for="mapelUan" class="form-label">Jumlah Mata Pelajaran UAN</label>
                                <input disabled type="text" class="form-control" id="mapelUan" name="mapelUan" value="{{$item['sekolah']->jumlah_mata_pelajaran_uan}}">
                            </div>
                        </div>
                    </div>
                

                    <h3><div class="fw-semibold" id="orangtua">
                        <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">4</div>
                        Data Orangtua
                    </div></h3>
                    <!-- AYAH -->
                     <h5 class="mx-5 my-2">Ayah</h5>

                    <!-- Nama, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="namaAyah" class="form-label">Nama Lengkap</label>
                                <input disabled type="text" class="form-control" id="namaAyah" name="namaAyah" value="{{$item['orangtua']->nama_ayah}}">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlAyah" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlAyah" name="tlAyah" value="{{$item['orangtua']->tanggal_lahir_ayah}}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaAyah" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaAyah" name="agamaAyah" disabled value="{{$item['orangtua']->agama_ayah}}">
                            </div>
                            <div class="col">
                                <label for="pendidikanAyah" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanAyah" name="pendidikanAyah" disabled value="{{$item['orangtua']->pendidikan_ayah}}">
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" disabled value="{{$item['orangtua']->pekerjaan_ayah}}">
                            </div>
                            <div class="col">
                                <label for="penghasilanAyah" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanAyah" name="penghasilanAyah" disabled value="{{$item['orangtua']->penghasilan_ayah}}">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatAyah" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatAyah" name="namaAyah" value="{{$item['orangtua']->alamat_ayah}}">
                            </div>
                            <div class="col">
                                <label for="statusAyah" class="form-label">Status</label>
                                <input disabled type="text" class="form-control" id="statusAyah" name="statusAyah" disabled value="{{$item['orangtua']->status_ayah}}">
                            </div>
                        </div>
                    </div>

                    <!-- No. Handphone -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noAyah" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noAyah" name="noAyah" value="{{$item['orangtua']->no_hp_ayah}}">
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>

                    <!-- END OF AYAH -->

                    <!-- IBU -->
                    <h5 class="mx-5">Ibu</h5>

                    <!-- Nama, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="namaIbu" class="form-label">Nama Lengkap</label>
                                <input disabled type="text" class="form-control" id="namaIbu" name="namaIbu" value="{{$item['orangtua']->nama_ibu}}">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlIbu" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlIbu" name="tlIbu" value="{{$item['orangtua']->tanggal_lahir_ibu}}">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaIbu" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaIbu" name="agamaIbu" disabled value="{{$item['orangtua']->agama_ibu}}">
                            </div>
                            <div class="col">
                                <label for="pendidikanIbu" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanIbu" name="pendidikanIbu" disabled value="{{$item['orangtua']->pendidikan_ibu}}">

                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" disabled value="{{$item['orangtua']->pekerjaan_ibu}}">
                            </div>
                            <div class="col">
                                <label for="penghasilanIbu" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanIbu" name="penghasilanIbu" disabled value="{{$item['orangtua']->penghasilan_ibu}}">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatIbu" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatIbu" name="namaIbu" value="{{$item['orangtua']->alamat_ibu}}">
                            </div>
                            <div class="col">
                                <label for="statusIbu" class="form-label">Status</label>
                                <input disabled type="text" class="form-control" id="statusIbu" name="statusIbu" disabled value="{{$item['orangtua']->status_ibu}}">
                            </div>
                        </div>
                    </div>

                    <!-- No. Handphone -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noIbu" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noIbu" name="noIbu" value="{{$item['orangtua']->no_hp_ibu}}">
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>

                    <!-- END OF IBU -->

                    <!-- WALI -->
                    <h5 class="mx-5 my-2">Wali</h5>

                    <!-- Nama, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="namaWali" class="form-label">Nama Lengkap</label>
                                <input disabled type="text" class="form-control" id="namaWali" name="namaWali" value="{{$item['orangtua']->nama_wali}}">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlWali" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlWali" name="tlWali" value="{{$item['orangtua']->tanggal_lahir_wali}}">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaWali" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaWali" name="agamaWali" disabled value="{{$item['orangtua']->agama_wali}}">
                            </div>
                            <div class="col">
                                <label for="pendidikanWali" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanWali" name="pendidikanWali" disabled value="{{$item['orangtua']->pendidikan_wali}}">
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanWali" name="pekerjaanWali" disabled value="{{$item['orangtua']->pekerjaan_wali}}">
                            </div>
                            <div class="col">
                                <label for="penghasilanWali" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanWali" name="penghasilanWali" disabled value="{{$item['orangtua']->penghasilan_wali}}">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatWali" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatWali" name="namaWali" value="{{$item['orangtua']->alamat_wali}}">
                            </div>

                            <div class="col">
                                <label for="noWali" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noWali" name="noWali" value="{{$item['orangtua']->no_hp_wali}}">
                            </div>
                        </div>
                    </div>
                    <!-- END OF WALI -->
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endforeach
@endsection
