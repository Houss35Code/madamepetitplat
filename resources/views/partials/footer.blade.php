<footer role="contentinfo">

    <div class="footer-logo" aria-label="Madame Petit Plat">
        madame<em>petitplat</em>
    </div>

    <p class="footer-slogan">« Le plaisir de la cuisine partagée. »</p>

    <nav class="footer-links" aria-label="Liens du pied de page">
        <a href="{{ route('home') }}#apropos">À propos</a>
        <a href="{{ route('home') }}#prestations">Prestations</a>
        <a href="{{ route('home') }}#galerie">Galerie</a>
        <a href="{{ route('home') }}#menus">Menus</a>
        <a href="{{ url('/#bandeau-ailes') }}">✦ Donne-moi des ailes</a>
        <a href="{{ route('home') }}#contact">Contact</a>
    </nav>

    <p class="footer-copy">
        &copy; {{ date('Y') }} Isabel LOISEL — Madame Petit Plat &middot; Rennes, Bretagne &middot; Tous droits réservés
    </p>

</footer>