@extends('layouts.app')

@section('content')

{{-- HERO ──────────────────────────────────────────────────── --}}
<section id="ailes-hero" class="peda-hero">
    <div class="peda-hero__inner fade-up">
        <span class="section-label">Un autre univers d'Isabel</span>
        <h1 class="peda-hero__title">✦ Donne-moi,<br><em>des ailes</em></h1>
        <p class="peda-hero__intro">Au-delà des assiettes, Isabel partage sa vocation d'enseignante. Découvrez ses activités pédagogiques, ses expérimentations en classe et sa passion pour transmettre les arts de la table à la nouvelle génération.</p>
    </div>
</section>

@push('scripts')
<script>
    document.getElementById('navbar').classList.add('navbar--dark');
</script>
@endpush

{{-- PADLETS ─────────────────────────────────────────────────── --}}
<section id="padlets" class="padlets-section">
    <div class="padlets-header fade-up">
        <span class="section-label">Ressources pédagogiques</span>
        <h2 class="section-title">Mes <em>Padlets</em></h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-intro">Des ressources numériques collaboratives pour accompagner mes élèves au quotidien.</p>
    </div>

    @if ($padlets->isNotEmpty())
        <div class="peda-fiches__grille fade-up">
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
    @else
        <div class="menus-placeholder fade-up">
            <span class="icon" aria-hidden="true">⊞</span>
            <h3>Des padlets arrivent bientôt !</h3>
            <p>Isabel prépare actuellement ses ressources pédagogiques.</p>
        </div>
    @endif
</section>

@endsection