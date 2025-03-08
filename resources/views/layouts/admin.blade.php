<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        a {
            text-decoration: none;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>پنل مدیریت</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">داشبورد</a>
            <a href="{{ route('admin.posts.index') }}">مدیریت پست‌ها</a>
            <a href="{{ route('admin.products.index') }}">مدیریت محصولات</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                خروج
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        <hr>
        @yield('content')
    </div>
</body>
</html>
