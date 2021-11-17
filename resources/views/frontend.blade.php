<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="preload" href="{{ asset('fonts/SayWhatYouFeel-Condensed.woff2?62dceb4610d64c62b47f9001585abe65') }}" as="font" type="font/woff2" crossorigin>
        <link rel="preload" href="{{ asset('fonts/KolektivGroteskX-Bold.woff2?0af042f2f88e9aaceaf92d73348ce4f5') }}" as="font" type="font/woff2" crossorigin>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased bg-yellow font-bold font-sans text-base">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
