<section class="admin-profile-section admin-profile-section--danger">
    <header class="admin-profile-section__header">
        <h2>Supprimer le compte</h2>
        <p>Une fois supprimé, toutes les données seront définitivement perdues.</p>
    </header>

    <button class="admin-btn admin-btn--danger"
        x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Supprimer le compte
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="admin-profile-form modal-form-padding">
            @csrf
            @method('delete')

            <h2 class="modal-title">Confirmer la suppression</h2>
            <p class="modal-subtitle">
                Cette action est irréversible. Entrez votre mot de passe pour confirmer.
            </p>

            <div class="admin-field">
                <label for="password" class="admin-label">Mot de passe</label>
                <input id="password" name="password" type="password" class="admin-input" placeholder="Votre mot de passe" />
                @error('password', 'userDeletion')<p class="admin-form-error">{{ $message }}</p>@enderror
            </div>

            <div class="admin-form-actions admin-form-actions--end">
                <button type="button" class="admin-btn admin-btn--outline" x-on:click="$dispatch('close')">
                    Annuler
                </button>
                <button type="submit" class="admin-btn admin-btn--danger">
                    Supprimer définitivement
                </button>
            </div>
        </form>
    </x-modal>
</section>