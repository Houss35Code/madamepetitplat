<section class="admin-profile-section">
    <header class="admin-profile-section__header">
        <h2>Modifier le mot de passe</h2>
        <p>Utilisez un mot de passe long et aléatoire pour sécuriser votre compte.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="admin-profile-form">
        @csrf
        @method('put')

        <div class="admin-field">
            <label for="update_password_current_password" class="admin-label">Mot de passe actuel</label>
            <input id="update_password_current_password" name="current_password" type="password" class="admin-input" autocomplete="current-password" />
            @error('current_password', 'updatePassword')<p class="admin-form-error">{{ $message }}</p>@enderror
        </div>

        <div class="admin-field">
            <label for="update_password_password" class="admin-label">Nouveau mot de passe</label>
            <input id="update_password_password" name="password" type="password" class="admin-input" autocomplete="new-password" />
            @error('password', 'updatePassword')<p class="admin-form-error">{{ $message }}</p>@enderror
        </div>

        <div class="admin-field">
            <label for="update_password_password_confirmation" class="admin-label">Confirmer le mot de passe</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="admin-input" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')<p class="admin-form-error">{{ $message }}</p>@enderror
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn admin-btn--primary">Enregistrer</button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="admin-form-success">Enregistré.</p>
            @endif
        </div>
    </form>
</section>