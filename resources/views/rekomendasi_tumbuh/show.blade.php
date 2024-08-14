@extends('layout.master2')

@section('content')
    <div class="card border-0 border-4 mt-1">
        <div class="card-body p-3">
            <div class="card-title d-flex align-items-center justify-content-between">
                <h5 class="mb-0 text-dark">Hasil Rekomendasi Pertumbuhan (Tanggal : {{ $recommendation->created_at }})</h5>
                <a href="{{ route('rekomendasi-tumbuh.cetak', $recommendation->id) }}" target="_blank"
                    class="btn btn-primary btn-sm">Cetak</a>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card border-0 shadow-sm rounded-3 w-100">
                        <div class="card-body">
                            <h5 class="card-title text-secondary"><i class="fas fa-info-circle me-2"></i> Kondisi Tanaman
                                Cabai dan Lingkungan:</h5>
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-hourglass-start fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">Usia Cabai</h6>
                                            <p class="card-text small">{{ $recommendation->usiaCabai->usia }} /
                                                {{ $recommendation->usiaCabai->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-vial fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">pH Tanah</h6>
                                            <p class="card-text small">{{ $recommendation->phTanah->ph_level }} /
                                                {{ $recommendation->phTanah->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-cloud-sun fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">Kondisi Iklim</h6>
                                            <p class="card-text small">{{ $recommendation->kondisiIklim->kondisi }} /
                                                {{ $recommendation->kondisiIklim->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-leaf fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">Karakteristik Tanaman</h6>
                                            <img src="{{ url('/files/' . $recommendation->karakteristikTanaman->gambar) }}"
                                                alt="Karakteristik Tanaman" class="img-thumbnail rounded-3 mb-2"
                                                width="80" data-bs-toggle="modal" data-bs-target="#imageModal"
                                                data-bs-src="{{ url('/files/' . $recommendation->karakteristikTanaman->gambar) }}">
                                            <p class="card-text">{{ $recommendation->karakteristikTanaman->karakteristik }}
                                                / {{ $recommendation->karakteristikTanaman->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-leaf fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">Lokasi</h6>
                                            <p class="card-text">{{ $recommendation->petani->lokasi }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0">
                                        <div class="card-body text-center">
                                            <i class="fas fa-leaf fa-2x text-muted mb-2"></i>
                                            <h6 class="card-title">Luas</h6>
                                            <p class="card-text">{{ $recommendation->petani->luas }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card border-0 shadow-sm rounded-3 w-100">
                        <div class="card-body p-6">
                            <h5 class="card-title text-success">Rekomendasi Pemupukan <i class="fas fa-leaf ms-2"></i></h5>

                            <p class="card-text mb-1"><strong>Jenis dan Dosis Pupuk:</strong>
                                {{ $recommendation->rule->dosisPupuk->jenisPupuk->nama_pupuk }}
                                {{ $recommendation->rule->dosisPupuk->dosis }}
                                {{ $recommendation->rule->dosisPupuk->satuan }}</p>
                            <p class="card-text mb-1"><strong>Aplikasi Pemupukan :</strong>
                                {{ $recommendation->rule->dosisPupuk->cara_pakai }}</p>
                            <p class="card-text mb-1"><strong>Waktu Pemupukan:</strong>
                                {{ $recommendation->rule->dosisPupuk->keterangan }}</p>
                            <p class="card-text"><strong>Tips Tambahan:</strong> {{ $recommendation->rule->keterangan }}
                            </p>
                            <p class="card-text mb-1"><strong>Pemupukan Selanjutnya :</strong>
                                {{ $recommendation->rule->dosisPupuk->pemupukan_ulang }}</p>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
    </div>

    <!-- Modal for Enlarging Images -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .display-1 {
            font-size: 4rem;
            animation: bounceIn 1s;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.05);
                opacity: 1;
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
@endsection

@section('js')
    <script>
        // jQuery for the modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('imageModal');
            modal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var src = button.getAttribute('data-bs-src');
                var modalImage = modal.querySelector('#modalImage');
                modalImage.src = src;
            });
        });
    </script>
@endsection
