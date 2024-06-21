@extends('Template.admin')
@section('content-below')

<!-- TAHUN AJARAN -->
<div class="card">
  <div class="card-header fw-bold">
    <h4>Tahun Ajaran</h4>
  </div>
  <div class="card-body">
    <button  type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" class="btn btn-success">Tambah Tahun Ajaran</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tahun Ajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-5 text-start">
                    <div class="row">
                        <div class="col">
                            <label for="tahunMulai" class="form-label">Tahun Mulai</label>
                            <input type="number" class="form-control" id="tahunMulai" name="tahunMulai">
                        </div>
                        <div class="col">
                            <label for="tahunBerakhir" class="form-label">Tahun Berakhir</label>
                            <input type="number" class="form-control" id="tahunBerakhir" name="tahunBerakhir">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Tambahkan</button>
            </div>
            </div>
        </div>
    </div>
    
    <!-- ACCORDION TAHUN AJARAN -->
    <div class="accordion accordion-flush my-3" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header d-flex justify-content-between align-items-center">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Daftar Ujian PMB Tahun Ajaran 2024/2025
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <button type="button" data-bs-target="#editModal" data-bs-toggle="modal" class="btn btn-warning mb-3">Edit Tahun ajaran</button>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">PMB Bebas Testing<span class="badge text-bg-primary ms-2">Dibuka</span></li>
                        <li class="list-group-item">PMB Reguler<span class="badge text-bg-secondary ms-2">Ditutup</span></li>
                        <li class="list-group-item">PMB Khusus Fakultas Kedokteran<span class="badge text-bg-secondary ms-2">Ditutup</span></li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- MODAL EDIT T.A -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tahun Ajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mx-5 text-start">
                        <div class="row">
                            <div class="col">
                                <label for="tahunMulai" class="form-label">Tahun Mulai</label>
                                <input type="number" class="form-control" id="tahunMulai" name="tahunMulai">
                            </div>
                            <div class="col">
                                <label for="tahunBerakhir" class="form-label">Tahun Berakhir</label>
                                <input type="number" class="form-control" id="tahunBerakhir" name="tahunBerakhir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Simpan Perubahan</button>
                </div>
                </div>
            </div>
        </div>
        <!-- END OF MODAL EDIT T.A -->
         
    </div>
  </div>
</div>
<!-- END OF TAHUN AJARAN -->

<!-- UJIAN PMB -->
<div class="card my-5">
    <div class="card-header fw-bold">
        <h4>Ujian Penerimaan Mahasiswa Baru</h4>
    </div>
    <div class="card-body">
        
        <!-- ACCORDION UJIAN PMB -->
        <div class="accordion accordion-flush my-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOnee" aria-expanded="false" aria-controls="flush-collapseOne">
                    Daftar Ujian PMB Tahun Ajaran 2024/2025
                </button>
                </h2>
                <div id="flush-collapseOnee" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <button data-bs-target="#tambahUjian" data-bs-toggle="modal" class="btn btn-success">Tambah Ujian untuk T. A 2024/2025</button>

                    <!-- DAFTAR UJIAN -->
                    <div class="accordion accordion-flush my-3" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneee" aria-expanded="false" aria-controls="flush-collapseOne">
                                PMB Bebas Testing      
                                <!-- STATUS -->
                                <span class="badge text-bg-primary ms-2">Dibuka</span>
                            </button>
                            </h2>
                            
                            <!-- BODY -->
                            <div id="flush-collapseOneee" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="col text-center">
                                                <h6 class="text-secondary">Periode Awal Pendaftaran</h6>
                                                <h6>5 Februari 2024</h6>
                                            </div>
                                            <div class="col text-center">
                                                <h6 class="text-secondary">Periode Akhir Pendaftaran</h6>
                                                <h6>8 Juni 2024</h6>
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

                                        <div class="row my-3">
                                            <div class="col text-center">
                                                <button data-bs-target="#editUjian" data-bs-toggle="modal" class="btn btn-warning">Edit Ujian</button>
                                            </div>
                                            <div class="col text-center">
                                                <button data-bs-target="#bukaUjian" data-bs-toggle="modal" class="btn btn-primary">Buka Pendaftaran</button>
                                            </div>
                                            <div class="col text-center">
                                                <button data-bs-target="#tutupUjian" data-bs-toggle="modal" class="btn btn-secondary">Tutup Pendaftaran</button>
                                            </div>
                                            <div class="col text-center">
                                                <a href="{{route('konfirmasi-admin')}}" class="btn btn-success">Konfirmasi Peserta<span class="ms-2 badge bg-danger text-white">4</span></a>
                                            </div>
                                            <div class="col text-center">
                                                <button data-bs-target="#hapusUjian" data-bs-toggle="modal" class="btn btn-danger">Hapus Ujian</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF UJIAN PMB -->

