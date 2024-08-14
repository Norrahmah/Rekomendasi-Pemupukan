<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Dosis Pupuk Tumbuh</title>
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
        <h3 class="text-center">Laporan Data Dosis Pupuk Pertumbuhan</h3>
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
                    @foreach ($dosisPupukTumbuhs as $dosisPupukTumbuh)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dosisPupukTumbuh->kode_dosis }}</td>
                            <td>{{ $dosisPupukTumbuh->jenisPupuk->nama_pupuk }}</td>
                            <td>{{ $dosisPupukTumbuh->dosis }}</td>
                            <td>{{ $dosisPupukTumbuh->satuan }}</td>
                            <td>{{ $dosisPupukTumbuh->pelarutan }}</td>
                            <td>{{ $dosisPupukTumbuh->cara_pakai }}</td>
                            <td>{{ $dosisPupukTumbuh->keterangan }}</td>
                            <td>{{ $dosisPupukTumbuh->pemupukan_ulang }}</td>
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
