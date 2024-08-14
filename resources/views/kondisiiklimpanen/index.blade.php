@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Kondisi Iklim Panen</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript;;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kondisi-iklim-panen.index') }}">Data Kondisi Iklim Panen</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kondisi Iklim Panen</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('kondisi-iklim-panen.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
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
                                        <th scope="col">Kode Iklim</th>
                                        <th scope="col">Kondisi</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($kondisiIklimPanens as $kondisiIklimPanen)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $kondisiIklimPanen->kode_iklim }}</td>
                                            <td>{{ $kondisiIklimPanen->kondisi }}</td>
                                            <td>{{ $kondisiIklimPanen->keterangan }}</td>
                                            <td>
                                                <form action="{{ route('kondisi-iklim-panen.destroy', $kondisiIklimPanen->id) }}" method="POST">
                                                    <a href="{{ route('kondisi-iklim-panen.edit', $kondisiIklimPanen->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
