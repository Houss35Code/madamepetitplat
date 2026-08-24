<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin — {{ $title ?? 'Tableau de bord' }} · Madame Petit Plat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts & styles -->
    @vite(['resources/sass/main.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="admin-wrapper">

    {{-- ── SIDEBAR ─────────────────────────────────────── --}}
    <aside class="admin-sidebar">

        <div class="admin-sidebar__brand">
            <a href="{{ route('admin.dashboard') }}">
                madame<em>petitplat</em>
            </a>
            <span class="admin-sidebar__badge">Admin</span>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav__link {{ request()->routeIs('admin.dashboard') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">◈</span>
                Tableau de bord
            </a>

            <p class="admin-nav__groupe">Contenu</p>

            <a href="{{ route('admin.devis.index') }}"
               class="admin-nav__link {{ request()->routeIs('admin.devis.*') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">✉</span>
                Devis
            </a>

            <a href="{{ route('admin.galerie.index') }}"
               class="admin-nav__link {{ request()->routeIs('admin.galerie.*') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">◎</span>
                Galerie
            </a>

            <a href="{{ route('admin.digipad.index') }}"
                class="admin-nav__link {{ request()->routeIs('admin.digipad.*') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">⊞</span>
                Padlets Digipad
            </a>

            <a href="{{ route('admin.menus.index') }}"
                class="admin-nav__link {{ request()->routeIs('admin.menus.*') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">◉</span>
                Menus
            </a>

            <p class="admin-nav__groupe">Compte</p>

            <a href="{{ route('profile.edit') }}"
               class="admin-nav__link {{ request()->routeIs('profile.*') ? 'admin-nav__link--actif' : '' }}">
                <span class="admin-nav__icon">◉</span>
                Mon profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-nav__link admin-nav__link--logout">
                    <span class="admin-nav__icon">→</span>
                    Déconnexion
                </button>
            </form>
        </nav>

        <div class="admin-sidebar__footer">
            <p>Connecté en tant que</p>
            <strong>{{ Auth::user()->name }}</strong>
        </div>

    </aside>

    {{-- ── CONTENU PRINCIPAL ───────────────────────────── --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <header class="admin-topbar">
            <div class="admin-topbar__titre">
                @isset($title)
                    <h1>{{ $title }}</h1>
                @endisset
            </div>
            <div class="admin-topbar__actions">
                @isset($actions)
                    {{ $actions }}
                @endisset
                <a href="{{ url('/') }}" class="admin-topbar__site" target="_blank">
                    Voir le site →
                </a>
            </div>
        </header>

        {{-- Alertes flash --}}
        @if (session('success'))
            <div class="admin-alert admin-alert--success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="admin-alert admin-alert--error">
                ✕ {{ session('error') }}
            </div>
        @endif

        {{-- Contenu de la page --}}
        <main class="admin-content">
            {{ $slot }}
        </main>

    </div>{{-- .admin-main --}}

</div>{{-- .admin-wrapper --}}

@stack('scripts')
</body>
</html>