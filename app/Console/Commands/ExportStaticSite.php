<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RuntimeException;

class ExportStaticSite extends Command
{
    protected $signature = 'site:export';

    protected $description = 'Exporta las rutas públicas como HTML estático para Vercel';

    public function handle(Kernel $kernel): int
    {
        $routes = collect(config('portfolio.projects'))
            ->keys()
            ->mapWithKeys(fn (string $slug) => ["/proyectos/{$slug}" => "proyectos/{$slug}/index.html"])
            ->prepend('proyectos/coldtech/index.html', '/proyectos/coldtech')
            ->prepend('index.html', '/');

        foreach ($routes as $uri => $destination) {
            $request = Request::create($uri, 'GET');
            $response = $kernel->handle($request);

            if (! $response->isSuccessful()) {
                throw new RuntimeException("No fue posible exportar {$uri}: HTTP {$response->getStatusCode()}");
            }

            $content = $this->withoutLivewireRuntime($response->getContent());
            $path = public_path($destination);
            File::ensureDirectoryExists(dirname($path));
            File::put($path, $content);
            $kernel->terminate($request, $response);

            $this->line("Exportado {$uri} → public/{$destination}");
        }

        $this->info('Sitio estático exportado correctamente.');

        return self::SUCCESS;
    }

    private function withoutLivewireRuntime(string $html): string
    {
        $html = preg_replace('/<!-- Livewire Styles --><style\b[^>]*>.*?<\/style>/s', '', $html) ?? $html;
        $html = preg_replace('/<script\b[^>]*livewire[^>]*>.*?<\/script>/s', '', $html) ?? $html;
        $html = str_replace(['http://localhost', 'https://localhost'], '', $html);

        return preg_replace('/\s+wire:(?:snapshot|effects|id|name)="[^"]*"/', '', $html) ?? $html;
    }
}
