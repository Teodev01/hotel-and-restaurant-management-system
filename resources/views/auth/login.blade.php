<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign in to your Hotel & Restaurant guest account.">
    <title>Sign in | Hotel &amp; Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hospitality.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="hospitality-page">
    <a class="guest-skip-link" href="#main">Skip to content</a>

    <div class="guest-shell">
        @include('partials.public-header')

        <main id="main" class="auth-shell">
            <section class="auth-visual" aria-label="Room inspiration">
                <figure class="auth-photo">
                    <img src="{{ asset('images/rooms/queen-room.jpg') }}" alt="A modern guest room with a single bed and work area." width="1200" height="798">
                    <figcaption>
                        <span>Illustrative room photo</span>
                        <a href="https://www.pexels.com/photo/modern-hotel-room-with-minimalist-decor-31728412/" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                    </figcaption>
                </figure>
                <div class="auth-visual-copy">
                    <p class="auth-visual-title">A quieter place to land.</p>
                    <p class="auth-visual-description">Compare room inspiration and common bed sizes before planning a stay.</p>
                    <a href="{{ url('/#rooms') }}">Browse the room guide <span aria-hidden="true">↗</span></a>
                </div>
            </section>

            <section class="auth-panel" aria-labelledby="login-title">
                <p class="auth-eyebrow">Guest account</p>
                <h1 id="login-title">Welcome back.</h1>
                <p class="auth-intro">Sign in to continue to your account.</p>

                @if (session('error'))
                    <p class="auth-alert" role="alert">{{ session('error') }}</p>
                @endif

                <form class="auth-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth-field">
                        <label for="email">Email address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif
                        >
                        @error('email')
                            <p class="auth-error" id="email-error">{{ $message }}</p>
                        @else
                            <p class="auth-field-space" aria-hidden="true"></p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            required
                            @if ($errors->has('password')) aria-invalid="true" aria-describedby="password-error" @endif
                        >
                        @error('password')
                            <p class="auth-error" id="password-error">{{ $message }}</p>
                        @else
                            <p class="auth-field-space" aria-hidden="true"></p>
                        @enderror
                    </div>

                    <button class="site-button site-button-primary auth-submit" type="submit">Sign in</button>
                </form>

                <p class="auth-switch">New here? <a href="{{ url('/register') }}">Create account</a>.</p>
            </section>
        </main>

        @include('partials.public-footer')
    </div>
</body>
</html>