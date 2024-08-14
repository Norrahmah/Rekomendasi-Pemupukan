<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Dosis Pupuk Panen</title>
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
                font-size: 12px; /* Adjust the font size to fit content */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Laporan Data Dosis Pupuk Panen</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Dosis</th>
                        <th>Jenis Pupuk</th>
                        <th>Dosis</th>
                        <th>Satuan</th>
                        <th>Pelarutan</th>
                        <th>Cara Pakai</th>
                        <th>Waktu Pemupukan</th>
                        <th>Pemupukan Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosisPupukPanens as $dosisPupukPanen)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dosisPupukPanen->kode_dosis }}</td>
                            <td>{{ $dosisPupukPanen->jenisPupuk->nama_pupuk }}</td>
                            <td>{{ $dosisPupukPanen->dosis }}</td>
                            <td>{{ $dosisPupukPanen->satuan }}</td>
                            <td>{{ $dosisPupukPanen->pelarutan }}</td>
                            <td>{{ $dosisPupukPanen->cara_pakai }}</td>
                            <td>{{ $dosisPupukPanen->keterangan }}</td>
                            <td>{{ $dosisPupukPanen->pemupukan_ulang }}</td>
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
