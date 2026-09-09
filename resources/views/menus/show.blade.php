@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        <a href="{{ url('#menus') }}" class="menu-detail__back">
            ← Retour aux menus
        </a>
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        <embed
            class="menu-detail__embed"
            src="{{ asset('storage/' . $menu->fichier) }}"
            type="application/pdf"
        >
    </div>
@endsection