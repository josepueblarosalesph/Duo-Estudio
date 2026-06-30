<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'DUO Estudio — Soluciones integrales y rápidas' }}</title>
    <meta name="description" content="Sistemas a medida, imagen corporativa, automatizaciones, foto y video. Tu socio creativo y técnico en un solo lugar.">
    <meta property="og:title" content="DUO Estudio">
    <meta property="og:description" content="Sistemas, imagen corporativa, automatizaciones, foto y video. Construido con velocidad y precisión.">
    <meta name="theme-color" content="#0a0a0a">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body>
    {{ $slot }}
    @fluxScripts
</body>
</html>
