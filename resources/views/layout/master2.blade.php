<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Pemupukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

    <style>
        body {
            background: url({{ asset('files/bg.jpg') }}) no-repeat;
            background-size: cover;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .jumbotron {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 2rem;
        }

        .footer {
            text-align: center;
            padding: 1rem;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .navbar-nav .nav-link {
            margin-right: 15px;
            font-weight: bold;
        }

        .navbar-nav .nav-link.user-name {
            cursor: pointer;
        }
    </style>
    @section('css')
    @show
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('templates/assets/images/logo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rekomendasi-tumbuh.create') }}">Rekomendasi Pertumbuhan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rekomendasi-panen.create') }}">Rekomendasi Panen</a>
                    </li>
                    @if (Auth::check() && Auth::user()->level === 'petani')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat-rekomendasi-tumbuh') }}">Riwayat Rekomendasi
                                Tumbuh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat-rekomendasi-panen') }}">Riwayat Rekomendasi
                                Panen</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        @if (Auth::check() && Auth::user()->level == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register-petani') }}">Daftar Petani</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        @yield('content')
    </div>

        <script src="{{ asset('templates/assets/js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "pageLength": 10,
                    "autoWidth": true,
                });
            });
        </script>

@section('js')
    @show
</body>

</html>
