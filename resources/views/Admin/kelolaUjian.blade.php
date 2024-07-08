@extends('Template.admin')
@section('content-below')

<!-- UJIAN PMB -->
<div class="card">
    <div class="card-header fw-bold">
        <h4>Ujian Penerimaan Mahasiswa Baru</h4>
    </div>
    <div class="card-body">
        
        <!-- ACCORDION UJIAN PMB -->
        <div class="accordion accordion-flush my-3" id="accordionUjian">
            @foreach($tahun_ajaran as $tahun)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tahun-{{$tahun->id_tahun_ajaran}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            Daftar Ujian PMB Tahun Ajaran {{$tahun->tahun_mulai}}/{{$tahun->tahun_selesai}}
                        </button>
                    </h2>
                    <div id="tahun-{{$tahun->id_tahun_ajaran}}" class="accordion-collapse collapse" data-bs-parent="#accordionUjian">
                        <button data-bs-target="#tambahUjian-{{$tahun->id_tahun_ajaran}}" data-bs-toggle="modal" class="btn btn-success my-2 mx-3">Tambah Ujian untuk T. A {{$tahun->tahun_mulai}}/{{$tahun->tahun_selesai}}</button>
                        <div class="accordion-body">
                            @if($tahun->jenisUjian->isEmpty())
                                <p>Tidak ada ujian untuk tahun ajaran ini.</p>
                            @else

                                @php
                                    $counter = 1;
                                @endphp
                                
                                @foreach($tahun->jenisUjian as $ujian)
                                    <li class="list-group-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ujian-{{$ujian->id_jenis_ujian}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{ $counter++ }}. {{$ujian->nama_ujian}} - {{$ujian->gelombang_ujian}}

                                            @if($ujian->flag_is_ujian_opened)
                                                <span class="badge text-bg-primary ms-2">Dibuka</span>
                                            @else
                                                <span class="badge text-bg-secondary ms-2">Ditutup</span>
                                            @endif

                                            @if($ujian->flag_is_ujian_hidden)
                                                <span class="badge bg-warning ms-2">Disembunyikan</span>
                                            @else
                                                <span class="badge bg-info ms-2">Ditampilkan</span>
                                            @endif

                                            @if($ujian->jumlah_belum_verifikasi > 0)
                                            <span class="badge bg-danger ms-2">{{ $ujian->jumlah_belum_verifikasi }}</span>
                                            @endif
                                        </button>
                                        
                                        <!-- BODY -->
                                        <div id="ujian-{{$ujian->id_jenis_ujian}}" class="accordion-collapse collapse" data-bs-parent="#tahun-{{$tahun->id_tahun_ajaran}}">
                                            <div class="card my-2">
                                                <div class="accordion-body">
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <h6 class="text-secondary">Periode Awal Pendaftaran</h6>
                                                                    <h6>{{ $ujian->tanggal_buka_pendaftaran_formatted }}</h6>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <h6 class="text-secondary">Periode Akhir Pendaftaran</h6>
                                                                    <h6>{{ $ujian->tanggal_tutup_pendaftaran_formatted }}</h6>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <h6 class="text-secondary">Jenis Ujian</h6>
                                                                    <h6>{{ $ujian->jenis_ujian }}</h6>
                                                                </div>
                                                            </div>

                                                            <div class="row my-2">
                                                                <div class="col text-center">
                                                                    <h6 class="text-secondary">Metode Ujian</h6>
                                                                    <h6>{{ $ujian->metode_ujian }}</h6>
                                                                </div>
                                                                <div class="col"></div>
                                                                <div class="col"></div>
                                                            </div>
        
                                                            <div class="row my-3">
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#editUjian-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn btn-warning">Edit Ujian</button>
                                                                </div>
                                                                @if($ujian->flag_is_ujian_opened)
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#tutupUjian-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn btn-secondary">Tutup Pendaftaran</button>
                                                                </div>
                                                                @else
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#bukaUjian-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn btn-primary">Buka Pendaftaran</button>
                                                                </div>
                                                                @endif
                                                                <div class="col text-center">
                                                                    <a href="{{route('konfirmasi-admin', ['id' => $ujian->id_jenis_ujian])}}" class="btn btn-success">Konfirmasi Peserta<span class="badge bg-danger ms-2">{{ $ujian->jumlah_belum_verifikasi }}</span></a>
                                                                </div>
                                                            </div>
        
                                                            <div class="row mb-3">
                                                                @if($ujian->flag_is_ujian_opened == 0)
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#ujianView-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn text-black bg-info-subtle">Tampilkan Ujian</button>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#ujianHidden-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn text-black bg-warning-subtle">Sembunyikan Ujian</button>
                                                                </div>
                                                                @endif
                                                                <div class="col text-center">
                                                                    <button data-bs-target="#hapusUjian-{{$ujian->id_jenis_ujian}}" data-bs-toggle="modal" class="btn btn-danger">Hapus Ujian</button>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- MODAL EDIT UJIAN -->
                                        <div class="modal modal-lg fade" id="editUjian-{{$ujian->id_jenis_ujian}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('update-ujian', $ujian->id_jenis_ujian)}}" method="post" class="needs-validation">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mx-5 text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="namaUjian" class="form-label">Nama Ujian</label>
                                                                        <input type="text" class="form-control" id="namaUjian" name="namaUjian" value="{{$ujian->nama_ujian}}">
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="gelombangUjian" class="form-label">Gelombang Ujian</label>
                                                                        <input type="text" class="form-control" id="gelombangUjian" name="gelombangUjian" value="{{$ujian->gelombang_ujian}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mx-5 my-3 text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="periodeAwal" class="form-label">Periode Awal Pendaftaran</label>
                                                                        <input type="date" class="form-control" id="periodeAwal" name="periodeAwal" value="{{ \Carbon\Carbon::parse($ujian->tanggal_buka_pendaftaran)->format('Y-m-d') }}" required>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="periodeAkhir" class="form-label">Periode Akhir Pendaftaran</label>
                                                                        <input type="date" class="form-control" id="periodeAkhir" name="periodeAkhir" value="{{ \Carbon\Carbon::parse($ujian->tanggal_tutup_pendaftaran)->format('Y-m-d') }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mx-5 my-3 text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="tanggalPengumuman" class="form-label">Tanggal Pengumuman</label>
                                                                        <input type="text" class="form-control" id="tanggalPengumuman" name="tanggalPengumuman" value="{{$ujian->waktu_pengumuman}}" required>
                                                                        <div id="passwordHelpBlock" class="form-text">Contoh: Realtime</div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="jenisUjian" class="form-label">Jenis Ujian</label>
                                                                        <select id="jenisUjian" name="jenisUjian" class="form-select" aria-label="Default select example" required>
                                                                            <option selected hidden>Pilih Jenis Ujian</option>
                                                                            <option value="Non-Kedokteran" {{ $ujian->jenis_ujian == 'Non-Kedokteran' ? 'selected' : '' }}>Non-Kedokteran</option>
                                                                            <option value="Kedokteran" {{ $ujian->jenis_ujian == 'Kedokteran' ? 'selected' : '' }}>Kedokteran</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mx-5 my-3 text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="metodeUjianEdit" class="form-label">Metode Ujian</label>
                                                                        <select id="metodeUjianEdit" name="metodeUjianEdit" class="form-select" aria-label="Default select example" required>
                                                                            <option selected hidden></option>
                                                                            <option value="Bebas Testing" {{ $ujian->metode_ujian == 'Bebas Testing' ? 'selected' : '' }}>Bebas Testing</option>
                                                                            <option value="Testing" {{ $ujian->metode_ujian == 'Testing' ? 'selected' : '' }}>Testing</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <label for="biayaUjianEdit" class="form-label">Biaya Ujian</label>
                                                                        <input id="biayaUjianEdit" name="biayaUjianEdit" class="form-control" type="number" value="{{$ujian->biaya_ujian}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF MODAL EDIT UJIAN -->

                                        <!-- MODAL BUKA UJIAN -->
                                        <div class="modal fade" id="bukaUjian-{{$ujian->id_jenis_ujian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-door-open-fill text-primary"></i></h1>
                                                        <h5>Yakin membuka pendaftaran untuk ujian {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}} ?</h5>
                                                        <p class="text-muted small">pastikan anda membuka pendaftaran sesuai dengan periode awal pendaftaran
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                            
                                                        
                                                        <form id="delete-form" action="{{route('buka-ujian', $ujian->id_jenis_ujian)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF BUKA UJIAN -->

                                        <!-- MODAL TAMPILKAN UJIAN -->
                                        <div class="modal fade" id="ujianView-{{$ujian->id_jenis_ujian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-eye text-primary"></i></h1>
                                                        <h5>Yakin menampilkan ujian {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}} ?</h5>
                                                        <p class="text-muted small">Ujian akan tampil dan dapat dilihat oleh user di halaman PMB
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                            
                                                        
                                                        <form id="delete-form" action="{{route('tampilkan-ujian', $ujian->id_jenis_ujian)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF TAMPILKAN UJIAN -->

                                        <!-- MODAL SEMBUNYIKAN UJIAN -->
                                        <div class="modal fade" id="ujianHidden-{{$ujian->id_jenis_ujian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-eye-slash text-primary"></i></h1>
                                                        <h5>Yakin menampilkan ujian {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}} ?</h5>
                                                        <p class="text-muted small">Ujian akan tampil dan dapat dilihat oleh user di halaman PMB
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                            
                                                        
                                                        <form id="delete-form" action="{{route('sembunyikan-ujian', $ujian->id_jenis_ujian)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF TAMPILKAN UJIAN -->

                                        <!-- MODAL TUTUP UJIAN -->
                                        <div class="modal fade" id="tutupUjian-{{$ujian->id_jenis_ujian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-door-closed-fill text-secondary"></i></i></i></h1>
                                                        <h5>Yakin untuk menutup pendaftaran ujian {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}} ?</h5>
                                                        <p class="text-muted small">pastikan anda menutup pendaftaran sesuai dengan periode akhir pendaftaran
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>
                                                        
                                                        <form id="delete-form" action="{{route('tutup-ujian', $ujian->id_jenis_ujian)}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary">Yakin</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF TUTUP UJIAN -->

                                        <!-- MODAL DELETE UJIAN -->
                                        <div class="modal fade" id="hapusUjian-{{$ujian->id_jenis_ujian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h1><i class="bi bi-trash3 text-danger"></i></h1>
                                                        <h5>Yakin untuk menghapus ujian {{$ujian->nama_ujian}}-{{$ujian->gelombang_ujian}} ?</h5>
                                                        <p class="text-muted small">proses ini tidak dapat diurungkan bila
                                                            anda sudah menekan tombol 'Yakin'
                                                        </p>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batalkan</button>

                                                        <form id="delete-form" action="{{route('hapus-ujian', $ujian->id_jenis_ujian)}}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" id="confirmDeleteBtn" class="btn btn-primary">Yakin</a>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF DELETE UJIAN -->
                                    </li>
                                @endforeach
                                
                            @endif
                        </div>
                        <!-- MODAL TAMBAH UJIAN -->
                        <div class="modal modal-lg fade" id="tambahUjian-{{$tahun->id_tahun_ajaran}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ujian untuk T.A {{$tahun->tahun_mulai}}/{{$tahun->tahun_selesai}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('add-ujian') }}" method="post" class="needs-validation">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" id="tahunAjaran" name="tahunAjaran" value="{{ $tahun->id_tahun_ajaran }}">
                                            <div class="mx-5 text-start">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="namaUjian" class="form-label">Nama Ujian</label>
                                                        <input type="text" class="form-control" id="namaUjian" name="namaUjian" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="gelombangUjian" class="form-label">Gelombang Ujian</label>
                                                        <input type="text" class="form-control" id="gelombangUjian" name="gelombangUjian" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mx-5 my-3 text-start">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="periodeAwal" class="form-label">Periode Awal Pendaftaran</label>
                                                        <input type="date" class="form-control" id="periodeAwal" name="periodeAwal" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="periodeAkhir" class="form-label">Periode Akhir Pendaftaran</label>
                                                        <input type="date" class="form-control" id="periodeAkhir" name="periodeAkhir" required>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="mx-5 my-3 text-start">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="tanggalPengumuman" class="form-label">Tanggal Pengumuman</label>
                                                        <input type="text" class="form-control" id="tanggalPengumuman" name="tanggalPengumuman" required>
                                                        <div id="passwordHelpBlock" class="form-text">Contoh: Realtime</div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="jenisUjian" class="form-label">Jenis Ujian</label>
                                                        <select id="jenisUjian" name="jenisUjian" class="form-select" aria-label="Default select example" required>
                                                            <option selected hidden>Pilih Jenis Ujian</option>
                                                            <option value="Non-Kedokteran">Non-Kedokteran</option>
                                                            <option value="Kedokteran">Kedokteran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mx-5 my-3 text-start">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="metodeUjianTambah" class="form-label">Metode Ujian</label>
                                                        <select id="metodeUjianTambah" name="metodeUjianTambah" class="form-select" aria-label="Default select example" required>
                                                            <option selected hidden></option>
                                                            <option value="Bebas Testing">Bebas Testing</option>
                                                            <option value="Testing">Testing</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="biayaUjian" class="form-label">Biaya Ujian</label>
                                                        <input id="biayaUjian" name="biayaUjian" class="form-control" type="number" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL TAMBAH UJIAN -->
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<!-- END OF UJIAN PMB -->


