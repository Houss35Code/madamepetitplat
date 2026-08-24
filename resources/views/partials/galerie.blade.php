@php
    $photos = \App\Models\Galerie::where('visible', true)->orderBy('ordre')->get();
@endphp

<section id="galerie" aria-labelledby="galerie-titre">

    <div class="galerie-header fade-up">
        <span class="section-label">Réalisations</span>
        <h2 id="galerie-titre" class="section-title">La galerie <em>gourmande</em></h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-intro">Un aperçu de mes créations. Chaque assiette est préparée avec amour et authenticité.</p>
    </div>

    <div class="galerie-grid fade-up" role="list" aria-label="Galerie photos">
        @forelse ($photos as $photo)
            <div class="galerie-item" role="listitem">
                <img src="{{ asset('storage/' . $photo->chemin) }}"
                     alt="{{ $photo->alt ?? 'Réalisation Madame Petit Plat' }}"
                     loading="lazy">
            </div>
        @empty
            <div class="galerie-item" role="listitem">
                <span class="icon" aria-hidden="true">📸</span>
                <span class="sr-only">Photos à venir</span>
            </div>
        @endforelse
    </div>

    <p class="galerie-note">madamepetitplat - Isabel LOISEL</p>

</section>