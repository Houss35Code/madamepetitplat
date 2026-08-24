<x-admin-layout title="Nouveau padlet">

    <x-slot name="actions">
        <a href="{{ route('admin.digipad.index') }}" class="admin-btn admin-btn--outline">
            ← Retour aux padlets
        </a>
    </x-slot>

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.digipad.store') }}" class="admin-form">
            @csrf

            <div>
                <label class="admin-label">Titre <span class="admin-required">*</span></label>
                <input type="text" name="titre" value="{{ old('titre') }}"
                       placeholder="Ex : La cuisine japonaise"
                       class="admin-input" required>
                @error('titre')<p class="admin-form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="admin-label">URL Digipad <span class="admin-required">*</span></label>
                <input type="url" name="url" value="{{ old('url') }}"
                       placeholder="https://digipad.app/p/..."
                       class="admin-input" required>
                @error('url')<p class="admin-form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="admin-label">Description</label>
                <textarea name="description" rows="3" class="admin-input"
                          placeholder="Courte description du padlet...">{{ old('description') }}</textarea>
            </div>

            <div class="admin-checkbox-row">
                <input type="checkbox" name="visible" id="visible" value="1"
                       {{ old('visible', '1') ? 'checked' : '' }}>
                <label for="visible">
                    Visible sur le site
                </label>
            </div>

            <div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    Ajouter le padlet
                </button>
            </div>

        </form>
    </div>

</x-admin-layout>