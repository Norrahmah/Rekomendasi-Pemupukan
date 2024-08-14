@extends('layout.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Rules Panen</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Rules Panen</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="{{ route('rules-panen.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
                    <a href="{{ route('cetak.laporan.rules.panen') }}" target="_blank" class="btn btn-primary">Cetak Laporan Data Rules Panen</a>
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
                                    <th scope="col">Kode Rule</th>
                                    <th scope="col">Usia Cabai</th>
                                    <th scope="col">PH Tanah</th>
                                    <th scope="col">Kondisi Iklim</th>
                                    <th scope="col">Karakteristik Tanaman</th>
                                    <th scope="col">Gambar Karakteristik</th>
                                    <th scope="col">Jenis Pupuk</th>
                                    <th scope="col">Dosis Pupuk</th>
                                    <th scope="col">Pemupukan Kembali</th>
                                    <th scope="col">Cara Pakai</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
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
                                    {{-- <td>{{ $rulesPanen->dosisPupuk->pemupukan_ulang }}</td> --}}
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $rulesPanen->dosisPupuk->pemupukan_ulang }}">{{ $rulesPanen->dosisPupuk->pemupukan_ulang }}</span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $rulesPanen->dosisPupuk->cara_pakai }}">{{ $rulesPanen->dosisPupuk->cara_pakai }}</span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" title="{{ $rulesPanen->keterangan }}">{{ $rulesPanen->keterangan }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('rules-panen.destroy', $rulesPanen->id) }}" method="POST">
                                            <a href="{{ route('rules-panen.edit', $rulesPanen->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
