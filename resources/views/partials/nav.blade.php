<nav id="navbar" role="navigation" aria-label="Navigation principale">

    {{-- LOGO --}}
    <a href="{{ route('home') }}" class="nav-logo" aria-label="Madame Petit Plat — accueil">
        madame<span>petitplat</span>
    </a>

    {{-- LIENS --}}
    <ul class="nav-links" id="navLinks" role="list">
        <li><a href="{{ route('home') }}#apropos">À propos</a></li>
        <li><a href="{{ route('home') }}#prestations">Prestations</a></li>
        <li><a href="{{ route('home') }}#galerie">Galerie</a></li>
        <li><a href="{{ route('home') }}#menus">Menus</a></li>
        <li>
            <a href="{{ url('/#bandeau-ailes') }}" class="nav-ailes">
                ✦ Donne-moi des ailes
            </a>
        </li>
        @auth
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-admin">
                Admin
            </a>
        </li>
        @else
        <li>
            <a href="{{ route('login') }}" class="nav-admin">
                Connexion
            </a>
        </li>
        @endauth
        <li>
            <a href="{{ route('home') }}#contact" class="nav-cta">
                Devis
            </a>
        </li>
    </ul>

    {{-- HAMBURGER MOBILE --}}
    <button
        class="hamburger"
        id="hamburger"
        aria-controls="navLinks"
        aria-expanded="false"
        aria-label="Ouvrir le menu"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>

</nav>