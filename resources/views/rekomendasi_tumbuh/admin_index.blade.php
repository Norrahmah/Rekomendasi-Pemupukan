<!-- resources/views/phtanahpanen/index.blade.php -->

@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Riwayat</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Rekomendasi Pertumbuhan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card border-0 border-4 mt-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-black">Data</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cetakLaporanModal">Cetak Laporan Riwayat Rekomendasi Petani</button>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0"  id="example2">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recommendations as $recommendation)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $recommendation->tgl_input }}</td>
                                            <td>{{ $recommendation->petani ? $recommendation->petani->nama : '-' }}</td>
                                            <td>{{ $recommendation->usiaCabai->usia }}</td>
                                            <td>{{ $recommendation->phTanah->ph_level }}</td>
                                            <td>{{ $recommendation->kondisiIklim->kondisi }}</td>
                                            <td>{{ $recommendation->karakteristikTanaman->karakteristik }}</td>
                                            <td>{{ $recommendation->match_score }}</td>
                                            <td>
                                                <a href="{{ route('rekomendasi-tumbuh.show', $recommendation->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                                <form action="{{ route('rekomendasi-tumbuh.destroy', $recommendation->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
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

    <!-- Modal -->
    <div class="modal fade" id="cetakLaporanModal" tabindex="-1" aria-labelledby="cetakLaporanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cetakLaporanModalLabel">Cetak Laporan Riwayat Rekomendasi Petani</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cetak.laporan.rekomendasi.tumbuh') }}" method="GET" target="_blank">
                        <div class="mb-3">
                            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                        </div>
                        <div class="mb-3">
                            <label for="petani_id" class="form-label">Petani</label>
                            <select class="form-control" id="petani_id" name="petani_id">
                                <option value="">Semua Petani</option>
                                @foreach ($petanis as $petani)
                                    <option value="{{ $petani->id }}">{{ $petani->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
