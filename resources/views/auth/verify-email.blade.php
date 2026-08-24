<x-guest-layout>
    <div class="auth-intro">
        Merci de votre inscription ! Avant de commencer, merci de vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer. Si vous ne l'avez pas reçu, nous pouvons vous en renvoyer un.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status">
            Un nouveau lien de vérification a été envoyé à l'adresse email fournie lors de votre inscription.
        </div>
    @endif

    <div class="auth-verify-actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Renvoyer l'email de vérification
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="auth-forgot-link">
                Se déconnecter
            </button>
        </form>
    </div>
</x-guest-layout>