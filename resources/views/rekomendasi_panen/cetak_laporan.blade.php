<!-- resources/views/rekomendasi_tumbuh/cetak_laporan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekomendasi Panen</title>
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

        .table th,
        .table td {
            vertical-align: middle;
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
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Laporan Rekomendasi Panen</h3>
        <p><strong>Periode:</strong> {{ $tgl_mulai }} - {{ $tgl_selesai }}</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tgl Riwayat</th>
                        <th>Nama Petani</th>
                        <th>Usia Cabai</th>
                        <th>pH Tanah</th>
                        <th>Kondisi Iklim</th>
                        <th>Karakteristik Tanaman</th>
                        <th>Match Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recommendations as $recommendation)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $recommendation->tgl_input }}</td>
                            <td>{{ $recommendation->petani ? $recommendation->petani->nama : '' }}</td>
                            <td>{{ $recommendation->usiaCabai->usia }}</td>
                            <td>{{ $recommendation->phTanah->ph_level }}</td>
                            <td>{{ $recommendation->kondisiIklim->kondisi }}</td>
                            <td>{{ $recommendation->karakteristikTanaman->karakteristik }}</td>
                            <td>{{ $recommendation->match_score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
