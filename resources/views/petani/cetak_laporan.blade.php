<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Petani</title>
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
        <h3 class="text-center">Laporan Data Petani</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Lokasi</th>
                        <th>Luas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petanis as $petani)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $petani->nama }}</td>
                            <td>{{ $petani->nik }}</td>
                            <td>{{ $petani->tempat_lahir }}, {{ $petani->tanggal_lahir->format('d-m-Y') }}</td>
                            <td>{{ $petani->alamat }}</td>
                            <td>{{ $petani->jenis_kelamin }}</td>
                            <td>{{ $petani->lokasi }}</td>
                            <td>{{ $petani->luas }}</td>
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
