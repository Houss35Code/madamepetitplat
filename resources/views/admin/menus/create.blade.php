<x-admin-layout :title="isset($menu) ? 'Modifier un menu' : 'Nouveau menu'">

    <x-slot name="actions">
        <a href="{{ route('admin.menus.index') }}" class="admin-btn admin-btn--outline">
            ← Retour
        </a>
    </x-slot>

    <div class="admin-card">
        <form
            method="POST"
            action="{{ isset($menu) ? route('admin.menus.update', $menu) : route('admin.menus.store') }}"
            enctype="multipart/form-data"
        >
            @csrf
            @if (isset($menu))
                @method('PATCH')
            @endif

            <div class="admin-field">
                <label for="titre">Titre <span class="admin-required">*</span></label>
                <input type="text" id="titre" name="titre"
                    value="{{ old('titre', $menu->titre ?? '') }}"
                    placeholder="ex: Menu Mariage Prestige" required>
                @error('titre') <p class="admin-field__error">{{ $message }}</p> @enderror
            </div>

            <div class="admin-form-grid-2">
                <div class="admin-field">
                    <label for="occasion">Occasion</label>
                    <input type="text" id="occasion" name="occasion"
                        value="{{ old('occasion', $menu->occasion ?? '') }}"
                        placeholder="ex: Mariage, Chef à domicile…">
                    @error('occasion') <p class="admin-field__error">{{ $message }}</p> @enderror
                </div>

                <div class="admin-field">
                    <label for="convives">Convives</label>
                    <input type="text" id="convives" name="convives"
                        value="{{ old('convives', $menu->convives ?? '') }}"
                        placeholder="ex: 80 personnes">
                    @error('convives') <p class="admin-field__error">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="admin-form-grid-inline">
                <div class="admin-field">
                    <label for="ordre">Ordre</label>
                    <input type="number" id="ordre" name="ordre"
                        value="{{ old('ordre', $menu->ordre ?? 0) }}" min="0">
                </div>

                <label class="admin-checkbox-label">
                    <input type="checkbox" name="visible" value="1"
                        {{ old('visible', $menu->visible ?? true) ? 'checked' : '' }}>
                    Visible sur le site
                </label>
            </div>

            <div class="admin-field">
                <label for="fichier">
                    Fichier PDF {{ isset($menu) ? '(laisser vide pour conserver l\'actuel)' : '*' }}
                </label>
                <input type="file" id="fichier" name="fichier"
                    accept=".pdf" {{ isset($menu) ? '' : 'required' }}>
                @if (isset($menu))
                    <p class="admin-field__hint">
                        Fichier actuel : {{ basename($menu->fichier) }}
                    </p>
                @endif
                @error('fichier') <p class="admin-field__error">{{ $message }}</p> @enderror
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="admin-btn admin-btn--primary">
                    {{ isset($menu) ? 'Enregistrer les modifications' : 'Créer le menu' }}
                </button>
                <a href="{{ route('admin.menus.index') }}" class="admin-btn admin-btn--outline">
                    Annuler
                </a>
            </div>
        </form>
    </div>

</x-admin-layout>