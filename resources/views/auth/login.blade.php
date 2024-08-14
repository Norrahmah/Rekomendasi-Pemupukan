<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('templates/assets/images/logo.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('templates/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('templates/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('templates/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('templates/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/assets/css/icons.css') }}" rel="stylesheet">
    <title>Rekomendasi Pemupukan</title>
    <style type="text/css">
        .authentication-header {
            background: #ffffa4 !important;
        }

        .pace .pace-progress {
            background: yellow !important;
        }
    </style>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-header"></div>
        <div class="authentication-reset-password d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="p-5">
                                        <div class="text-start text-center">
                                            <img src="{{ asset('templates/assets/images/logo.png') }}" width="100"
                                                height="100">
                                        </div>
                                        <h4 class="mt-5 font-weight-bold">Login</h4>
                                        <p class="text-muted">Silahkan Masukkan Email dan Password Untuk Login!</p>
                                        <form action="{{ route('postlogin') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="mb-3 mt-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmailAddress"
                                                    name="email" placeholder="Masukkan Email" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" name="password"
                                                        placeholder="Masukkan Password">
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-warning"><i
                                                        class="bx bxs-lock-open"></i>Sign in</button>
                                            </div>
                                        <div class="text-center mt-3">
                                            <a href="{{ url('register-petani') }}" class="btn btn-link">Daftar Petani?</a>
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
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>
