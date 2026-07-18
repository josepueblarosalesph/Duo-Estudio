<x-layouts.app :title="$project['title'].' — DUO Estudio'">
    <div class="project-page">
        <header class="project-nav">
            <a href="{{ route('home') }}" aria-label="Volver al inicio"><x-logo class="nav-logo" /></a>
            <a href="{{ route('home') }}#trabajo" class="project-back"><flux:icon.arrow-left /> Volver a proyectos</a>
        </header>

        <main>
            <section class="project-hero container">
                <p class="eyebrow">{{ $project['category'] }} · {{ $project['year'] }}</p>
                <h1>{{ $project['title'] }}</h1>
                <div class="project-summary">
                    <p>{{ $project['description'] }}</p>
                    <div>@foreach ($project['services'] as $service)<span>{{ $service }}</span>@endforeach</div>
                </div>
            </section>

            <section class="imported-project-gallery {{ $project['category'] === 'Video' ? 'is-video-project' : '' }} container" aria-label="Galería completa de {{ $project['title'] }}">
                @foreach ($gallery as $index => $media)
                    @php $isVideo = str_ends_with(strtolower($media), '.mp4'); @endphp
                    <figure class="{{ $isVideo ? 'is-video' : 'is-image' }}" @if (!$isVideo) data-gallery-item data-gallery-index="{{ $index }}" tabindex="0" role="button" aria-label="Abrir imagen {{ $index + 1 }} de {{ $project['title'] }}" @endif>
                        @if ($isVideo)
                            <video src="/projects/portfolio/galleries/{{ $slug }}/{{ $media }}" controls playsinline preload="metadata"></video>
                        @else
                            <img src="/projects/portfolio/galleries/{{ $slug }}/{{ $media }}" alt="{{ $project['title'] }} — imagen {{ $index + 1 }}" loading="{{ $index < 2 ? 'eager' : 'lazy' }}" decoding="async">
                        @endif
                    </figure>
                @endforeach
            </section>

            <div class="gallery-lightbox" data-gallery-lightbox hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Visor de galería">
                <button type="button" class="gallery-lightbox__close" data-gallery-close aria-label="Cerrar galería">×</button>
                <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" data-gallery-prev aria-label="Imagen anterior">‹</button>
                <div class="gallery-lightbox__stage"><img src="" alt=""></div>
                <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" data-gallery-next aria-label="Imagen siguiente">›</button>
                <span class="gallery-lightbox__counter" data-gallery-counter aria-live="polite"></span>
            </div>

            <section class="project-next container">
                <p class="eyebrow">¿Tienes un proyecto en mente?</p>
                <h2>Construyamos algo que destaque.</h2>
                <a href="{{ route('home') }}#contacto" class="project-link">Hablemos <flux:icon.arrow-up-right /></a>
            </section>
        </main>
    </div>
</x-layouts.app>
