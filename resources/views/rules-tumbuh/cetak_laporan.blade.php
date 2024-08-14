<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Rules Pertumbuhan</title>
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
        <h3 class="text-center">Laporan Data Rules Pertumbuhan</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Rule</th>
                        <th>Usia Cabai</th>
                        <th>pH Tanah</th>
                        <th>Kondisi Iklim</th>
                        <th>Karakteristik Tanaman</th>
                        <th>Gambar Karakteristik</th>
                        <th>Jenis Pupuk</th>
                        <th>Dosis Pupuk</th>
                        <th>Pemupukan Kembali</th>
                        <th>Cara Pakai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rulesTumbuhs as $rulesTumbuh)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $rulesTumbuh->kode_rule }}</td>
                            <td>{{ $rulesTumbuh->usiaCabai->usia }}</td>
                            <td>{{ $rulesTumbuh->phTanah->ph_level }}</td>
                            <td>{{ $rulesTumbuh->kondisiIklim->kondisi }}</td>
                            <td>{{ $rulesTumbuh->karakteristikTanaman->karakteristik }}</td>
                            <td>
                                @if($rulesTumbuh->karakteristikTanaman->gambar)
                                    <img src="{{ url('/files/' . $rulesTumbuh->karakteristikTanaman->gambar) }}" alt="Gambar Karakteristik" width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $rulesTumbuh->dosisPupuk->jenisPupuk->nama_pupuk }}</td>
                            <td>{{ $rulesTumbuh->dosisPupuk->dosis }} {{ $rulesTumbuh->dosisPupuk->satuan }}</td>
                            <td>{{ $rulesTumbuh->dosisPupuk->pemupukan_ulang }}</td>
                            <td>{{ $rulesTumbuh->dosisPupuk->cara_pakai }}</td>
                            <td>{{ $rulesTumbuh->keterangan }}</td>
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
