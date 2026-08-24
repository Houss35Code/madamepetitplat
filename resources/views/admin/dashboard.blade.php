<x-admin-layout title="Tableau de bord">

    {{-- Stats --}}
    <div class="admin-stats">
        <div class="admin-stat">
            <div class="admin-stat__icon">✉</div>
            <div>
                <p class="admin-stat__label">Total devis</p>
                <p class="admin-stat__valeur">{{ $stats['devis_total'] }}</p>
            </div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__icon">🔔</div>
            <div>
                <p class="admin-stat__label">Nouveaux devis</p>
                <p class="admin-stat__valeur">{{ $stats['devis_nouveaux'] }}</p>
            </div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__icon">✓</div>
            <div>
                <p class="admin-stat__label">Devis acceptés</p>
                <p class="admin-stat__valeur">{{ $stats['devis_acceptes'] }}</p>
            </div>
        </div>
        <div class="admin-stat">
            <div class="admin-stat__icon">◉</div>
            <div>
                <p class="admin-stat__label">Clients</p>
                <p class="admin-stat__valeur">{{ $stats['clients_total'] }}</p>
            </div>
        </div>
    </div>

    {{-- Derniers devis --}}
    <div class="admin-card">
        <div class="admin-card__titre">Derniers devis reçus</div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Événement</th>
                    <th>Convives</th>
                    <th>Date événement</th>
                    <th>Statut</th>
                    <th>Reçu le</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($derniers_devis as $devis)
                    <tr>
                        <td>
                            <strong>{{ $devis->client->prenom }} {{ $devis->client->nom }}</strong><br>
                            <small class="admin-table__muted">{{ $devis->client->email }}</small>
                        </td>
                        <td>{{ $devis->type_evenement }}</td>
                        <td>{{ $devis->nb_convives }}</td>
                        <td>{{ $devis->date_evenement ? $devis->date_evenement->format('d/m/Y') : '—' }}</td>
                        <td>
                            <span class="admin-badge admin-badge--{{ $devis->statut }}">
                                {{ $devis->statut }}
                            </span>
                        </td>
                        <td>{{ $devis->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.devis.show', $devis) }}" class="admin-btn admin-btn--outline">
                                Voir
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="admin-empty-state">
                            Aucun devis reçu pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($stats['devis_total'] > 5)
            <div class="admin-table__footer-action">
                <a href="{{ route('admin.devis.index') }}" class="admin-btn admin-btn--outline">
                    Voir tous les devis →
                </a>
            </div>
        @endif
    </div>

</x-admin-layout>