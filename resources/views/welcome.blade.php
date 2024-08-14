@extends('layout.master2')

@section('content')
<div class="jumbotron text-center animate__animated animate__fadeIn">
    
    <img src="{{ asset('templates/assets/images/logo.png') }}" alt="Logo" style="width:250px;">
    <div class="animate__animated animate__bounceInLeft">
        <h1 class="display-4">Rekomendasi Pemupukan</h1>
    </div>
    <p class="lead animate__animated animate__bounceInRight">Dapatkan rekomendasi pemupukan yang sesuai untuk tanaman cabai Anda.</p>
    <a href="{{ route('rekomendasi-tumbuh.create') }}" class="btn btn-primary mx-2 animate__animated animate__fadeInUp">Rekomendasi Pertumbuhan</a>
    <a href="{{ route('rekomendasi-panen.create') }}" class="btn btn-success mx-2 animate__animated animate__fadeInUp">Rekomendasi Panen</a>
</div>
@endsection
