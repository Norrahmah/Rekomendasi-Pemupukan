@extends('layout.master2')

@section('content')
<div class="card border-0 border-4 mt-5">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <h5 class="mb-0 text-black">Form Rekomendasi Panen</h5>
        </div>
        <hr>
        <form id="rekomendasiForm" action="{{ route('rekomendasi-panen.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label"><strong>Usia Cabai</strong></label>
                <p class="text-muted small">Pilih usia cabai Anda saat ini:</p>
                <select class="form-select" id="usia_cabai_id" name="usia_cabai_id" required>
                    <option value="" selected disabled>Pilih Usia Cabai</option> 
                    @foreach ($usiaCabai as $usia)
                        <option value="{{ $usia->id }}">{{ $usia->usia }} ( {{ $usia->keterangan }} ) </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>pH Tanah</strong></label>
                <p class="text-muted small">Pilih tingkat pH tanah Anda:</p>
                <select class="form-select" id="ph_tanah_id" name="ph_tanah_id" required>
                    <option value="" selected disabled>Pilih pH Tanah</option>
                    @foreach ($phTanah as $ph)
                        <option value="{{ $ph->id }}">{{ $ph->keterangan }} ( {{ $ph->ph_level }} ) </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Kondisi Iklim</strong></label>
                <p class="text-muted small">Pilih kondisi iklim di daerah Anda:</p>
                <select class="form-select" id="kondisi_iklim_id" name="kondisi_iklim_id" required>
                    <option value="" selected disabled>Pilih Kondisi Iklim</option>
                    @foreach ($kondisiIklim as $iklim)
                        <option value="{{ $iklim->id }}">{{ $iklim->keterangan }}  ( {{ $iklim->kondisi }} ) </option>
                    @endforeach
                </select>
            </div>


            
            <div class="mb-3">
                <label class="form-label"><strong>Karakteristik Tanaman</strong></label>
                <p class="text-muted small">Pilih karakteristik tanaman cabai Anda saat ini:</p>
                <div class="row karakteristik-tanaman-list">
                    @foreach ($karakteristikTanaman as $karakteristik)
                        <div class="col-md-4 mb-3">
                            <div class="card karakteristik-tanaman-card" data-id="{{ $karakteristik->id }}">
                                <div class="card-img-wrapper">
                                    <img src="{{ url('/files/' . $karakteristik->gambar) }}" class="card-img-top" alt="Gambar Karakteristik Tanaman">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $karakteristik->karakteristik }}</h6>
                                    <p class="card-text text-muted small">{{ $karakteristik->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="karakteristik_tanaman_id" name="karakteristik_tanaman_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Dapatkan Rekomendasi</button>
        </form>
    </div>
</div>

@section('js')
<script>
    document.querySelectorAll('.usia-cabai-card').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('usia_cabai_id').value = this.dataset.id;
            document.querySelectorAll('.usia-cabai-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    document.querySelectorAll('.ph-tanah-card').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('ph_tanah_id').value = this.dataset.id;
            document.querySelectorAll('.ph-tanah-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    document.querySelectorAll('.kondisi-iklim-card').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('kondisi_iklim_id').value = this.dataset.id;
            document.querySelectorAll('.kondisi-iklim-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    document.querySelectorAll('.karakteristik-tanaman-card').forEach(card => {
        card.addEventListener('click', function() {
            document.getElementById('karakteristik_tanaman_id').value = this.dataset.id;

            // Remove 'selected' from all cards
            document.querySelectorAll('.karakteristik-tanaman-card').forEach(c => c.classList.remove('selected'));

            // Add 'selected' to the clicked card
            this.classList.add('selected');
        });
    });

    document.getElementById('rekomendasiForm').addEventListener('submit', function(event) {
        if (!document.getElementById('usia_cabai_id').value) {
            alert('Please select Usia Cabai.');
            event.preventDefault();
            return;
        }
        if (!document.getElementById('ph_tanah_id').value) {
            alert('Please select pH Tanah.');
            event.preventDefault();
            return;
        }
        if (!document.getElementById('kondisi_iklim_id').value) {
            alert('Please select Kondisi Iklim.');
            event.preventDefault();
            return;
        }
        if (!document.getElementById('karakteristik_tanaman_id').value) {
            alert('Please select Karakteristik Tanaman.');
            event.preventDefault();
            return;
        }
    });
</script>

<style>
    .selected {
        border: 2px solid red;
    }
    .card-img-wrapper {
        overflow: hidden;
        height: 270px; /* Adjust the height as needed */
    }

    .karakteristik-tanaman-card.selected {
        border-color: #0d6efd; 
        background-color: #0d6efd; 
        color: white; 
    }

    .karakteristik-tanaman-card.selected .card-img-wrapper img {
        filter: brightness(0.7); /* Adjust brightness as needed */
    }
</style>
@stop
@endsection
