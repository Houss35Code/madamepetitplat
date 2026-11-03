@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail">
        <div class="menu-detail__actions mb-4">
            <a href="{{ route('home') }}#menus" class="menu-detail__back">
                ← Retour aux menus
            </a>
        </div>
        
        <h1 class="menu-detail__title">
            {{ $menu->titre }}
        </h1>
        
        {{-- Bouton d'accès direct mobile/desktop de secours ultra-fiable --}}
        <div class="menu-detail__mobile-fallback mb-6 text-center" style="display: none;">
            <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="btn btn-primary">
                Ouvrir le menu PDF en plein écran 📄
            </a>
        </div>

        {{-- Intégration propre avec conteneur responsive --}}
        <div class="menu-pdf-wrapper">
            <object
                class="menu-detail__embed"
                data="{{ asset('storage/' . $menu->fichier) }}"
                type="application/pdf"
                width="100%"
                height="700px"
            >
                <div class="p-6 bg-amber-50 rounded-lg text-center border border-amber-200">
                    <p class="mb-4 text-gray-700">Votre navigateur ne peut pas afficher directement ce PDF.</p>
                    <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="btn btn-primary">
                        Télécharger / Ouvrir le PDF
                    </a>
                </div>
            </object>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Ajustement mobile pour éviter les hauteurs fixes excessives et les bugs de superposition */
    @media (max-width: 768px) {
        .menu-detail__embed {
            height: 500px !important;
        }
        .menu-detail__mobile-fallback {
            display: block !important;
        }
    }
</style>
@endpush