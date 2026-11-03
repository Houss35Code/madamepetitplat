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
        
        {{-- Le bloc simple avec le bouton de téléchargement / ouverture direct --}}
        <div class="p-8 bg-amber-50/50 rounded-xl text-center border border-amber-200 shadow-sm">
            <p class="text-gray-700 mb-6 font-medium">Votre navigateur ne peut pas afficher directement ce PDF.</p>
            <a href="{{ asset('storage/' . $menu->fichier) }}" target="_blank" class="inline-block px-8 py-4 bg-[#8b1e24] text-white font-medium rounded-lg shadow hover:bg-[#72181d] transition">
                Télécharger / Ouvrir le PDF
            </a>
        </div>
    </div>
@endsection