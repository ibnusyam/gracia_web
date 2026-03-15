<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT. Gracia Pharmindo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 15px;
        }
        .login-card {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
        }
        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 65px;
            height: 65px;
            background-color: #3b5bdb;
            color: #ffffff;
            border-radius: 16px;
            font-size: 30px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(59, 91, 219, 0.2);
        }
        .brand-title {
            color: #1e293b;
            font-weight: 800;
            font-size: 22px;
            margin: 0 0 5px 0;
        }
        .brand-subtitle {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }
        .form-group label {
            color: #475569;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 8px;
        }
        .form-control {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            box-shadow: none;
            transition: all 0.2s;
            font-size: 14px;
        }
        .form-control:focus {
            border-color: #3b5bdb;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.1);
        }
        .btn-login {
            background-color: #f97316;
            color: white;
            height: 48px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            border: none;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
        }
        .btn-login:hover {
            background-color: #ea580c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(249, 115, 22, 0.3);
        }
        .alert-custom {
            border-radius: 8px;
            font-size: 13px;
            border: 1px solid #fecaca;
            background-color: #fef2f2;
            color: #ef4444;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #94a3b8;
            font-size: 13px;
            text-decoration: none;
            transition: 0.2s;
        }
        .back-link:hover {
            color: #3b5bdb;
            text-decoration: none;
        }
        .footer-text {
            text-align: center;
            margin-top: 30px;
            color: #94a3b8;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        
        <div class="brand-header">
            <div class="brand-icon">
                <i class="fa fa-flask"></i>
            </div>
            <h2 class="brand-title">PT. Gracia Pharmindo</h2>
            <p class="brand-subtitle">Silakan masuk ke akun Anda</p>
        </div>

        {{-- Pesan Error --}}
        @if(session('login_failed'))
            <div class="alert alert-custom">
                <i class="fa fa-exclamation-circle" style="margin-right: 5px;"></i> {!! session('login_failed') !!}
            </div>
        @endif

        <form method="POST" action="{{ url('/login/proses') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group" style="width: 100%;">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required autofocus value="{{ old('username') }}">
                </div>
                @error('username')
                    <span class="text-danger small" style="margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="password">Password</label>
                <div class="input-group" style="width: 100%;">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                @error('password')
                    <span class="text-danger small" style="margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                Login Sekarang
            </button>
        </form>

        <div class="text-center">
            <a href="{{ url('/') }}" class="back-link">&larr; Kembali ke Beranda</a>
        </div>
    </div>
    
    <div class="footer-text">
        &copy; {{ date('Y') }} PT. Gracia Pharmindo. All rights reserved.
    </div>
</div>

</body>
</html>