@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Data Petani</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Petani</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('petani.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
                        <a href="{{ route('cetak.laporan.petani') }}" target="_blank" class="btn btn-primary">Cetak Laporan Data Petani</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
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
                                        <th>Aksi</th>
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
                                            <td>
                                                <a href="{{ route('petani.edit', $petani->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('petani.destroy', $petani->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
@endsection
