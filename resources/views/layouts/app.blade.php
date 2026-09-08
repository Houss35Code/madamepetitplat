<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Titre et Description SEO --}}
        <title>@yield('title', config('app.name', 'Madame Petit Plat'))</title>
        <meta name="description" content="@yield('description', 'Isabel LOISEL, traiteur et cheffe à domicile à Rennes et alentours.')">
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Balises pour le partage sur les réseaux sociaux (Open Graph & Twitter) --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', config('app.name', 'Madame Petit Plat'))">
        <meta property="og:description" content="@yield('description', 'Isabel LOISEL, traiteur et cheffe à domicile à Rennes et alentours.')">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', config('app.name', 'Madame Petit Plat'))">
        <meta name="twitter:description" content="@yield('description', 'Isabel LOISEL, traiteur et cheffe à domicile à Rennes et alentours.')">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/main.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')

        @stack('scripts')
    </body>
</html>