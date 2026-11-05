<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Create a Hotel & Restaurant guest account.">
    <title>Create account | Hotel &amp; Restaurant</title>
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
                    <img src="{{ asset('images/rooms/twin-beds.jpg') }}" alt="A bright room with two separate single beds." width="1200" height="800">
                    <figcaption>
                        <span>Illustrative room photo</span>
                        <a href="https://www.pexels.com/photo/two-beds-in-a-room-with-white-walls-28054887/" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                    </figcaption>
                </figure>
                <div class="auth-visual-copy">
                    <p class="auth-visual-title">A quieter place to land.</p>
                    <p class="auth-visual-description">Compare room inspiration and common bed sizes before planning a stay.</p>
                    <a href="{{ url('/#rooms') }}">Browse the room guide <span aria-hidden="true">↗</span></a>
                </div>
            </section>

            <section class="auth-panel" aria-labelledby="register-title">
                <p class="auth-eyebrow">For your next visit</p>
                <h1 id="register-title">Create a guest account.</h1>
                <p class="auth-intro">Set up an account to get started.</p>

                <form class="auth-form" method="POST" action="{{ url('/register') }}">
                    @csrf

                    <div class="auth-field">
                        <label for="name">Full name</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                            @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif
                        >
                        @error('name')
                            <p class="auth-error" id="name-error">{{ $message }}</p>
                        @else
                            <p class="auth-field-space" aria-hidden="true"></p>
                        @enderror
                    </div>

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
                            autocomplete="new-password"
                            required
                            @if ($errors->has('password')) aria-invalid="true" aria-describedby="password-error" @endif
                        >
                        @error('password')
                            <p class="auth-error" id="password-error">{{ $message }}</p>
                        @else
                            <p class="auth-hint">Use at least 6 characters.</p>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label for="password_confirmation">Confirm password</label>
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
                        >
                        <p class="auth-field-space" aria-hidden="true"></p>
                    </div>

                    <button class="site-button site-button-primary auth-submit" type="submit">Create account</button>
                </form>

                <p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
            </section>
        </main>

        @include('partials.public-footer')
    </div>
</body>
</html>