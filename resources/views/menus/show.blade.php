<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $menu->titre }} — Madame Petit Plat</title>
    @vite(['resources/sass/main.scss'])
</head>
<body>
    <div class="menu-detail">
        <a href="{{ url('/#menus') }}" class="menu-detail__back">
            ← Retour aux menus
        </a>
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        <embed
            class="menu-detail__embed"
            src="{{ Storage::url($menu->fichier) }}"
            type="application/pdf"
        >
    </div>
</body>
</html>