@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        <a href="https://trailbreizh.alwaysdata.net/madamepetitplat/#menus" class="menu-detail__back" style="position: relative; z-index: 100; display: inline-block;">
            ← Retour aux menus
        </a>
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        <iframe
            class="menu-detail__embed"
            src="{{ asset('storage/' . $menu->fichier) }}"
            type="application/pdf"
            style="width: 100%; height: 800px; border: none;"
        ></iframe>
    </div>
@endsection