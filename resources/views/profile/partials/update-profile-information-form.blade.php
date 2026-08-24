<section class="admin-profile-section">
    <header class="admin-profile-section__header">
        <h2>Informations du profil</h2>
        <p>Mettez à jour le nom et l'adresse e-mail de votre compte.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="admin-profile-form">
        @csrf
        @method('patch')

        <div class="admin-field">
            <label for="name" class="admin-label">Nom</label>
            <input id="name" name="name" type="text" class="admin-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')<p class="admin-form-error">{{ $message }}</p>@enderror
        </div>

        <div class="admin-field">
            <label for="email" class="admin-label">Adresse e-mail</label>
            <input id="email" name="email" type="email" class="admin-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')<p class="admin-form-error">{{ $message }}</p>@enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="admin-form-notice">
                    Votre adresse e-mail n'est pas vérifiée.
                    <button form="send-verification" class="admin-link">
                        Renvoyer l'e-mail de vérification.
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <p class="admin-form-success">Un nouveau lien de vérification a été envoyé.</p>
                @endif
            @endif
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn admin-btn--primary">Enregistrer</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="admin-form-success">Enregistré.</p>
            @endif
        </div>
    </form>
</section>