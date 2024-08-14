@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Usia Cabai Panen</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Usia Cabai Panen</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('usia-cabai-panen.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
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
                                        <th scope="col">Kode Cabai</th>
                                        <th scope="col">Usia</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($usiaCabaiPanens as $usiaCabaiPanen)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $usiaCabaiPanen->kode_cabai }}</td>
                                            <td>{{ $usiaCabaiPanen->usia }}</td>
                                            <td>{{ $usiaCabaiPanen->keterangan }}</td>
                                            <td>
                                                <form action="{{ route('usia-cabai-panen.destroy', $usiaCabaiPanen->id) }}" method="POST">
                                                    <a href="{{ route('usia-cabai-panen.edit', $usiaCabaiPanen->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
@endsection
