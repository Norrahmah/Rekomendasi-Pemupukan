@extends('layout.master2')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="col">
                <div class="card border-0 border-4 mt-2">
                    <div class="card-body p-4">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0 text-black">Riwayat Rekomendasi Panen</h5>
                        </div>
                        <hr>
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tgl Riwayat</th>
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
                                            <td>{{ $recommendation->usiaCabai->usia }}</td>
                                            <td>{{ $recommendation->phTanah->ph_level }}</td>
                                            <td>{{ $recommendation->kondisiIklim->kondisi }}</td>
                                            <td>{{ $recommendation->karakteristikTanaman->karakteristik }}</td>
                                            <td>{{ $recommendation->match_score }}</td>
                                            <td> <a href="{{ route('rekomendasi-panen.cetak', $recommendation->id) }}"
                                                    target="_blank" class="btn btn-success btn-sm">Cetak</a>
                                                <a href="{{ route('rekomendasi-panen.show', $recommendation->id) }}"
                                                    class="btn btn-primary btn-sm">Lihat Detail</a>
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
@endsection
