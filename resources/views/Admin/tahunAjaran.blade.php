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
                    <form action="{{ route('add-tahun-ajaran') }}" method="post" class="needs-validation">
                        @csrf
                        <div class="modal-body">
                            <div class="mx-5 text-start">
                                <div class="row">
                                    <div class="col">
                                        <label for="tahunMulai" class="form-label">Tahun Mulai</label>
                                        <input type="number" class="form-control" id="tahunMulai" name="tahunMulai">
                                    </div>
                                    <div class="col">
                                        <label for="tahunSelesai" class="form-label">Tahun Selesai</label>
                                        <input type="number" class="form-control" id="tahunSelesai" name="tahunSelesai">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="addTahun" type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- ACCORDION TAHUN AJARAN -->
        <div class="accordion accordion-flush my-3" id="accordionFlushExample">
            @foreach($tahun_ajaran as $item)
                <div class="accordion-item">
                    <h2 class="accordion-header d-flex justify-content-between align-items-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$item->id_tahun_ajaran}}" aria-expanded="false" aria-controls="flush-{{$item->id_tahun_ajaran}}">
                            Daftar Ujian PMB Tahun Ajaran {{$item->tahun_mulai}}/{{$item->tahun_selesai}}
                        </button>
                    </h2>
                    <div id="flush-{{$item->id_tahun_ajaran}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            @if($item->jenisUjian->isEmpty())
                                <p>Tidak ada ujian untuk tahun ajaran ini.</p>
                            @else
                                <ol class="list-group list-group-numbered">
                                    @foreach($item->jenisUjian as $ujian)
                                        <li class="list-group-item">
                                            {{$ujian->nama_ujian}} - Gelombang {{$ujian->gelombang_ujian}}

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
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<!-- END OF TAHUN AJARAN -->

<!-- TOAST -->
<div class="toast-container position-fixed top-0 end-0 p-3 m-2">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
      Tahun ajaran baru berhasil ditambahkan
    </div>
  </div>
</div>

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