<!-- TOAST -->
<div class="toast-container position-fixed top-0 end-0 p-3 m-2">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
      Tahun ajaran baru berhasil ditambahkan
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const metodeUjian = document.getElementById('metodeUjianTambah');
    const biayaUjian = document.getElementById('biayaUjian');
    const formulir = document.getElementById('formulir');

    // Handler untuk perubahan pilihan metode ujian
    metodeUjian.addEventListener('change', function () {
        if (metodeUjian.value === 'Bebas Testing') {
            biayaUjian.value = 0; // Atur nilai 0 untuk biaya ujian
        } else {
            biayaUjian.value = ''; // Kosongkan nilai biaya ujian
        }
    });

    // Handler untuk submit formulir
    formulir.addEventListener('submit', function (event) {
        // Aktifkan kembali input biaya ujian sebelum formulir disubmit
        biayaUjian.disabled = false;
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toastLiveExample = document.getElementById('liveToast');

        if (toastLiveExample) {
            const toast = new bootstrap.Toast(toastLiveExample);

            // Cek apakah ada pesan sukses dari redirect
            let successMessage = '{{ session("success") }}';
            let errorMessage = '{{ $errors->first() }}'; // Menangkap pesan kesalahan pertama

            if (successMessage) {
                toastLiveExample.classList.add('bg-success'); // Tambahkan kelas bg-success
                toastLiveExample.classList.add('text-white'); // Tambahkan kelas bg-success
                toastLiveExample.querySelector('.toast-body').innerText = successMessage;
                toast.show(); // Tampilkan toast jika ada pesan sukses
            } else if (errorMessage) {
                toastLiveExample.classList.add('bg-danger'); // Tambahkan kelas bg-danger
                toastLiveExample.classList.add('text-white'); // Tambahkan kelas bg-danger
                toastLiveExample.querySelector('.toast-body').innerText = errorMessage;
                toast.show(); // Tampilkan toast jika ada pesan kesalahan
            }
        }
    });
</script>

@endsection