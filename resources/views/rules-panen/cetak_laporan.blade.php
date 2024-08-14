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
        <h3 class="text-center">Laporan Data Rules Panen</h3>
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
                    @foreach ($rulesPanens as $rulesPanen)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $rulesPanen->kode_rule }}</td>
                            <td>{{ $rulesPanen->usiaCabai->usia }}</td>
                            <td>{{ $rulesPanen->phTanah->ph_level }}</td>
                            <td>{{ $rulesPanen->kondisiIklim->kondisi }}</td>
                            <td>{{ $rulesPanen->karakteristikTanaman->karakteristik }}</td>
                            <td>
                                @if($rulesPanen->karakteristikTanaman->gambar)
                                    <img src="{{ url('/files/' . $rulesPanen->karakteristikTanaman->gambar) }}" alt="Gambar Karakteristik" width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $rulesPanen->dosisPupuk->jenisPupuk->nama_pupuk }}</td>
                            <td>{{ $rulesPanen->dosisPupuk->dosis }} {{ $rulesPanen->dosisPupuk->satuan }}</td>
                            <td>{{ $rulesPanen->dosisPupuk->pemupukan_ulang }}</td>
                            <td>{{ $rulesPanen->dosisPupuk->cara_pakai }}</td>
                            <td>{{ $rulesPanen->keterangan }}</td>
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
