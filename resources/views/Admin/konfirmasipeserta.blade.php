@extends('Template.admin')

@section('content-below')
<div class="text-secondary text-start my-3">
    <a href="{{ route('manajemenpmb-admin') }}" class="btn">
        <h6><i class="bi bi-chevron-left"></i> Manajemen PMB</h6>
    </a>
</div>

<!-- CARD -->
<div class="card">
  <div class="card-header">
    Konfirmasi Peserta PMB Bebas Testing
  </div>
  <div class="card-body">
    <div id="passwordHelpBlock" class="form-text">Unduh data pendaftar yang sudah diverifikasi</div>
    <button class="btn btn-success mb-3"><i class="bi bi-file-earmark-spreadsheet me-2"></i>Unduh Data Pendaftar</button>
    <table class="table table-striped align-middle">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th colspan="2">Nama Peserta</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td colspan="2">Missyolin Eunike Rungguni Samosir</td>
            <td><span class="badge text-bg-success">Terverifikasi</span></td>
            <td><button data-bs-target="#detailPeserta" data-bs-toggle="modal" class="btn btn-primary">View Detail</button></td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td colspan="2">Missyolin Eunike Rungguni Samosir</td>
            <td><span class="badge text-bg-warning">Belum Terverifikasi</span></td>
            <td><button class="btn btn-primary">View Detail</button></td>
            </tr>
        </tbody>
    </table>
  </div>
</div>

