<x-layouts.app title="Coldtech — Caso de estudio | DUO Estudio">
    <div class="project-page">
        <header class="project-nav">
            <a href="{{ route('home') }}" aria-label="Volver al inicio"><x-logo class="nav-logo" /></a>
            <a href="{{ route('home') }}#trabajo" class="project-back"><flux:icon.arrow-left /> Volver a proyectos</a>
        </header>

        <main>
            <section class="project-hero container">
                <p class="eyebrow">Branding · Coldtech · 2024</p>
                <h1>Una identidad renovada para más de 30 años de experiencia.</h1>
                <div class="project-summary">
                    <p>Rediseñamos el universo visual de Coldtech para proyectar su trayectoria en refrigeración industrial con una marca más clara, moderna y consistente.</p>
                    <div><span>Identidad visual</span><span>Manual de marca</span><span>Aplicaciones</span><span>Dirección de arte</span></div>
                </div>
            </section>

            <section class="imported-project-gallery container" aria-label="Galería del proyecto Coldtech">
                @foreach ([
                    ['01-brand-system.webp', 'Sistema de identidad y manual de marca Coldtech'],
                    ['03-evolution.webp', 'Evolución de la marca Coldtech de 2005 a 2024'],
                    ['07-logo.webp', 'Logotipo e isotipo renovado de Coldtech'],
                    ['04-exploration.webp', 'Exploración conceptual del isotipo Coldtech'],
                    ['02-fleet.webp', 'Aplicación de la identidad Coldtech en vehículos de servicio'],
                    ['05-applications.webp', 'Aplicaciones corporativas y uniformes Coldtech'],
                    ['06-digital.webp', 'Aplicación de marca Coldtech en sitio web y LinkedIn'],
                ] as $index => [$image, $alt])
                    <figure class="is-image" data-gallery-item data-gallery-index="{{ $index }}" tabindex="0" role="button" aria-label="Abrir imagen {{ $index + 1 }} de Coldtech">
                        <img src="/projects/coldtech/{{ $image }}" alt="{{ $alt }}" loading="{{ $index < 2 ? 'eager' : 'lazy' }}" decoding="async">
                    </figure>
                @endforeach
            </section>

            <div class="gallery-lightbox" data-gallery-lightbox hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Visor de galería Coldtech">
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
