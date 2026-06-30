# DUO Estudio

Réplica de la landing de DUO Estudio reconstruida con Laravel 12, Livewire 4, Flux 2, Tailwind CSS 4 y Vite.

## Instalación

```bash
composer run setup
composer run dev
```

La aplicación quedará disponible en `http://localhost:8000`.

## Comandos útiles

```bash
php artisan test
npm run build
vendor/bin/pint --test
```

La página principal es un componente Livewire de página completa. Flux aporta los botones e iconos; no se agregó MaryUI porque todos los componentes necesarios están cubiertos por Flux.
