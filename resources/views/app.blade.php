<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="KTcyUXN1va3ZvLjzT-Y70djfXccLrgJHU7BbfvHz13U" />
        <meta name="description" content="An avid explorer, driven by a quest for wisdom and a passion for understanding the intricacies of the world. Experienced Web Developer">
        <meta name="keywords" content="Meysam,Khodadadi,Meysam Khodadadi,میثم,خدادادی" />

        <title inertia>{{ config('app.name', 'Meysam') }}</title>
        <link rel="icon" type="image/x-icon" href="/picture/favicon.ico">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
