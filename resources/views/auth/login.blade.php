@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('assets/img/Koperasi.JPG') }}');
        background-size: contain; /* Menggunakan 'contain' untuk memperkecil gambar */
        background-position: center; /* Memusatkan gambar */
        background-repeat: no-repeat; /* Menghindari pengulangan gambar */
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-box {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        width: 400px;
    }

    .login-logo a {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .login-card-body {
        padding: 20px;
    }

    .input-group .form-control {
        border-radius: 5px;
    }

    .btn {
        border-radius: 5px;
    }

    .social-auth-links p {
        margin: 10px 0;
    }
</style>

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
