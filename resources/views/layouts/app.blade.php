<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Hotel & Restaurant</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="sidebar">
        <h2>Hotel & Resto</h2>
        <a href="/dashboard">Dashboard</a>
        <a href="/rooms">Rooms</a>
        <a href="/reservations">Reservations</a>
        <a href="/menu">Menu</a>
        <a href="/orders">Orders</a>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="content">
        <div class="topbar">
            Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role }})
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>