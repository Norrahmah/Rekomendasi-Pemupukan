@extends('layout.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dosis Pupuk Panen</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Dosis Pupuk Panen</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('dosis-pupuk-panen.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
                    <a href="{{ route('cetak.laporan.dosis.panen') }}" target="_blank" class="btn btn-primary">Cetak Laporan Data Dosis Panen</a>
                </div>
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
                                    <th scope="col">Kode Dosis</th>
                                    <th scope="col">Jenis Pupuk</th>
                                    <th scope="col">Dosis</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Pelarutan</th>
                                    <th scope="col">Cara Pakai</th>
                                    <th scope="col">Waktu Pemupukan</th>
                                    <th scope="col">Pemupukan Kembali</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($dosisPupukPanens as $dosisPupukPanen)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $dosisPupukPanen->kode_dosis }}</td>
                                    <td>{{ $dosisPupukPanen->jenisPupuk->nama_pupuk }}</td>
                                    <td>{{ $dosisPupukPanen->dosis }}</td>
                                    <td>{{ $dosisPupukPanen->satuan }}</td>
                                    <td>{{ $dosisPupukPanen->pelarutan }}</td>
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $dosisPupukPanen->cara_pakai }}">{{ $dosisPupukPanen->cara_pakai }}</span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $dosisPupukPanen->keterangan }}">{{ $dosisPupukPanen->keterangan }}</span>
                                    </td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $dosisPupukPanen->pemupukan_ulang }}">{{ $dosisPupukPanen->pemupukan_ulang }}</span>
                                </td>
                                    <td>
                                        <form action="{{ route('dosis-pupuk-panen.destroy', $dosisPupukPanen->id) }}" method="POST">
                                            <a href="{{ route('dosis-pupuk-panen.edit', $dosisPupukPanen->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash"></i></button>
                                        </form>
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

<!-- Modal for Enlarging Text -->
<div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="textModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textModalLabel">Detail Keterangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalText"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('textModal');
        var modalText = document.getElementById('modalText');

        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(element) {
            element.addEventListener('click', function() {
                var text = this.getAttribute('title');
                modalText.innerText = text;
                var bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            });
        });
    });
</script>
@endsection
