@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        <div class="menu-detail__navigation">
            <a href="{{ route('home') }}#menus" class="menu-detail__back-link">
                ← Retour aux menus
            </a>
        </div>
        
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        
        <div class="menu-detail__actions">
            {{-- S'ouvre dans le même onglet sur PC pour une navigation fluide --}}
            <a href="{{ asset('storage/' . $menu->fichier) }}" class="btn btn-primary">
                Consulter le menu
            </a>
            
            {{-- Téléchargement direct --}}
            <a href="{{ asset('storage/' . $menu->fichier) }}" download class="btn btn-outline">
                Télécharger le PDF
            </a>
        </div>
    </div>
@endsection