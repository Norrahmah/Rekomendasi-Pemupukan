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
                            <li class="breadcrumb-item"><a href="{{ route('karakteristik-tanaman-tumbuh.index') }}">Data Karakteristik Tanaman Tumbuh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Karakteristik Tanaman Tumbuh</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 border-4">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="font-22 text-black"></i></div>
                            <h5 class="mb-0 text-black">Form Edit Karakteristik Tanaman Tumbuh</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('karakteristik-tanaman-tumbuh.update', $karakteristikTanamanTumbuh->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label class="form-label">Karakteristik</label>
                                <textarea class="form-control" name="karakteristik" rows="3" required>{{ $karakteristikTanamanTumbuh->karakteristik }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3">{{ $karakteristikTanamanTumbuh->keterangan }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                @if ($karakteristikTanamanTumbuh->gambar)
                                    <img src="{{ url('/files/' . $karakteristikTanamanTumbuh->gambar) }}" alt="Gambar Karakteristik Tanaman" width="150">
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
