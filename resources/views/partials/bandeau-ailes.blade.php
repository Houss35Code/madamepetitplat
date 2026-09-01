<div id="bandeau-ailes" class="fade-up" role="complementary" aria-label="Espace pédagogique Donne-moi des ailes">

    <div class="bandeau-content">
        <span class="section-label">Un autre univers d'Isabel</span>
        <h2>✦ Donne-moi,<br><em>des ailes</em></h2>
        <p>Au-delà des assiettes, Isabel partage sa vocation d'enseignante. Découvrez ses activités pédagogiques, ses expérimentations en classe et sa passion pour transmettre les arts de la table à la nouvelle génération.</p>

        @if ($padlets->isNotEmpty())
            <div class="peda-fiches__grille">
                @foreach ($padlets as $padlet)
                    <a href="{{ $padlet->url }}" target="_blank" rel="noopener" class="peda-padlet">
                        <h3 class="peda-padlet__titre">{{ $padlet->titre }}</h3>
                        @if ($padlet->description)
                            <p class="peda-padlet__desc">{{ $padlet->description }}</p>
                        @endif
                        <span class="peda-padlet__cta">Ouvrir le padlet →</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

</div>