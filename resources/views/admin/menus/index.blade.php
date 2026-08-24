<x-admin-layout title="Menus">

    <x-slot name="actions">
        <a href="{{ route('admin.menus.create') }}" class="admin-btn admin-btn--primary">
            + Nouveau menu
        </a>
    </x-slot>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Occasion</th>
                    <th>Convives</th>
                    <th>Ordre</th>
                    <th>Visible</th>
                    <th>Créé le</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>
                            <strong>{{ $menu->titre }}</strong><br>
                            <small class="admin-table__muted">
                                <a href="{{ route('menus.show', $menu) }}" target="_blank" class="admin-table__muted-link">
                                    /menus/{{ $menu->slug }}
                                </a>
                            </small>
                        </td>
                        <td>{{ $menu->occasion ?? '—' }}</td>
                        <td>{{ $menu->convives ?? '—' }}</td>
                        <td>{{ $menu->ordre }}</td>
                        <td>
                            @if ($menu->visible)
                                <span class="admin-badge admin-badge--visible">✓ Oui</span>
                            @else
                                <span class="admin-badge admin-badge--invisible">✕ Non</span>
                            @endif
                        </td>
                        <td>{{ $menu->created_at?->format('d/m/Y') ?? '—' }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.menus.edit', $menu) }}" class="admin-btn admin-btn--outline">
                                Modifier
                            </a>
                            <form method="POST" action="{{ route('admin.menus.destroy', $menu) }}"
                                  onsubmit="return confirm('Supprimer ce menu ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn--danger">✕</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="admin-empty-state">
                            Aucun menu. <a href="{{ route('admin.menus.create') }}">Créez-en un</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>