@extends('layouts.app')

@section('title', $menu->titre . ' — Madame Petit Plat')
@section('description', 'Consultez la carte et le détail du menu ' . $menu->titre . ' de Madame Petit Plat, traiteur à Rennes.')

@section('content')
    <div class="menu-detail py-8 px-4 max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('home') }}#menus" class="inline-flex items-center text-sm font-medium text-amber-900 hover:underline">
                ← Retour aux menus
            </a>
        </div>
        
        <h1 class="text-3xl font-bold mb-6 text-gray-900">
            {{ $menu->titre }}
        </h1>
        
        {{-- Boutons d'actions principaux --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-8">
            <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="px-6 py-4 bg-amber-900 text-white font-medium rounded-lg shadow hover:bg-amber-800 transition text-center flex items-center justify-center gap-2">
                👁️ Consulter le menu (Plein écran)
            </a>
            
            <a href="{{ asset('storage/' . $menu->fichier) }}" download class="px-6 py-4 bg-white text-amber-900 border-2 border-amber-900 font-medium rounded-lg shadow-sm hover:bg-amber-50 transition text-center flex items-center justify-center gap-2">
                📥 Télécharger le PDF
            </a>
        </div>

        {{-- L'iframe est rendue UNIQUEMENT sur les écrans de type ordinateur (Desktop) pour ne jamais polluer le DOM mobile --}}
        @desktop
        <div class="menu-pdf-wrapper bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <iframe 
                src="{{ asset('storage/' . $menu->fichier) }}" 
                width="100%" 
                height="700px" 
                class="w-full border-0"
            ></iframe>
        </div>
        @enddesktop
    </div>
@endsection