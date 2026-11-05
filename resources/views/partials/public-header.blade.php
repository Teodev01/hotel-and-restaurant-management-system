<header class="site-header">
    <a class="site-brand" href="{{ url('/') }}" aria-label="Hotel & Restaurant home">
        <span>Hotel</span>
        <span class="site-brand-detail">&amp; Restaurant</span>
    </a>

    <nav class="site-nav" aria-label="Main navigation">
        <a href="{{ url('/#rooms') }}">Rooms</a>
        <a href="{{ url('/#stay-details') }}">Stay details</a>
        <a href="{{ url('/#menu') }}">Menu</a>
    </nav>

    <div class="site-header-action">
        @guest
            @if (request()->routeIs('login'))
                <a class="site-header-cta" href="{{ url('/register') }}">Create account <span aria-hidden="true">↗</span></a>
            @else
                <a class="site-header-cta" href="{{ route('login') }}">Sign in <span aria-hidden="true">↗</span></a>
            @endif
        @endguest

        @auth
            @if (auth()->user()->role === 'guest')
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button class="site-header-cta" type="submit">Sign out</button>
                </form>
            @else
                <a class="site-header-cta" href="{{ url('/dashboard') }}">Staff dashboard <span aria-hidden="true">↗</span></a>
            @endif
        @endauth
    </div>
</header>
