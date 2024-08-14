@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Karakteristik Tanaman Tumbuh</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Karakteristik Tanaman Tumbuh</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('karakteristik-tanaman-tumbuh.create') }}" class="btn btn-success">Tambah <i class="fa fa-plus"></i></a>
                        <a href="{{ route('cetak.laporan.karakteristik.tanaman.tumbuh') }}" target="_blank" class="btn btn-primary">Cetak Laporan Data Karakteristik Pertumbuhan</a>
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
                                        <th scope="col">Kode Tanaman</th>
                                        <th scope="col">Karakteristik</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($karakteristikTanamanTumbuhs as $karakteristikTanamanTumbuh)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $karakteristikTanamanTumbuh->kode_tanaman }}</td>
                                            <td>{{ $karakteristikTanamanTumbuh->karakteristik }}</td>
                                            <td>{{ $karakteristikTanamanTumbuh->keterangan }}</td>
                                            <td>
                                                @if ($karakteristikTanamanTumbuh->gambar)
                                                    <img src="{{ url('/files/' . $karakteristikTanamanTumbuh->gambar) }}" alt="Gambar Karakteristik Tanaman" width="100">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('karakteristik-tanaman-tumbuh.destroy', $karakteristikTanamanTumbuh->id) }}" method="POST">
                                                    <a href="{{ route('karakteristik-tanaman-tumbuh.edit', $karakteristikTanamanTumbuh->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
