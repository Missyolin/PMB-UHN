@extends('Template.header')

@section('content-below')
<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('dashboard') }}" class="btn"><h6><i class="bi bi-chevron-left"></i> Dashboard</h6><a>
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
        <th scope="col">Lihat Ketentuan PMB</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td scope="row">{{$selectedUjian->metode_ujian}}</td>
        <td>Gratis</td>
        <td>
            <button type="button" class="btn bg-info-subtle fw-semibold text-info">Lihat</button>
        </td>
        </tr>
    </tbody>
    </table>
</div>

<!-- FORMULIR -->
<div class="card mx-5 my-5">
    <div class="card-header">
    <h2 class="card-title mx-5">Formulir Pendaftaran</h2>
    </div>
    <form id="formulirPendaftaran" action="{{route('save-formulir-pmb')}}" method="post" class="needs-validation">
        @csrf
        <div class="card-body">
            <!-- Hidden field for ID Ujian -->
            <input type="hidden" name="id_ujian" value="{{ $selectedUjian->id_jenis_ujian }}">
            <!-- SCROLLSPY -->
            <div class="row">
                <div class="col-4">
                    <div id="list-example" class="list-group mx-5" style="width:20rem;">
                        <a class="list-group-item list-group-item-action" href="#dataPribadi">Data Pribadi</a>
                        <a class="list-group-item list-group-item-action" href="#prodi">Pilihan Program Studi</a>
                        <a class="list-group-item list-group-item-action" href="#asalSekolah">Data Asal Sekolah</a>
                        <a class="list-group-item list-group-item-action" href="#orangtua">Data Orangtua</a>
                    </div>
                </div>

                <div class="col-8">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                        <h3>
                        <div class="fw-semibold" id="dataPribadi">
                            <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">1</div>
                            Data Pribadi
                        </div></h3>
                        <!-- Nama Lengkap & NIK -->
                        <div class="mx-5 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" required>
                                    <div id="namaLengkapHelper" class="form-text">Sesuai dengan KTP</div>
                                </div>
                                <div class="col">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat & Keterangan  Tinggal -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    <div id="alamatHelper" class="form-text">Sesuai dengan KTP</div>
                                </div>
                                <div class="col">
                                    <label for="keterangan" class="form-label">Keterangan Tempat Tinggal</label>
                                    <select class="form-select" id="keterangan" name="keterangan" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Bersama Orangtua">Bersama Orangtua</option>
                                        <option value="Kos">Kos</option>
                                        <option value="Wali">Wali</option>
                                        <option value="Asrama">Asrama</option>
                                        <option value="Panti Asuhan">Panti Asuhan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Provinsi, Kota, Kecamatan -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select id="provinsi" name="provinsi" class="form-select" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        @foreach($provinces as $provinsi)
                                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col">
                                    <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                    <select id="kota_kabupaten" name="kota_kabupaten" class="form-select" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        @foreach ($regencies as $kab_kota)
                                            <option value="{{ $kab_kota->id }}" class="kab_kota-option" data-province-id="{{ $kab_kota->province_id }}">{{ $kab_kota->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" class="form-select" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        @foreach ($districts as $kecamatan)
                                            <option value="{{$kecamatan->id}}" class="kecamatan-option" data-regency-id="{{$kecamatan->regency_id}}">{{$kecamatan->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Kabupaten, Kelurahan, Kode Pos -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                                </div>
                                <div class="col">
                                    <label for="kode_pos" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                </div>
                                <div class="col">
                                    <label for="no_telp" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Handphone, Email -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" disabled readonly value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Lahir, Tanggal Lahir -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                                <div class="col">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                            </div>
                        </div>

                        <!-- Kewarganegaraan, Status Sipil -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                </div>
                                <div class="col">
                                    <label for="status_sipil" class="form-label">Status Sipil</label>
                                    <select class="form-select" id="status_sipil" name="status_sipil"aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Agama, Gereja -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-select" id="agama" name="agama" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="gereja" class="form-label">Gereja</label>
                                    <input type="text" class="form-control" id="gereja" name="gereja">
                                </div>
                            </div>
                        </div>

                        <!-- Data Saudara Kandung di UHN -->
                        <p class="mx-5">*Silahkan isi data berikut bila memiliki saudara kandung yang sedang berkuliah di Universitas HKBP Nommensen</p>

                        <div class="mx-5 mt-3 mb-5 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="npm_1" class="form-label">NPM - 1</label>
                                    <input type="text" class="form-control" id="npm_1" name="npm_1">
                                </div>
                                <div class="col">
                                    <label for="npm_2" class="form-label">NPM - 2</label>
                                    <input type="email" class="form-control" id="npm_2" name="npm_2">
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
                                    <select class="form-select" id="fakultas" name="fakultas" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="FITE">Fakultas Teknik Elektro dan Informatika</option>
                                        <option value="FE">Fakultas Ekonomi</option>
                                    </select>
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
                                    <select class="form-select" id="prodi1" name="prodi1" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="S1 Informatika">S1 Informatika</option>
                                        <option value="D4 TRPL">D4 TRPL</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="prodi2" class="form-label">Program Studi - 2</label>
                                    <select class="form-select" id="prodi2" name="prodi2" aria-label="Default select example">
                                        <option selected hidden></option>
                                        <option value="Manajamen Ekonomi">Manajemen Ekonomi</option>
                                        <option value="Bisnis Digital">Bisnis Digital</option>
                                    </select>
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
                                    <select id="provSekolah" name="provSekolah" class="form-select" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        @foreach($provinces as $provinsi)
                                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="kotaSekolah" class="form-label">Kota/Kabupaten</label>
                                    <select id="kotaSekolah" name="kotaSekolah" class="form-select" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        @foreach ($regencies as $kab_kota)
                                        <option value="{{ $kab_kota->id }}" data-province-id="{{ $kab_kota->province_id }}">{{ $kab_kota->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Asal SMA/SMK/MA -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="asalSekolah" class="form-label">Asal SMA/SMK/MA</label>
                                    <input class="form-control" type="text" id="asalSekolah" name="asalSekolah" required>
                                </div>
                            </div>
                        </div>

                        <!-- Jurusan, Tahun Lulus -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option val="IPA">IPA</option>
                                        <option val="IPS">IPS</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="tahunLulus" class="form-label">Tahun Lulus</label>
                                    <select class="form-select" id="tahunLulus" name="tahunLulus" aria-label="Default select example" required>
                                    <option selected hidden></option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = $currentYear - 4;
                                        $endYear = $currentYear;
                                    @endphp
                                    @for ($year = $endYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Ijazah, Tanggal Ijazah -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="noIjazah" class="form-label">Nomor Ijazah</label>
                                    <input type="text" class="form-control" id="noIjazah" name="noIjazah">
                                </div>
                                <div class="col">
                                    <label for="tglIjazah" class="form-label">Tanggal Ijazah</label>
                                    <input type="date" class="form-control" id="tglIjazah" name="tglIjazah">
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Nilai UAN, Jumlah Mapel UAN -->
                        <div class="mx-5 mt-3 mb-5 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="nilaiUan" class="form-label">Jumlah Nilai UAN</label>
                                    <input type="number" class="form-control" id="nilaiUan" name="nilaiUan" required>
                                </div>
                                <div class="col">
                                    <label for="mapelUan" class="form-label">Jumlah Mata Pelajaran UAN</label>
                                    <input type="number" class="form-control" id="mapelUan" name="mapelUan" required>
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
                                    <input type="text" class="form-control" id="namaAyah" name="namaAyah" required>
                                    <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                                </div>
                                <div class="col">
                                    <label for="tlAyah" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tlAyah" name="tlAyah" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Agama, Pendidikan Terakhir -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="agamaAyah" class="form-label">Agama</label>
                                    <select class="form-select" id="agamaAyah" name="agamaAyah" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pendidikanTerakhirAyah" class="form-label">Pendidikan Terakhir</label>
                                    <select class="form-select" id="pendidikanTerakhirAyah" name="pendidikanTerakhirAyah" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="S1">Sarjana</option> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pekerjaan, Penghasilan -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                                    <select class="form-select" id="pekerjaanAyah" name="pekerjaanAyah" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="berkebun">Berkebun</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="penghasilanAyah" class="form-label">Rentang Penghasilan</label>
                                    <select class="form-select" id="penghasilanAyah" name="penghasilanAyah" aria-label="Default select example" required>
                                        <option selected hidden></option> 
                                        <option value=">= 10.000.000">Lebih atau Samadengan 10.000.000</option> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat, Status -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="alamatAyah" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamatAyah" name="alamatAyah" required>
                                </div>
                                <div class="col">
                                    <label for="statusAyah" class="form-label">Status</label>
                                    <select class="form-select" id="statusAyah" name="statusAyah" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option val="Masih Hidup">Masih Hidup</option>
                                        <option val="Meninggal">Meninggal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- No. Handphone -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="noAyah" class="form-label">Nomor Handphone Aktif</label>
                                    <input type="text" class="form-control" id="noAyah" name="noAyah" required>
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
                                    <input type="text" class="form-control" id="namaIbu" name="namaIbu" required>
                                    <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                                </div>
                                <div class="col">
                                    <label for="tlIbu" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tlIbu" name="tlIbu" required>
                                </div>
                            </div>
                        </div>

                        <!-- Agama, Pendidikan Terakhir -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="agamaIbu" class="form-label">Agama</label>
                                    <select class="form-select" id="agamaIbu" name="agamaIbu" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pendidikanTerakhirIbu" class="form-label">Pendidikan Terakhir</label>
                                    <select class="form-select" id="pendidikanTerakhirIbu" name="pendidikanTerakhirIbu" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="D3">Diploma 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pekerjaan, Penghasilan -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                                    <select class="form-select" id="pekerjaanIbu" name="pekerjaanIbu" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value="wirausaha">Wirausaha</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="penghasilanIbu" class="form-label">Rentang Penghasilan</label>
                                    <select class="form-select" id="penghasilanIbu" name="penghasilanIbu" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option value=">= 10.000.000">Lebih atau Samadengan 10.000.000</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat, Status -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="alamatIbu" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamatIbu" name="alamatIbu" required>
                                </div>
                                <div class="col">
                                    <label for="statusIbu" class="form-label">Status</label>
                                    <select class="form-select" id="statusIbu" name="statusIbu" aria-label="Default select example" required>
                                        <option selected hidden></option>
                                        <option val="Masih Hidup">Masih Hidup</option>
                                        <option val="Meninggal">Meninggal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- No. Handphone -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="noIbu" class="form-label">Nomor Handphone Aktif</label>
                                    <input type="text" class="form-control" id="noIbu" name="noIbu" required>
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
                                    <input type="text" class="form-control" id="namaWali" name="namaWali">
                                    <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                                </div>
                                <div class="col">
                                    <label for="tlWali" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tlWali" name="tlWali">
                                </div>
                            </div>
                        </div>

                        <!-- Agama, Pendidikan Terakhir -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="agamaWali" class="form-label">Agama</label>
                                    <select class="form-select" id="agamaWali" name="agamaWali" aria-label="Default select example">
                                        <option selected hidden></option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="pendidikanTerakhirWali" class="form-label">Pendidikan Terakhir</label>
                                    <select class="form-select" id="pendidikanTerakhirWali" name="pendidikanTerakhirWali" aria-label="Default select example">
                                        <option selected hidden></option> 
                                        <option value="S2">Magister</option> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pekerjaan, Penghasilan -->
                        <div class="mx-5 my-3 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                                    <select class="form-select" id="pekerjaanWali" name="pekerjaanWali" aria-label="Default select example">
                                        <option selected hidden></option>
                                        <option value="PNS">PNS</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="penghasilanWali" class="form-label">Rentang Penghasilan</label>
                                    <select class="form-select" id="penghasilanWali" name="penghasilanWali" aria-label="Default select example">
                                        <option selected hidden></option>
                                        <option value="5.000.000>= penghasilan <7.000.000">5.000.000>= penghasilan <7.000.000</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat, Status -->
                        <div class="mx-5 mt-3 mb-5 text-start">
                            <div class="row">
                                <div class="col">
                                    <label for="alamatWali" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamatWali" name="namaWali">
                                </div>

                                <div class="col">
                                    <label for="noWali" class="form-label">Nomor Handphone Aktif</label>
                                    <input type="text" class="form-control" id="noWali" name="noWali">
                                </div>
                            </div>
                        </div>

                        <!-- END OF WALI -->

                        <!-- SUMBIT BUTTON -->
                        <div class="text-end mx-5">
                            <button type="submit" class="btn text-white" style="background-color: #049DD9; width: 24rem;"><h6>Simpan Data</h6></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var kota_kabupaten = document.getElementById('kota_kabupaten');
        var kecamatan = document.getElementById('kecamatan');

        // Ketika dropdown Provinsi berubah
        document.getElementById('provinsi').addEventListener('change', function () {
            var selectedProvinceId = this.value;

            // Menyembunyikan semua opsi Kota/Kabupaten
            Array.from(kota_kabupaten.options).forEach(function(option) {
                if (option.value === '' || option.getAttribute('data-province-id') === selectedProvinceId) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });

            // Mereset dropdown Kota/Kabupaten dan Kecamatan
            kota_kabupaten.selectedIndex = 0;
            Array.from(kecamatan.options).forEach(function(option) {
                option.style.display = 'none';
            });
        });

        // Ketika dropdown Kota/Kabupaten berubah
        document.getElementById('kota_kabupaten').addEventListener('change', function () {
            var selectedRegencyId = this.value;

            // Menyembunyikan semua opsi Kecamatan
            Array.from(kecamatan.options).forEach(function(option) {
                if (option.value === '' || option.getAttribute('data-regency-id') === selectedRegencyId) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });

            // Mereset dropdown Kecamatan
            kecamatan.selectedIndex = 0;
        });
    });
</script>

<script>
    // Ambil elemen dropdown Provinsi dan Kota/Kabupaten
    const provinsiSelect = document.getElementById('provSekolah');
    const kotaSelect = document.getElementById('kotaSekolah');
    
    // Simpan semua opsi Kota/Kabupaten untuk referensi
    const allKabupatenOptions = Array.from(kotaSelect.options);
    
    // Ketika dropdown Provinsi berubah
    provinsiSelect.addEventListener('change', function() {
        const selectedProvinceId = this.value; // Ambil nilai id Provinsi yang dipilih
        
        // Kosongkan opsi Kota/Kabupaten
        kotaSelect.innerHTML = '<option selected hidden></option>';
        
        // Tambahkan kembali opsi Kota/Kabupaten yang sesuai dengan Provinsi yang dipilih
        allKabupatenOptions.forEach(option => {
            // Tambahkan opsi jika data-province-id-nya sama dengan id Provinsi yang dipilih
            if (option.getAttribute('data-province-id') === selectedProvinceId) {
                kotaSelect.appendChild(option.cloneNode(true));
            }
        });
    });
</script>




@endsection