<!-- MODAL DATA PENDAFTAR -->
<div class="modal fade" id="detailPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Missyolin Eunike Rungguni Samosir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
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
                                <input disabled type="text" class="form-control" id="namaLengkap" name="namaLlengkap">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="nik" class="form-label">NIK</label>
                                <input disabled type="text" class="form-control" id="nik" name="nik">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat & Keterangan  Tinggal -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <input disabled type="text" class="form-control" id="alamat" name="alamat">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="keterangan" class="form-label">Keterangan Tempat Tinggal</label>
                                <input disabled type="text" class="form-control" id="keterangan" name="keterangan" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Provinsi, Kota, Kecamatan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input disabled type="text" class="form-control" id="provinsi" name="provinsi" disabled>
                            </div>
                            <div class="col">
                                <label for="kota" class="form-label">Kota</label>
                                <input disabled type="text" class="form-control" id="kota" name="kota" disabled>
                            </div>
                            <div class="col">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input disabled type="text" class="form-control" id="kecamatan" name="kecamatan" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Kabupaten, Kelurahan, Kode Pos -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <input disabled type="text" class="form-control" id="kabupaten" name="kabupaten" disabled>
                            </div>
                            <div class="col">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input disabled type="text" class="form-control" id="kelurahan" name="kelurahan" disabled>
                            </div>
                            <div class="col">
                                <label for="kodePos" class="form-label">Kode Pos</label>
                                <input disabled type="text" class="form-control" id="kodePos" name="kodePos">
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Handphone, Email -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noHp" class="form-label">Nomor Handphone</label>
                                <input disabled type="text" class="form-control" id="noHp" name="noHp">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input disabled type="email" class="form-control" id="email" name="email" disabled readonly value="">
                            </div>
                        </div>
                    </div>

                    <!-- Tempat Lahir, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <input disabled type="text" class="form-control" id="tempatLahir" name="tempatLahir">
                            </div>
                            <div class="col">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                            </div>
                        </div>
                    </div>

                    <!-- Kewarganegaraan, Status Sipil -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <input disabled type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" disabled>
                            </div>
                            <div class="col">
                                <label for="statusSipil" class="form-label">Status Sipil</label>
                                <input disabled type="text" class="form-control" id="statusSipil" name="statusSipil" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Gereja -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agama" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agama" name="agama" disabled>
                            </div>
                            <div class="col">
                                <label for="gereja" class="form-label">Gereja</label>
                                <input disabled type="text" class="form-control" id="gereja" name="gereja" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Data Saudara Kandung di UHN -->
                     <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="npm1" class="form-label">NPM - 1</label>
                                <input disabled type="text" class="form-control" id="npm1" name="npm1">
                            </div>
                            <div class="col">
                                <label for="npm2" class="form-label">NPM - 2</label>
                                <input disabled type="email" class="form-control" id="npm2" name="npm2">
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
                                <input disabled type="text" class="form-control" id="fakultas" name="fakultas" disabled>
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
                                <input disabled type="text" class="form-control" id="prodi1" name="prodi1" disabled>
                            </div>
                            <div class="col">
                                <label for="prodi2" class="form-label">Program Studi - 2</label>
                                <input disabled type="text" class="form-control" id="prodi2" name="prodi2" disabled>
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
                                <input disabled type="text" class="form-control" id="provSekolah" name="provSekolah" disabled>
                            </div>
                            <div class="col">
                                <label for="kotaSekolah" class="form-label">Kota</label>
                                <input disabled type="text" class="form-control" id="kotaSekolah" name="kotaSekolah" disabled>
                            </div>
                            <div class="col">
                                <label for="kabSekolah" class="form-label">Kabupaten</label>
                                <input disabled type="text" class="form-control" id="kabSekolah" name="kabSekolah" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Asal SMA/SMK/MA -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="asalSekolah" class="form-label">Asal SMA/SMK/MA</label>
                                <input disabled type="text" class="form-control" id="asalSekolah" name="asalSekolah" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Jurusan, Tahun Lulus -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input disabled type="text" class="form-control" id="jurusan" name="jurusan" disabled>
                            </div>
                            <div class="col">
                                <label for="tahunLulus" class="form-label">Tahun Lulus</label>
                                <input disabled type="text" class="form-control" id="tahunLulus" name="tahunLulus" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Ijazah, Tanggal Ijazah -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noIjazah" class="form-label">Nomor Ijazah</label>
                                <input disabled type="text" class="form-control" id="noIjazah" name="noIjazah">
                            </div>
                            <div class="col">
                                <label for="tglIjazah" class="form-label">Tanggal Ijazah</label>
                                <input disabled type="date" class="form-control" id="tglIjazah" name="tglIjazah">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Nilai UAN, Jumlah Mapel UAN -->
                    <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="nilaiUan" class="form-label">Jumlah Nilai UAN</label>
                                <input disabled type="text" class="form-control" id="nilaiUan" name="nilaiUan">
                            </div>
                            <div class="col">
                                <label for="mapelUan" class="form-label">Jumlah Mata Pelajaran UAN</label>
                                <input disabled type="text" class="form-control" id="mapelUan" name="mapelUan">
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
                                <input disabled type="text" class="form-control" id="namaAyah" name="namaAyah">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlAyah" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlAyah" name="tlAyah">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaAyah" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaAyah" name="agamaAyah" disabled>
                            </div>
                            <div class="col">
                                <label for="pendidikanAyah" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanAyah" name="pendidikanAyah" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" disabled>
                            </div>
                            <div class="col">
                                <label for="penghasilanAyah" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanAyah" name="penghasilanAyah" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatAyah" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatAyah" name="namaAyah">
                            </div>
                            <div class="col">
                                <label for="statusAyah" class="form-label">Status</label>
                                <input disabled type="text" class="form-control" id="statusAyah" name="statusAyah" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- No. Handphone -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noAyah" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noAyah" name="noAyah">
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
                                <input disabled type="text" class="form-control" id="namaIbu" name="namaIbu">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlIbu" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlIbu" name="tlIbu">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaIbu" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaIbu" name="agamaIbu" disabled>
                            </div>
                            <div class="col">
                                <label for="pendidikanIbu" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanIbu" name="pendidikanIbu" disabled>

                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" disabled>
                            </div>
                            <div class="col">
                                <label for="penghasilanIbu" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanIbu" name="penghasilanIbu" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatIbu" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatIbu" name="namaIbu">
                            </div>
                            <div class="col">
                                <label for="statusIbu" class="form-label">Status</label>
                                <input disabled type="text" class="form-control" id="statusIbu" name="statusIbu" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- No. Handphone -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noIbu" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noIbu" name="noIbu">
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
                                <input disabled type="text" class="form-control" id="namaWali" name="namaWali">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlWali" class="form-label">Tanggal Lahir</label>
                                <input disabled type="date" class="form-control" id="tlWali" name="tlWali">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agamaWali" class="form-label">Agama</label>
                                <input disabled type="text" class="form-control" id="agamaWali" name="agamaWali" disabled>
                            </div>
                            <div class="col">
                                <label for="pendidikanWali" class="form-label">Pendidikan Terakhir</label>
                                <input disabled type="text" class="form-control" id="pendidikanWali" name="pendidikanWali" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                                <input disabled type="text" class="form-control" id="pekerjaanWali" name="pekerjaanWali" disabled>
                            </div>
                            <div class="col">
                                <label for="penghasilanWali" class="form-label">Rentang Penghasilan</label>
                                <input disabled type="text" class="form-control" id="penghasilanWali" name="penghasilanWali" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatWali" class="form-label">Alamat</label>
                                <input disabled type="text" class="form-control" id="alamatWali" name="namaWali">
                            </div>

                            <div class="col">
                                <label for="noWali" class="form-label">Nomor Handphone Aktif</label>
                                <input disabled type="text" class="form-control" id="noWali" name="noWali">
                            </div>
                        </div>
                    </div>

                    <!-- END OF WALI -->
                </div>
            </div>
        
    
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success">Verifikasi</button>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
