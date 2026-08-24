<x-admin-layout title="Modifier le padlet">

    <x-slot name="actions">
        <a href="{{ route('admin.digipad.index') }}" class="admin-btn admin-btn--outline">
            ← Retour aux padlets
        </a>
    </x-slot>

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.digipad.update', $digipad) }}" class="admin-form">
            @csrf
            @method('PUT')

            <div>
                <label class="admin-label">Titre <span class="admin-required">*</span></label>
                <input type="text" name="titre" value="{{ old('titre', $digipad->titre) }}"
                       class="admin-input" required>
                @error('titre')<p class="admin-form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="admin-label">URL Digipad <span class="admin-required">*</span></label>
                <input type="url" name="url" value="{{ old('url', $digipad->url) }}"
                       class="admin-input" required>
                @error('url')<p class="admin-form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="admin-label">Description</label>
                <textarea name="description" rows="3" class="admin-input">{{ old('description', $digipad->description) }}</textarea>
            </div>

            <div class="admin-checkbox-row">
                <input type="checkbox" name="visible" id="visible" value="1"
                       {{ old('visible', $digipad->visible) ? 'checked' : '' }}>
                <label for="visible">
                    Visible sur le site
                </label>
            </div>

            <div class="admin-form-inline">
                <button type="submit" class="admin-btn admin-btn--primary">
                    Enregistrer
                </button>
                <form method="POST" action="{{ route('admin.digipad.destroy', $digipad) }}"
                      onsubmit="return confirm('Supprimer ce padlet ?')" class="admin-form-inline__nested">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn--danger">Supprimer</button>
                </form>
            </div>

        </form>
    </div>

</x-admin-layout>