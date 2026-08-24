<x-admin-layout title="Galerie">

    {{-- Formulaire upload --}}
    <div class="admin-card">
        <div class="admin-card__titre">Ajouter des photos</div>
        <form method="POST" action="{{ route('admin.galerie.store') }}"
              enctype="multipart/form-data"
              class="admin-form">
            @csrf

            <div class="admin-form-grid-2">
                <div class="admin-field">
                    <label>Photos <span class="admin-required">*</span></label>
                    <input type="file" name="photos[]" multiple accept="image/*" class="admin-input">
                    <p class="admin-field__hint">JPG, PNG, WEBP — max 4Mo par photo</p>
                </div>
                <div class="admin-field">
                    <label>Texte alternatif (SEO)</label>
                    <input type="text" name="alt" placeholder="Description de la photo..." class="admin-input">
                </div>
            </div>

            <div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    ↑ Uploader les photos
                </button>
            </div>
        </form>
    </div>

    {{-- Grille des photos --}}
    <div class="admin-card">
        <div class="admin-card__titre">Photos en ligne ({{ $photos->count() }})</div>

        @if ($photos->isEmpty())
            <p class="admin-empty-state">
                Aucune photo pour le moment. Ajoutez-en ci-dessus.
            </p>
        @else
            <div class="galerie-admin-grid">
                @foreach ($photos as $photo)
                    <div class="galerie-admin-item">
                        <img src="{{ asset('storage/' . $photo->chemin) }}"
                             alt="{{ $photo->alt ?? 'Photo galerie' }}"
                             loading="lazy">
                        <div class="galerie-admin-overlay">
                            <form method="POST"
                                  action="{{ route('admin.galerie.destroy', $photo->id) }}"
                                  onsubmit="return confirm('Supprimer cette photo ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger">
                                    ✕ Supprimer
                                </button>
                            </form>
                        </div>
                        @if ($photo->alt)
                            <p class="galerie-admin-alt">{{ $photo->alt }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-admin-layout>