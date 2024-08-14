@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Riwayat Rekomendasi Tumbuh</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Riwayat Rekomendasi Tumbuh</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Usia Cabai</th>
                                        <th scope="col">pH Tanah</th>
                                        <th scope="col">Kondisi Iklim</th>
                                        <th scope="col">Karakteristik Tanaman</th>
                                        <th scope="col">Tanggal Input</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($userInputs as $input)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $input->usia_cabai }}</td>
                                            <td>{{ $input->ph_tanah }}</td>
                                            <td>{{ $input->kondisi_iklim }}</td>
                                            <td>{{ $input->karakteristik_tanaman }}</td>
                                            <td>{{ $input->created_at }}</td>
                                            <td>
                                                <button class="btn btn-info" onclick="lihatHasil({{ $input->id }})">Lihat Hasil</button>
                                            </td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hasil Rekomendasi -->
    <div class="modal fade" id="hasilRekomendasiModal" tabindex="-1" aria-labelledby="hasilRekomendasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hasilRekomendasiModalLabel">Hasil Rekomendasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="rekomendasi-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function lihatHasil(id) {
            $.ajax({
                url: '/riwayat-rekomendasi-tumbuh/' + id + '/hasil',
                method: 'GET',
                success: function(response) {
                    let rekomendasiHtml = '<table class="table table-bordered">';
                    rekomendasiHtml += '<thead>';
                        
                    rekomendasiHtml += `<tr><th colspan="12">Inputan</th></tr>`;
                    rekomendasiHtml += `<tr><td colspan="12">Usia Cabai: ${response.userInput.usia_cabai}</td></tr>`;
                    rekomendasiHtml += `<tr><td colspan="12">pH Tanah: ${response.userInput.ph_tanah}</td></tr>`;
                    rekomendasiHtml += `<tr><td colspan="12">Kondisi Iklim: ${response.userInput.kondisi_iklim}</td></tr>`;
                    rekomendasiHtml += `<tr><td colspan="12">Karakteristik Tanaman: ${response.userInput.karakteristik_tanaman}</td></tr>`;
                    rekomendasiHtml += `<tr><th colspan="12">Hasil Rekomendasi Pemupukan Pertumbuhan</th></tr>`;
                    rekomendasiHtml +=
                        '<tr><th>Usia Cabai</th><th>pH Tanah</th><th>Kondisi Iklim</th><th>Karakteristik Tanaman</th><th>Jenis Pupuk</th><th>Dosis</th><th>Satuan</th><th>Cara Pakai</th><th>Persentase Kecocokan</th></tr>';
                    rekomendasiHtml += '</thead>';

                    rekomendasiHtml += '<tbody>';

                    response.rekomendasi.forEach(function(item) {
                        rekomendasiHtml += '<tr>';
                        rekomendasiHtml += `<td>${item.usia_cabai}</td>`;
                        rekomendasiHtml += `<td>${item.ph_tanah}</td>`;
                        rekomendasiHtml += `<td>${item.kondisi_iklim}</td>`;
                        rekomendasiHtml += `<td>${item.karakteristik_tanaman}</td>`;
                        rekomendasiHtml += `<td>${item.jenis_pupuk}</td>`;
                        rekomendasiHtml += `<td>${item.dosis}</td>`;
                        rekomendasiHtml += `<td>${item.satuan}</td>`;
                        rekomendasiHtml += `<td>${item.cara_pakai}</td>`;
                        rekomendasiHtml += `<td>${item.persentase_kecocokan}%</td>`;
                        rekomendasiHtml += '</tr>';
                    });
                    rekomendasiHtml += '</tbody></table>';

                    $('#rekomendasi-container').html(rekomendasiHtml);
                    $('#hasilRekomendasiModal').modal('show');
                }
            });
        }
    </script>
@endsection
