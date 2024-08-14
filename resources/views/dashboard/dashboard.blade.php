@extends('layout.master')
@section('content')
    <div class="page-wrapper" style="background: url('{{ asset('files/bg.jpg') }}') no-repeat; background-size: cover;">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3 text-white">Dashboard</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                Selamat datang di halaman 
                                <span class="badge rounded-pill btn-info ">{{ Auth::user()->level }}</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h1 class="display-4 animate__animated animate__fadeInDown text-white">Selamat Datang di Dashboard Anda</h1>
                    <p class="lead animate__animated animate__fadeInUp text-white">Kelola tugas Anda dan pantau kemajuan dengan mudah.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInLeft">
                        <div class="card-body text-center">
                            <img src="{{ asset('files/petani.jpg') }}" class="img-fluid rounded img-equal-height" alt="Gambar Petani">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInLeft">
                        <div class="card-body text-center">
                            <img src="{{ asset('files/petani2.jpg') }}" class="img-fluid rounded img-equal-height" alt="Gambar Petani 2">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInLeft">
                        <div class="card-body text-center">
                            <img src="{{ asset('files/petani3.jpg') }}" class="img-fluid rounded img-equal-height" alt="Gambar Petani 3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInRight">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Tentang Cabai Rawit Hiyung Tapin</h5>
                            <p class="card-text">
                                <strong>Cabai Rawit Hiyung Tapin</strong> adalah varietas cabai rawit lokal yang berasal dari Desa Hiyung, Kecamatan Tapin Tengah, Kabupaten Tapin, Kalimantan Selatan. Cabai ini dikenal karena tingkat kepedasannya yang luar biasa, bahkan disebut-sebut sebagai cabai terpedas di Indonesia.
                                <br><br>
                                Cabai Rawit Hiyung memiliki ciri khas tersendiri dibandingkan dengan cabai rawit lainnya. Warna buahnya yang merah menyala menandakan kematangan dan kepedasannya yang tinggi. Selain itu, ukuran buahnya cenderung lebih kecil namun memiliki kandungan capsaicin yang sangat tinggi, zat yang bertanggung jawab atas rasa pedas.
                                <br><br>
                                Petani lokal di Desa Hiyung telah membudidayakan cabai ini secara turun-temurun. Proses budidaya yang dilakukan dengan teknik tradisional dan perawatan yang intensif menjadikan cabai ini berkualitas tinggi. Tanaman cabai ini biasanya ditanam di lahan dengan kondisi tanah yang subur dan mendapatkan paparan sinar matahari yang cukup, yang semuanya berkontribusi pada kualitas dan rasa pedas yang khas.
                                <br><br>
                                Cabai Rawit Hiyung tidak hanya populer di kalangan masyarakat lokal, tetapi juga telah menarik perhatian di tingkat nasional. Banyak penggemar makanan pedas yang mencari cabai ini untuk digunakan sebagai bumbu dalam berbagai masakan, mulai dari sambal hingga hidangan utama. Kepedasannya yang unik memberikan sensasi tersendiri yang sulit ditemukan pada cabai rawit lainnya.
                                <br><br>
                                Di luar aspek kuliner, Cabai Rawit Hiyung juga memiliki nilai ekonomi yang signifikan bagi masyarakat Desa Hiyung. Budidaya dan penjualan cabai ini memberikan sumber penghasilan utama bagi banyak keluarga di desa tersebut. Beberapa inisiatif dan program pemerintah setempat juga telah membantu meningkatkan produksi dan pemasaran cabai ini, sehingga bisa menjangkau pasar yang lebih luas.
                                <br><br>
                                Dengan segala keunikan dan manfaatnya, Cabai Rawit Hiyung Tapin tidak hanya menjadi kebanggaan lokal Desa Hiyung dan Kabupaten Tapin, tetapi juga aset penting dalam keanekaragaman hayati dan kuliner Indonesia. Upaya untuk melestarikan dan mempromosikan cabai ini terus dilakukan agar semakin banyak orang yang dapat menikmati kelezatan dan sensasi pedasnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .page-wrapper {
            min-height: 100vh;
        }
        .card-title {
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            color: #6c757d;
        }
        .btn {
            border-radius: 50px;
            padding: 10px 20px;
        }
        .img-equal-height {
            height: 200px; /* Adjust the height as needed */
            object-fit: cover;
        }
    </style>
@endsection
