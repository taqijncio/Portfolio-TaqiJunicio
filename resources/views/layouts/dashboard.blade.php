<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Admin')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header class="dash-bar">
    <div class="nav-inner">
      <a href="{{ route('dashboard') }}" class="brand">Dashboard Admin</a>
      <div class="dash-user">
        <span>{{ auth()->user()->email }}</span>
        <a href="{{ route('home') }}" class="btn btn-gray btn-sm">Lihat Website</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
      </div>
    </div>
  </header>

  <main class="dash-main">
    @yield('content')
  </main>
</body>
</html>
