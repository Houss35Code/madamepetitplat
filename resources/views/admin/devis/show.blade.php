<x-admin-layout title="Devis #{{ $devis->id }}">

    <x-slot name="actions">
        <a href="{{ route('admin.devis.index') }}" class="admin-btn admin-btn--outline">
            ← Retour aux devis
        </a>
    </x-slot>

    <div class="admin-detail-grid">

        {{-- Informations client --}}
        <div class="admin-card">
            <div class="admin-card__titre">Client</div>
            <table class="admin-table">
                <tr><td><strong>Prénom</strong></td><td>{{ $devis->client?->prenom ?? '—' }}</td></tr>
                <tr><td><strong>Nom</strong></td><td>{{ $devis->client?->nom ?? '—' }}</td></tr>
                <tr><td><strong>Email</strong></td><td>
                    @if($devis->client?->email)
                        <a href="mailto:{{ $devis->client->email }}">{{ $devis->client->email }}</a>
                    @else
                        —
                    @endif
                </td></tr>
                <tr><td><strong>Téléphone</strong></td><td>{{ $devis->client?->telephone ?? '—' }}</td></tr>
            </table>
        </div>

        {{-- Informations devis --}}
        <div class="admin-card">
            <div class="admin-card__titre">Détails du devis</div>
            <table class="admin-table">
                <tr><td><strong>Événement</strong></td><td>{{ $devis->type_evenement }}</td></tr>
                <tr><td><strong>Convives</strong></td><td>{{ $devis->nb_convives }}</td></tr>
                <tr><td><strong>Date</strong></td><td>{{ $devis->date_evenement ? $devis->date_evenement->format('d/m/Y') : '—' }}</td></tr>
                <tr><td><strong>Reçu le</strong></td><td>{{ $devis->created_at?->format('d/m/Y à H:i') ?? '—' }}</td></tr>
                <tr>
                    <td><strong>Statut</strong></td>
                    <td>
                        <span class="admin-badge admin-badge--{{ $devis->statut }}">
                            {{ $devis->statut }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        {{-- Message --}}
        @if ($devis->message)
            <div class="admin-card admin-detail-grid__full">
                <div class="admin-card__titre">Message</div>
                <p class="admin-message-text">
                    {{ $devis->message }}
                </p>
            </div>
        @endif

        {{-- Changer le statut --}}
        <div class="admin-card admin-detail-grid__full">
            <div class="admin-card__titre">Changer le statut</div>
            <form method="POST" action="{{ route('admin.devis.update', $devis->id) }}" class="admin-form-inline">
                @csrf
                @method('PATCH')
                <select name="statut" class="admin-select">
                    <option value="nouveau"  {{ $devis->statut === 'nouveau'  ? 'selected' : '' }}>Nouveau</option>
                    <option value="en_cours" {{ $devis->statut === 'en_cours' ? 'selected' : '' }}>En cours</option>
                    <option value="accepte"  {{ $devis->statut === 'accepte'  ? 'selected' : '' }}>Accepté</option>
                    <option value="refuse"   {{ $devis->statut === 'refuse'   ? 'selected' : '' }}>Refusé</option>
                </select>
                <button type="submit" class="admin-btn admin-btn--primary">
                    Enregistrer
                </button>
            </form>
        </div>

    </div>

    {{-- Supprimer --}}
    <div class="admin-section-spacer">
        <form method="POST" action="{{ route('admin.devis.destroy', $devis->id) }}"
              onsubmit="return confirm('Supprimer définitivement ce devis ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="admin-btn admin-btn--danger">
                Supprimer ce devis
            </button>
        </form>
    </div>

</x-admin-layout>