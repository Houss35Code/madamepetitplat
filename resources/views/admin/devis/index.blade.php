<x-admin-layout title="Devis">

    <x-slot name="actions">
        <span class="admin-topbar__count">{{ $devis->total() }} devis au total</span>
    </x-slot>

    <div class="admin-card">
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
                @forelse ($devis as $d)
                    <tr>
                        <td>
                            <strong>{{ $d->client?->prenom }} {{ $d->client?->nom }}</strong><br>
                            <small class="admin-table__muted">{{ $d->client?->email }}</small>
                        </td>
                        <td>{{ $d->type_evenement }}</td>
                        <td>{{ $d->nb_convives }}</td>
                        <td>{{ $d->date_evenement ? $d->date_evenement->format('d/m/Y') : '—' }}</td>
                        <td>
                            <span class="admin-badge admin-badge--{{ $d->statut }}">
                                {{ $d->statut }}
                            </span>
                        </td>
                        <td>{{ $d->created_at?->format('d/m/Y') ?? '—' }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.devis.show', ['id' => $d->id]) }}" class="admin-btn admin-btn--outline">
                                Voir
                            </a>
                            <form method="POST" action="{{ route('admin.devis.destroy', ['id' => $d->id]) }}"
                                  onsubmit="return confirm('Supprimer ce devis ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger">✕</button>
                            </form>
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

        <div class="admin-pagination">
            {{ $devis->links() }}
        </div>
    </div>

</x-admin-layout>