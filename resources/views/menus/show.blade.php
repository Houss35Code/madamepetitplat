@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        <div class="menu-detail__navigation">
            <a href="javascript:history.back()" class="menu-detail__back-link">
                ← Retour aux menus
            </a>
        </div>
        
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        
        <div class="menu-detail__actions">
            <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="btn btn-primary">
                Consulter / Télécharger le menu (PDF)
            </a>
        </div>
    </div>
@endsection