@extends('layouts.app')

@section('title', 'Madame Petit Plat — Traiteur & Chef à Domicile · Rennes')
@section('description', 'Isabel LOISEL, traiteur et cheffe à domicile à Rennes et alentours. Produits frais, de saison, fait maison. Anniversaires, mariages, séminaires.')

@section('content')
    @include('partials.hero')
    @include('partials.apropos')
    @include('partials.prestations')
    @include('partials.galerie')
    @include('partials.menus')
    @include('partials.bandeau-ailes')
    @include('partials.contact')
@endsection