<section id="menus" aria-labelledby="menus-titre">

    <div class="menus-header fade-up">
        <span class="section-label">Carte &amp; Tarifs</span>
        <h2 id="menus-titre" class="section-title">Nos <em>Menus</em></h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-intro">Des formules adaptées à chaque occasion, toujours préparées avec des produits frais de Bretagne.</p>
    </div>

    @if ($menus->isNotEmpty())
        <div class="menus-grid fade-up">
            @foreach ($menus as $menu)
                <a href="{{ route('menus.show', $menu) }}" class="menu-card" target="_blank">
                    <span class="menu-card__occasion">{{ $menu->occasion ?? 'Menu' }}</span>
                    <h3 class="menu-card__titre">{{ $menu->titre }}</h3>
                    @if ($menu->convives)
                        <span class="menu-card__convives">{{ $menu->convives }}</span>
                    @endif
                    <span class="menu-card__cta">Voir le menu →</span>
                </a>
            @endforeach
        </div>
    @else
        <div class="menus-placeholder fade-up">
            <span class="icon" aria-hidden="true">📋</span>
            <h3>Les menus arrivent bientôt !</h3>
            <p>Isabel prépare actuellement ses formules. Cette section sera complétée avec ses menus, tarifs et options dès réception. En attendant, n'hésitez pas à la contacter directement pour une proposition personnalisée.</p>
            <a href="#contact" class="btn btn-primary">Demander un devis personnalisé</a>
        </div>
    @endif

</section>
