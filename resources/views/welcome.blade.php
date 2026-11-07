<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Browse room inspiration, sample PHP nightly rates, example stay times, and a sample restaurant menu.">
    <title>Rooms, rates &amp; menu | Hotel &amp; Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="hospitality-page guest-page">
    <a class="guest-skip-link" href="#main">Skip to content</a>

    <div class="guest-shell">
        @include('partials.public-header')

        <main id="main">
            <section class="guest-intro" aria-labelledby="welcome-title">
                <div class="guest-intro-copy">
                    <p class="guest-eyebrow">A place to stay and gather</p>
                    <h1 id="welcome-title">A room that suits your kind of stay.</h1>
                    <p class="guest-lede">
                        Explore room inspiration, example nightly rates, and a sample menu before planning your visit.
                    </p>
                    <div class="guest-intro-actions">
                        <a class="site-button site-button-primary" href="{{ url('/register') }}">Create a guest account <span aria-hidden="true">↗</span></a>
                        <a class="guest-text-link" href="#rooms">Explore the bed guide</a>
                        <a class="guest-text-link" href="#menu">Browse the menu</a>
                    </div>
                </div>

                <aside class="guest-account-note" aria-labelledby="account-note-title">
                    @guest
                        <h2 id="account-note-title">Your next stay starts here.</h2>
                        <p>Create a guest account to get started, or sign in if you already have one.</p>
                        <a class="guest-text-link" href="{{ route('login') }}">Sign in to your account <span aria-hidden="true">↗</span></a>
                    @endguest

                    @auth
                        @if (auth()->user()->role === 'guest')
                            <h2 id="account-note-title">Welcome, {{ auth()->user()->name }}.</h2>
                            <p>You are signed in and ready to explore.</p>
                        @else
                            <h2 id="account-note-title">Welcome, {{ auth()->user()->name }}.</h2>
                            <p>Open the staff dashboard to continue.</p>
                            <a class="guest-text-link" href="{{ url('/dashboard') }}">Open dashboard <span aria-hidden="true">↗</span></a>
                        @endif
                    @endauth
                </aside>
            </section>

            <section id="rooms" class="room-guide" aria-labelledby="room-guide-title">
                <div class="room-guide-heading">
                    <h2 id="room-guide-title">Room inspiration &amp; bed sizes</h2>
                </div>

                <div class="room-catalogue">
                    <article class="room-card">
                        <figure class="room-photo">
                            <img src="{{ asset('images/rooms/twin-beds.jpg') }}" alt="A bright room with two separate single beds." width="1200" height="800" loading="lazy" decoding="async">
                            <figcaption>
                                <span>Illustrative room photo</span>
                                <a href="https://www.pexels.com/photo/two-beds-in-a-room-with-white-walls-28054887/" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                            </figcaption>
                        </figure>
                        <div class="room-copy">
                            <p class="room-kind">Two separate beds</p>
                            <h3>Twin</h3>
                            <p class="room-size">38 × 75 in <span>97 × 191 cm each</span></p>
                            <p class="room-description">A twin room commonly pairs two single beds; exact mattress sizes vary by property.</p>
                        </div>
                    </article>

                    <article class="room-card">
                        <figure class="room-photo">
                            <img src="{{ asset('images/rooms/queen-room.jpg') }}" alt="A modern hotel room with a single bed and a work area." width="1200" height="798" loading="lazy" decoding="async">
                            <figcaption>
                                <span>Illustrative room photo</span>
                                <a href="https://www.pexels.com/photo/modern-hotel-room-with-minimalist-decor-31728412/" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                            </figcaption>
                        </figure>
                        <div class="room-copy">
                            <p class="room-kind">One larger bed</p>
                            <h3>Queen</h3>
                            <p class="room-size">60 × 80 in <span>152 × 203 cm</span></p>
                            <p class="room-description">A familiar two-person size, with dimensions that can differ between countries.</p>
                        </div>
                    </article>

                    <article class="room-card">
                        <figure class="room-photo">
                            <img src="{{ asset('images/rooms/king-room.jpg') }}" alt="An elegant guest room with a neatly made bed." width="1200" height="2133" loading="lazy" decoding="async">
                            <figcaption>
                                <span>Illustrative room photo</span>
                                <a href="https://www.pexels.com/photo/elegant-hotel-room-interior-with-modern-decor-36852529/" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                            </figcaption>
                        </figure>
                        <div class="room-copy">
                            <p class="room-kind">One wider bed</p>
                            <h3>King</h3>
                            <p class="room-size">76 × 80 in <span>193 × 203 cm</span></p>
                            <p class="room-description">A wider mattress for guests who prefer more sleeping space.</p>
                        </div>
                    </article>
                </div>

                <div id="stay-details" class="stay-details" aria-labelledby="stay-details-title">
                    <div class="stay-rates">
                        <div class="stay-details-heading">
                            <h3 id="stay-details-title">Example nightly rates</h3>
                            <span>PHP · per room, per night</span>
                        </div>
                        <table class="stay-rate-table">
                            <thead>
                                <tr>
                                    <th scope="col">Bed-size guide</th>
                                    <th scope="col">Example rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomRates as $roomType => $price)
                                    <tr>
                                        <th scope="row">{{ $roomType }}</th>
                                        <td>₱{{ number_format($price) }} <span>/ night</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="stay-times">
                        <div class="stay-details-heading">
                            <h3>Example stay times</h3>
                            <span>Confirm before booking</span>
                        </div>
                        <dl class="stay-time-list">
                            <div>
                                <dt>Check-in</dt>
                                <dd>{{ $checkInTime }}</dd>
                            </div>
                            <div>
                                <dt>Check-out</dt>
                                <dd>{{ $checkOutTime }}</dd>
                            </div>
                        </dl>
                    </div>
                    <p class="stay-details-note">
                        These rates and times are planning examples only. They are not confirmed room inventory, live availability, or a booking offer.
                    </p>
                </div>

                <p class="room-disclaimer">
                    Bed dimensions are approximate U.S. mattress-size references; actual room layouts and measurements vary by region and property. Confirm the exact bed setup before booking.
                </p>
                <a class="room-size-reference" href="https://www.sleepfoundation.org/mattress-sizes" target="_blank" rel="noopener noreferrer">Bed size reference ↗</a>
            </section>

            <section id="dining" class="dining-note" aria-labelledby="dining-title">
                <div class="dining-copy">
                    <p class="dining-label">At the table</p>
                    <h2 id="dining-title">A good visit includes a good meal.</h2>
                    <p>Explore the restaurant as part of your time at Hotel &amp; Restaurant.</p>
                </div>
                @guest
                    <a class="site-button site-button-primary" href="{{ url('/register') }}">Plan your visit <span aria-hidden="true">↗</span></a>
                @endguest
                @auth
                    @if (auth()->user()->role === 'guest')
                        <a class="site-button site-button-primary" href="{{ url('/#rooms') }}">Back to room guide <span aria-hidden="true">↗</span></a>
                    @else
                        <a class="site-button site-button-primary" href="{{ url('/dashboard') }}">Staff dashboard <span aria-hidden="true">↗</span></a>
                    @endif
                @endauth
            </section>

            <section id="menu" class="menu-guide" aria-labelledby="menu-title">
                <div class="menu-guide-heading">
                    <h2 id="menu-title">A sample menu for lingering.</h2>
                </div>

                <div class="menu-sections">
                    @foreach ($menuSections as $section)
                        <article class="menu-course">
                            <figure class="menu-photo">
                                <img src="{{ asset($section['image']) }}" alt="{{ $section['alt'] }}" width="1200" height="1800" loading="lazy" decoding="async">
                                <figcaption>
                                    <span>Illustrative food photo</span>
                                    <a href="{{ $section['source'] }}" target="_blank" rel="noopener noreferrer">Photo: Pexels ↗</a>
                                </figcaption>
                            </figure>
                            <div class="menu-course-copy">
                                <h3>{{ $section['title'] }}</h3>
                                <ul class="menu-item-list">
                                    @foreach ($section['items'] as $item)
                                        <li class="menu-item">
                                            <div class="menu-item-copy">
                                                <h4>{{ $item['name'] }}</h4>
                                                <p>{{ $item['description'] }}</p>
                                            </div>
                                            <p class="menu-price">₱{{ number_format($item['price']) }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </div>

                <p class="menu-disclaimer">
                    Menu items, descriptions, prices, and photos are examples only, not confirmed restaurant offerings or a live ordering menu. Please confirm current details with the property.
                </p>
            </section>
        </main>

        @include('partials.public-footer')
    </div>
</body>
</html>
