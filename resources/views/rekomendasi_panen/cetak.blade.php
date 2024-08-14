<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekomendasi Panen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;
        }

        .card-title {
            font-weight: bold;
            text-align: center;
        }

        .img-thumbnail {
            cursor: pointer;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .modal-body img {
            width: 100%;
        }

        @media print {
            .card {
                page-break-inside: avoid;
            }

            .no-print {
                display: none;
            }

            body, .container {
                width: 100%;
                height: 100%;
                font-size: 12px; /* Adjust the font size to fit content */
            }
        }

        .small-text {
            font-size: 12px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="card border-0 border-4">
            <div class="card-body p-2">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0 text-dark">Hasil Rekomendasi Panen</h5>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-md-6 col-xl-6"> 
                        <div class="card border-0 shadow-sm rounded-3 w-100">
                            <div class="card-body">
                                <h5 class="card-title text-secondary"><i class="fas fa-info-circle"></i> Kondisi Tanaman Cabai dan Lingkungan:</h5>
                                <div class="row row-cols-2 row-cols-md-2 g-2">
                                    <div class="col">
                                        <div class="card h-80 border-0">
                                            <div class="card-body text-center">
                                                <i class="fas fa-hourglass-start fa-2x text-muted mb-1"></i>
                                                <h6 class="card-title">Usia Cabai</h6>
                                                <p class="card-text small-text">{{ $recommendation->usiaCabai->usia }} / {{ $recommendation->usiaCabai->keterangan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-80 border-0">
                                            <div class="card-body text-center">
                                                <i class="fas fa-vial fa-2x text-muted mb-1"></i>
                                                <h6 class="card-title">pH Tanah</h6>
                                                <p class="card-text small-text">{{ $recommendation->phTanah->ph_level }} / {{ $recommendation->phTanah->keterangan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-80 border-0">
                                            <div class="card-body text-center">
                                                <i class="fas fa-cloud-sun fa-2x text-muted mb-1"></i>
                                                <h6 class="card-title">Kondisi Iklim</h6>
                                                <p class="card-text small-text">{{ $recommendation->kondisiIklim->kondisi }} / {{ $recommendation->kondisiIklim->keterangan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-80 border-0">
                                            <div class="card-body text-center">
                                                <i class="fas fa-leaf fa-2x text-muted mb-1"></i>
                                                <h6 class="card-title">Karakteristik Tanaman</h6>
                                                <img src="{{ url('/files/' . $recommendation->karakteristikTanaman->gambar) }}" alt="Karakteristik Tanaman" class="img-thumbnail rounded-3 mb-1" width="60" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="{{ url('/files/' . $recommendation->karakteristikTanaman->gambar) }}">
                                                <p class="card-text small-text">{{ $recommendation->karakteristikTanaman->karakteristik }} / {{ $recommendation->karakteristikTanaman->keterangan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6"> 
                        <div class="card border-0 shadow-sm rounded-3 w-100">
                            <div class="card-body p-2">
                                <h5 class="card-title text-success">Rekomendasi Pemupukan <i class="fas fa-leaf ms-2"></i></h5>

                                <p class="card-text small-text"><strong>Jenis dan Dosis Pupuk:</strong> {{ $recommendation->rule->dosisPupuk->jenisPupuk->nama_pupuk }} {{ $recommendation->rule->dosisPupuk->dosis }} {{ $recommendation->rule->dosisPupuk->satuan }}</p>
                                <p class="card-text small-text"><strong>Aplikasi Pemupukan :</strong> {{ $recommendation->rule->dosisPupuk->cara_pakai }}</p>
                                <p class="card-text small-text"><strong>Waktu Pemupukan:</strong> {{ $recommendation->rule->dosisPupuk->keterangan }}</p>
                                <p class="card-text small-text"><strong>Tips Tambahan:</strong> {{ $recommendation->rule->keterangan }}</p>
                                <p class="card-text small-text"><strong>Pemupukan Selanjutnya :</strong> {{ $recommendation->rule->dosisPupuk->pemupukan_ulang }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
