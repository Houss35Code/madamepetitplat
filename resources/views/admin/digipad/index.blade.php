<x-admin-layout title="Padlets Digipad">

    <x-slot name="actions">
        <a href="{{ route('admin.digipad.create') }}" class="admin-btn admin-btn--primary">
            + Nouveau padlet
        </a>
    </x-slot>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>URL</th>
                    <th>Visible</th>
                    <th>Créé le</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($padlets as $padlet)
                    <tr>
                        <td><strong>{{ $padlet->titre }}</strong></td>
                        <td>
                            <a href="{{ $padlet->url }}" target="_blank" class="admin-table__link">
                                {{ Str::limit($padlet->url, 50) }}
                            </a>
                        </td>
                        <td>
                            @if ($padlet->visible)
                                <span class="admin-badge admin-badge--visible">✓ Oui</span>
                            @else
                                <span class="admin-badge admin-badge--invisible">✕ Non</span>
                            @endif
                        </td>
                        <td>{{ $padlet->created_at?->format('d/m/Y') ?? '—' }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.digipad.edit', $padlet) }}" class="admin-btn admin-btn--outline">
                                Modifier
                            </a>
                            <form method="POST" action="{{ route('admin.digipad.destroy', $padlet) }}"
                                  onsubmit="return confirm('Supprimer ce padlet ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger">✕</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="admin-empty-state">
                            Aucun padlet. <a href="{{ route('admin.digipad.create') }}">Ajoutez-en un</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>