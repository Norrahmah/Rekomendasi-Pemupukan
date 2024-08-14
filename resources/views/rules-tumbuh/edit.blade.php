

@extends('layout.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Rules Tumbuh</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript;;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('rules-tumbuh.index') }}">Data Rules Tumbuh</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Rules Tumbuh</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card border-0 border-4">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="font-22 text-black"></i></div>
                            <h5 class="mb-0 text-black">Form Edit Rules Tumbuh</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('rules-tumbuh.update', $rulesTumbuh->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label class="form-label">Usia Cabai</label>
                                <select class="form-select" name="usia_cabai_id" required>
                                    <option disabled>-- Pilih Usia Cabai --</option>
                                    @foreach ($usiaCabaiTumbuhs as $usiaCabai)
                                        <option value="{{ $usiaCabai->id }}"
                                            {{ $rulesTumbuh->usia_cabai_id == $usiaCabai->id ? 'selected' : '' }}>
                                            {{ $usiaCabai->usia }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">PH Tanah</label>
                                <select class="form-select" name="ph_tanah_id" required>
                                    <option disabled>-- Pilih PH Tanah --</option>
                                    @foreach ($phTanahTumbuhs as $phTanah)
                                        <option value="{{ $phTanah->id }}"
                                            {{ $rulesTumbuh->ph_tanah_id == $phTanah->id ? 'selected' : '' }}>
                                            {{ $phTanah->ph_level }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Kondisi Iklim</label>
                                <select class="form-select" name="kondisi_iklim_id" required>
                                    <option disabled>-- Pilih Kondisi Iklim --</option>
                                    @foreach ($kondisiIklimTumbuhs as $kondisiIklim)
                                        <option value="{{ $kondisiIklim->id }}"
                                            {{ $rulesTumbuh->kondisi_iklim_id == $kondisiIklim->id ? 'selected' : '' }}>
                                            {{ $kondisiIklim->kondisi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Karakteristik Tanaman</label>
                                <select class="form-select" name="karakteristik_tanaman_id" required>
                                    <option disabled>-- Pilih Karakteristik Tanaman --</option>
                                    @foreach ($karakteristikTanamanTumbuhs as $karakteristikTanaman)
                                        <option value="{{ $karakteristikTanaman->id }}"
                                            {{ $rulesTumbuh->karakteristik_tanaman_id == $karakteristikTanaman->id ? 'selected' : '' }}>
                                            {{ $karakteristikTanaman->karakteristik }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Pupuk</label>
                                <select class="form-select" name="dosis_pupuk_id" required>
                                    <option disabled>-- Pilih Pupuk --</option>
                                    @foreach ($dosisPupukTumbuhs as $dosisPupuk)
                                        <option value="{{ $dosisPupuk->id }}"
                                            {{ $rulesTumbuh->dosis_pupuk_id == $dosisPupuk->id ? 'selected' : '' }}>
                                            {{ $dosisPupuk->jenisPupuk->nama_pupuk }} / Dosis : {{ $dosisPupuk->dosis }}
                                            {{ $dosisPupuk->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-12">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3">{{ $rulesTumbuh->keterangan }}</textarea>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-success px-5">Simpan Perubahan</button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger">
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
