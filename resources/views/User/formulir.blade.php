@extends('Template.header')

@section('content-below')
<div class="text-secondary text-start my-3 mx-5">
    <a href="{{ route('dashboard') }}" class="btn"><h6><i class="bi bi-chevron-left"></i> Dashboard</h6><a>
</div>

<div class="text-secondary text-center my-3">
    <h4>Detail Ujian PMB Bebas Testing</h4>
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
        <td scope="row">5 Februari 2024 - 8 Juni 2024</td>
        <td>-</td>
        <td>5 Februari 2024 - 8 Juni 2024</td>
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
        <td scope="row">Bebas Testing</td>
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
    <div class="card-body">
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
                    <h3><div class="fw-semibold" id="dataPribadi">
                        <div class=" btn btn-sm text-white fw-semibold rounded-pill" style="width: 2rem; height:2rem; background-color:#049DD9;">1</div>
                        Data Pribadi
                    </div></h3>
                    <!-- Nama Lengkap & NIK -->
                    <div class="mx-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="namaLengkap" name="namaLlengkap">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat & Keterangan  Tinggal -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="keterangan" class="form-label">Keterangan Tempat Tinggal</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="keterangan" class="form-label">Kota</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="keterangan" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Kabupaten, Kelurahan, Kode Pos -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kodePos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kodePos" name="kodePos">
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Handphone, Email -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="noHp" class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" id="noHp" name="noHp">
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" disabled readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Tempat Lahir, Tanggal Lahir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
                            </div>
                            <div class="col">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                            </div>
                        </div>
                    </div>

                    <!-- Kewarganegaraan, Status Sipil -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="statusSipil" class="form-label">Status Sipil</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <select class="form-select" aria-label="Default select example">
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Saudara Kandung di UHN -->
                     <p class="mx-5">*Silahkan isi data berikut bila memiliki saudara kandung yang sedang berkuliah di Universitas HKBP Nommensen</p>

                     <div class="mx-5 mt-3 mb-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="npm1" class="form-label">NPM - 1</label>
                                <input type="text" class="form-control" id="npm1" name="npm1">
                            </div>
                            <div class="col">
                                <label for="npm2" class="form-label">NPM - 2</label>
                                <input type="email" class="form-control" id="npm2" name="npm2">
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
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
                                <label for="kewarganegaraan" class="form-label">Program Studi - 1</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="statusSipil" class="form-label">Program Studi - 2</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kotaSekolah" class="form-label">Kota</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kabSekolah" class="form-label">Kabupaten</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Asal SMA/SMK/MA -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="asalSekolah" class="form-label">Asal SMA/SMK/MA</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Jurusan, Tahun Lulus -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                    <option val="IPA">IPA</option>
                                    <option val="IPS">IPS</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="statusSipil" class="form-label">Tahun Lulus</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
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
                                <input type="text" class="form-control" id="nilaiUan" name="nilaiUan">
                            </div>
                            <div class="col">
                                <label for="mapelUan" class="form-label">Jumlah Mata Pelajaran UAN</label>
                                <input type="text" class="form-control" id="mapelUan" name="mapelUan">
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
                                <input type="text" class="form-control" id="namaAyah" name="namaAyah">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlAyah" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tlAyah" name="tlAyah">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <label for="pendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanAyah" class="form-label">Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="penghasilanAyah" class="form-label">Rentang Penghasilan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatAyah" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamatAyah" name="namaAyah">
                            </div>
                            <div class="col">
                                <label for="statusAyah" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <input type="text" class="form-control" id="noAyah" name="noAyah">
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
                                <input type="text" class="form-control" id="namaIbu" name="namaIbu">
                                <div id="passwordHelpBlock" class="form-text">Sesuai dengan KTP</div>
                            </div>
                            <div class="col">
                                <label for="tlIbu" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tlIbu" name="tlIbu">
                            </div>
                        </div>
                    </div>

                    <!-- Agama, Pendidikan Terakhir -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <label for="pendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanIbu" class="form-label">Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="penghasilanIbu" class="form-label">Rentang Penghasilan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat, Status -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="alamatIbu" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamatIbu" name="namaIbu">
                            </div>
                            <div class="col">
                                <label for="statusIbu" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <input type="text" class="form-control" id="noIbu" name="noIbu">
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
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example">
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
                                <label for="pendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan, Penghasilan -->
                    <div class="mx-5 my-3 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="penghasilanWali" class="form-label">Rentang Penghasilan</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected hidden></option>
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
                        <a href="{{ route('konfirmasi-formulir') }}"><button type="button" class="btn text-white" style="background-color: #049DD9; width: 24rem;"><h6>Simpan Data</h6></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection