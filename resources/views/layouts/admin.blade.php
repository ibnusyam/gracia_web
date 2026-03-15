<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmin - PT. Gracia Pharmindo</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .main-content { min-height: 80vh; padding: 30px 0; }
        footer { background: #fff; padding: 20px 0; border-top: 1px solid #dee2e6; color: #6c757d; }
        
        /* --- Navbar Custom Area --- */
        .navbar-custom { background-color: #ffffff; border-radius: 0; border: none; border-bottom: 1px solid #eaebf0; margin-bottom: 0; height: 70px; display: flex; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .container-nav { width: 100%; padding: 0 30px; display: flex; justify-content: space-between; align-items: center; }
        
        .brand-wrapper { display: flex; align-items: center; text-decoration: none !important; }
        .brand-icon { background-color: #3b5bdb; color: #ffffff; padding: 8px 12px; border-radius: 8px; font-size: 18px; margin-right: 12px; }
        .brand-text-dark { color: #2d3748; font-weight: 800; font-size: 18px; }
        
        .nav-right-area { display: flex; align-items: center; }
        .user-profile { display: flex; align-items: center; margin-right: 20px; }
        .user-info-text { text-align: right; margin-right: 12px; line-height: 1.2; }
        .user-name { color: #2d3748; font-weight: 700; font-size: 14px; text-transform: capitalize; }
        .user-role { color: #5c7cfa; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
        .user-avatar { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; }
        
        .divider-vertical { width: 1px; height: 35px; background-color: #e2e8f0; margin-right: 20px; }
        
        .btn-logout-custom { display: flex; align-items: center; border: 1px solid #e2e8f0; color: #4a5568; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 600; background: #fff; transition: all 0.2s ease; text-decoration: none !important; }
        .btn-logout-custom i { margin-right: 8px; color: #a0aec0; font-size: 14px; }
        .btn-logout-custom:hover { background: #f7fafc; border-color: #cbd5e0; color: #2d3748; }
    </style>

    @yield('styles')

</head>
<body>

<nav class="navbar navbar-custom">
    <div class="container-nav">
        
        <a href="#" class="brand-wrapper">
            <div class="brand-icon">
                <i class="fa fa-flask"></i> 
            </div>
            <div>
                <span class="brand-text-dark">PT. Gracia Pharmindo</span>
            </div>
        </a>
        
        <div class="nav-right-area">
            <div class="user-profile">
                <div class="user-info-text">
                    <div class="user-name">{{ Auth::user()->username }}</div>
                    <div class="user-role">{{ Auth::user()->level }}</div>
                </div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=e2e8f0&color=2d3748&bold=true" alt="Avatar" class="user-avatar">
            </div>

            <div class="divider-vertical"></div>

            <a href="#" class="btn-logout-custom" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout
            </a>
            
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>

<div class="main-content">
    <div class="container">
        @yield('content')
    </div>
</div>

<footer class="text-center">
    <div class="container">
        <p>&copy; {{ date('Y') }} <strong>PT. Gracia Pharmindo</strong>. All rights reserved.</p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@yield('scripts')

</body>
</html>