@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        {{-- Lien de retour en arrière vers la page précédente (évite les bugs d'ancre) --}}
        <div class="menu-detail__actions">
            <a href="javascript:history.back()" class="menu-detail__back">
                ← Retour aux menus
            </a>
        </div>
        
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        
        {{-- Bloc propre pour consulter ou ouvrir le PDF sans iframe bloquante --}}
        <div class="menu-detail__content">
            <p>Votre navigateur ne peut pas afficher directement ce PDF.</p>
            <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="btn btn-primary">
                Télécharger / Ouvrir le PDF
            </a>
        </div>
    </div>
@endsection