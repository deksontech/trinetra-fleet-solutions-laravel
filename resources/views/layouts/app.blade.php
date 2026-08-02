<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $site['name'].' | '.$site['tagline'])</title>
    <meta name="description" content="@yield('description', $site['description'])">
    <meta property="og:title" content="@yield('title', $site['name'])">
    <meta property="og:description" content="@yield('description', $site['description'])">
    <meta property="og:image" content="{{ asset($images['hero']) }}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="{{ url()->current() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('schema')
</head>
<body>
    @include('partials.header')
    <main>@yield('content')</main>
    @include('partials.footer')
    @include('partials.cookie')
</body>
</html>
