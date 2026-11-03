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
                👁️ Ouvrir en grand
            </a>
            
            <a href="{{ asset('storage/' . $menu->fichier) }}" download class="btn btn-outline">
                📥 Télécharger le PDF
            </a>
        </div>

        <div class="menu-detail__pdf-container">
            <iframe 
                src="{{ asset('storage/' . $menu->fichier) }}" 
                width="100%" 
                height="700px" 
                class="menu-detail__iframe"
            >
                <div class="menu-detail__fallback">
                    <p>Votre navigateur ne peut pas afficher directement ce PDF.</p>
                    <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank">
                        Cliquez ici pour l'ouvrir
                    </a>
                </div>
            </iframe>
        </div>
    </div>
@endsection