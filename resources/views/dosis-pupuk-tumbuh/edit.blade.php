@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dosis Pupuk Tumbuh</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript;;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dosis-pupuk-tumbuh.index') }}">Data Dosis Pupuk
                                    Tumbuh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Dosis Pupuk Tumbuh</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 border-4">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="font-22 text-black"></i></div>
                            <h5 class="mb-0 text-black">Form Edit Dosis Pupuk Tumbuh</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('dosis-pupuk-tumbuh.update', $dosisPupukTumbuh->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label class="form-label">Kode Dosis</label>
                                <input type="text" class="form-control" name="kode_dosis" value="{{ $dosisPupukTumbuh->kode_dosis }}" readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Jenis Pupuk</label>
                                <select class="form-control" name="jenis_pupuk_id" required>
                                    <option value="">Pilih Jenis Pupuk</option>
                                    @foreach ($jenisPupuks as $jenisPupuk)
                                        <option value="{{ $jenisPupuk->id }}" {{ $dosisPupukTumbuh->jenis_pupuk_id == $jenisPupuk->id ? 'selected' : '' }}>
                                            {{ $jenisPupuk->nama_pupuk }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Dosis</label>
                                <input type="text" class="form-control" name="dosis" value="{{ $dosisPupukTumbuh->dosis }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="{{ $dosisPupukTumbuh->satuan }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Pelarutan</label>
                                <input type="text" class="form-control" name="pelarutan" value="{{ $dosisPupukTumbuh->pelarutan }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Cara Pakai</label>
                                <textarea class="form-control" name="cara_pakai" rows="3">{{ $dosisPupukTumbuh->cara_pakai }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Waktu Pemupukan</label>
                                <textarea class="form-control" name="keterangan" rows="3">{{ $dosisPupukTumbuh->keterangan }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Pemupukan Kembali Saat Bibit Berumur</label>
                                <input type="text" class="form-control" name="pemupukan_ulang" value="{{ $dosisPupukTumbuh->pemupukan_ulang }}">
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