<!-- MODAL TAMBAH UJIAN -->
<div class="modal modal-lg fade" id="tambahUjian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ujian untuk T.A 2024/2025</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mx-5 text-start">
                <div class="row">
                    <div class="col">
                        <label for="namaUjian" class="form-label">Nama Ujian</label>
                        <input type="text" class="form-control" id="namaUjian" name="namaUjian">
                    </div>
                    <div class="col">
                        <label for="gelombangUjian" class="form-label">Gelombang Ujian</label>
                        <input type="text" class="form-control" id="gelombangUjian" name="gelombangUjian">
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="alamat" class="form-label">Jenis Ujian</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected hidden></option>
                            <option value="Non-Kedokteran">Non-Kedokteran</option>
                            <option value="Kedokteran">Kedokteran</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="keterangan" class="form-label">Metode Ujian</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected hidden></option>
                            <option value="Bebas Testing">Bebas Testing</option>
                            <option value="Testing">Testing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="periodeAwal" class="form-label">Periode Awal Pendaftaran</label>
                        <input type="date" class="form-control" id="periodeAwal" name="periodeAwal">
                    </div>
                    <div class="col">
                        <label for="periodeAkhir" class="form-label">Periode Akhir Pendaftaran</label>
                        <input type="date" class="form-control" id="periodeAkhir" name="periodeAkhir">
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="tanggalPengumuman" class="form-label">Tanggal Pengumuman</label>
                        <input type="text" class="form-control" id="tanggalPengumuman" name="tanggalPengumuman">
                        <div id="passwordHelpBlock" class="form-text">Mis: Realtime</div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success">Simpan Perubahan</button>
        </div>
        </div>
    </div>
</div>
<!-- END OF MODAL TAMBAH UJIAN -->

<!-- MODAL EDIT UJIAN -->
<div class="modal modal-lg fade" id="editUjian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit PMB Bebas Testing</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mx-5 text-start">
                <div class="row">
                    <div class="col">
                        <label for="namaUjian" class="form-label">Nama Ujian</label>
                        <input type="text" class="form-control" id="namaUjian" name="namaUjian">
                    </div>
                    <div class="col">
                        <label for="gelombangUjian" class="form-label">Gelombang Ujian</label>
                        <input type="text" class="form-control" id="gelombangUjian" name="gelombangUjian">
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="alamat" class="form-label">Jenis Ujian</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected hidden></option>
                            <option value="Non-Kedokteran">Non-Kedokteran</option>
                            <option value="Kedokteran">Kedokteran</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="keterangan" class="form-label">Metode Ujian</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected hidden></option>
                            <option value="Bebas Testing">Bebas Testing</option>
                            <option value="Testing">Testing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="periodeAwal" class="form-label">Periode Awal Pendaftaran</label>
                        <input type="date" class="form-control" id="periodeAwal" name="periodeAwal">
                    </div>
                    <div class="col">
                        <label for="periodeAkhir" class="form-label">Periode Akhir Pendaftaran</label>
                        <input type="date" class="form-control" id="periodeAkhir" name="periodeAkhir">
                    </div>
                </div>
            </div>

            <div class="mx-5 my-3 text-start">
                <div class="row">
                    <div class="col">
                        <label for="tanggalPengumuman" class="form-label">Tanggal Pengumuman</label>
                        <input type="text" class="form-control" id="tanggalPengumuman" name="tanggalPengumuman">
                        <div id="passwordHelpBlock" class="form-text">Mis: Realtime</div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success">Simpan Perubahan</button>
        </div>
        </div>
    </div>
</div>
<!-- END OF MODAL EDIT UJIAN -->

<!-- MODAL DELETE UJIAN -->
<div class="modal fade" id="hapusUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-trash3 text-danger"></i></h1>
                <h5>Yakin untuk menghapus ujian ini?</h5>
                <p class="text-muted small">proses ini tidak dapat diurungkan bila
                    anda sudah menekan tombol 'Yakin'
                </p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Batalkan</button>
                <a id="confirmDeleteBtn" class="btn btn-primary"
                    href="#"
                    onclick="#">Yakin</a>

                <form id="delete-form"
                    action="#"
                    method="POST" style="display: none;">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF DELETE UJIAN -->

<!-- MODAL BUKA UJIAN -->
<div class="modal fade" id="bukaUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-door-open-fill text-primary"></i></h1>
                <h5>Yakin untuk membuka pendaftaran untuk ujian ini?</h5>
                <p class="text-muted small">pastikan anda membuka pendaftaran sesuai dengan periode awal pendaftaran
                </p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Batalkan</button>
                <a id="confirmDeleteBtn" class="btn btn-primary"
                    href="#"
                    onclick="#">Yakin</a>

                <form id="delete-form"
                    action="#"
                    method="POST" style="display: none;">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF BUKA UJIAN -->

<!-- MODAL TUTUP UJIAN -->
<div class="modal fade" id="tutupUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <h1><i class="bi bi-door-closed-fill text-secondary"></i></i></i></h1>
                <h5>Yakin untuk menutup pendaftaran ini?</h5>
                <p class="text-muted small">pastikan anda menutup pendaftaran sesuai dengan periode akhir pendaftaran
                </p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Batalkan</button>
                <a id="confirmDeleteBtn" class="btn btn-primary"
                    href="#"
                    onclick="#">Yakin</a>

                <form id="delete-form"
                    action="#"
                    method="POST" style="display: none;">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF TUTUP UJIAN -->

@endsection