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

## Despliegue en Vercel

El proyecto usa el runtime comunitario `vercel-php` recomendado por Vercel. Los assets de `public/build` se versionan porque Flux se instala mediante Composer durante la construcción de la función PHP.

Configura estas variables en Vercel antes de desplegar:

```text
APP_KEY=base64:...
APP_URL=https://tu-dominio.vercel.app
```

Genera `APP_KEY` localmente con `php artisan key:generate --show`. No subas el archivo `.env`.
