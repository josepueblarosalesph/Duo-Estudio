@php
    $links = [['#servicios', 'Servicios'], ['#proceso', 'Proceso'], ['#trabajo', 'Trabajo'], ['#contacto', 'Contacto']];
    $services = [
        ['code-bracket', 'Sistemas a medida', 'Plataformas web, dashboards y SaaS construidos con stacks modernos. Rápidos, escalables y mantenibles.', ['Web apps', 'Dashboards', 'Integraciones API']],
        ['sparkles', 'Imagen corporativa', 'Identidad visual coherente: logos, sistemas de marca y guías que comunican lo que tu negocio realmente es.', ['Branding', 'Logo & sistema', 'Manual de marca']],
        ['arrows-right-left', 'Automatizaciones', 'Procesos que se ejecutan solos. Conecta herramientas, reduce trabajo manual y libera tiempo de tu equipo.', ['Workflows', 'Bots & IA', 'Integraciones']],
        ['camera', 'Foto y video', 'Contenido visual con dirección y propósito. Producto, marca, eventos y reels con acabado profesional.', ['Producto', 'Branding visual', 'Reels & social']],
    ];
    $steps = [
        ['01', 'Descubrimos', 'Sesión rápida para entender el negocio, objetivos y prioridades.'],
        ['02', 'Diseñamos', 'Propuesta clara con alcance, timeline y entregables medibles.'],
        ['03', 'Construimos', 'Iteraciones cortas, demos frecuentes y comunicación directa.'],
        ['04', 'Lanzamos', 'Entrega, soporte y mejoras continuas. Tú creces, nosotros ajustamos.'],
    ];
    $projects = config('portfolio.projects');
@endphp

<div class="site-shell">
    <header class="site-header reveal is-visible">
        <div class="nav-wrap glass">
            <a href="#top" class="logo-link"><x-logo class="nav-logo" /></a>
            <nav class="desktop-nav" aria-label="Navegación principal">
                @foreach ($links as [$href, $label])
                    <a href="{{ $href }}">{{ $label }}</a>
                @endforeach
            </nav>
            <flux:button href="#contacto" variant="primary" size="sm" icon:trailing="arrow-up-right" class="desktop-cta" style="background:#292929;color:#fff;border-color:rgba(255,255,255,.22);box-shadow:inset 0 1px rgba(255,255,255,.06)">Hablemos</flux:button>
            <button type="button" class="menu-toggle" data-menu-toggle aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-navigation">
                <span></span><span></span>
            </button>
        </div>
        <nav id="mobile-navigation" class="mobile-nav glass" data-mobile-menu aria-label="Navegación móvil" aria-hidden="true">
            @foreach ($links as [$href, $label])
                <a href="{{ $href }}">{{ $label }}</a>
            @endforeach
            <flux:button href="#contacto" variant="primary" style="background:#292929;color:#fff;border-color:rgba(255,255,255,.22);box-shadow:inset 0 1px rgba(255,255,255,.06)">Hablemos</flux:button>
        </nav>
    </header>

    <main>
        <section id="top" class="hero">
            <div class="hero-media" aria-hidden="true"><img src="/hero-bg.jpg" alt=""><div class="bg-grid"></div><div class="radial"></div><div class="noise"></div></div>
            <div class="container hero-content">
                <div class="availability reveal is-visible"><span><i></i>Disponibles para nuevos proyectos · {{ now()->year }}</span></div>
                <h1 class="reveal is-visible">Soluciones <em>integrales</em>,<br> entregadas con velocidad.</h1>
                <p class="hero-copy reveal is-visible">Somos DUO Estudio. Diseñamos sistemas, marcas, automatizaciones y contenido visual — todo bajo un mismo equipo. Una sola conversación, un solo entregable.</p>
                <div class="hero-actions reveal is-visible">
                    <flux:button href="#contacto" variant="primary" icon:trailing="arrow-up-right" style="background:#292929;color:#fff;border-color:rgba(255,255,255,.22);box-shadow:inset 0 1px rgba(255,255,255,.06)">Agenda una llamada</flux:button>
                    <flux:button href="#servicios" variant="ghost">Ver servicios</flux:button>
                </div>
                <div class="hero-brand reveal is-visible" aria-label="DUO Estudio">
                    <span class="hero-brand__line"></span>
                    <x-logo class="hero-logo-size" />
                    <span class="hero-brand__line"></span>
                </div>
            </div>
        </section>

        <section class="marquee" aria-label="Capacidades">
            <div class="marquee-track">
                @foreach (array_merge(['Sistemas','Branding','Automatizaciones','Foto','Video','Identidad','Web apps','Reels','Workflows','Dashboards'], ['Sistemas','Branding','Automatizaciones','Foto','Video','Identidad','Web apps','Reels','Workflows','Dashboards']) as $item)
                    <span>{{ $item }}<i></i></span>
                @endforeach
            </div>
        </section>

        <section id="servicios" class="section">
            <div class="container">
                <div class="section-heading reveal"><div><p class="eyebrow"><flux:icon.bolt /> Qué hacemos</p><h2>Un equipo, cuatro capacidades.</h2></div><p>Resolvemos lo digital y lo visual de tu negocio sin pasar por cinco proveedores. Más rapidez, más coherencia.</p></div>
                <div class="service-grid">
                    @foreach ($services as [$icon, $title, $desc, $points])
                        <article class="card service-card reveal">
                            <div class="icon-box"><flux:icon :name="$icon" /></div>
                            <h3>{{ $title }}</h3><p>{{ $desc }}</p>
                            <ul>@foreach ($points as $point)<li>{{ $point }}</li>@endforeach</ul>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="proceso" class="section">
            <div class="container">
                <div class="simple-heading reveal"><p class="eyebrow">Proceso</p><h2>Rápido por diseño, no por improvisación.</h2></div>
                <div class="process-grid">
                    @foreach ($steps as [$number, $title, $desc])
                        <article class="process-card reveal"><span>{{ $number }}</span><h3>{{ $title }}</h3><p>{{ $desc }}</p></article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="trabajo" class="section">
            <div class="container">
                <div class="simple-heading reveal"><p class="eyebrow">Trabajo</p><h2>Casos seleccionados.</h2></div>
                <article class="featured-project reveal">
                    <div class="featured-project__intro">
                        <div><p class="eyebrow">Branding · Coldtech</p><h3>Una identidad renovada para más de 30 años de experiencia.</h3></div>
                        <p>Rediseñamos el universo visual de Coldtech para proyectar su trayectoria en refrigeración industrial con una marca más clara, moderna y consistente.</p>
                    </div>
                    <div class="coldtech-gallery coldtech-gallery--preview">
                        <figure><img src="/projects/coldtech/01-brand-system.webp" alt="Sistema de identidad y manual de marca Coldtech" loading="lazy"></figure>
                        <figure><img src="/projects/coldtech/05-applications.webp" alt="Aplicaciones corporativas y uniformes Coldtech" loading="lazy"></figure>
                    </div>
                    <div class="featured-project__footer">
                        <div class="featured-project__meta"><span>Identidad visual</span><span>Manual de marca</span><span>Aplicaciones</span></div>
                        <a href="{{ route('projects.coldtech') }}" class="project-link">Ver proyecto <flux:icon.arrow-up-right /></a>
                    </div>
                </article>
                <div class="work-grid">
                    @foreach ($projects as $slug => $project)
                        <a href="{{ route('projects.show', $slug) }}" class="work-card work-card--media reveal">
                            <div class="work-card__media">
                                @if (isset($project['video']))
                                    <video src="/projects/portfolio/{{ $project['video'] }}" autoplay muted loop playsinline preload="metadata" aria-label="{{ $project['title'] }}"></video>
                                @else
                                    <img src="/projects/portfolio/{{ $project['image'] }}" alt="{{ $project['title'] }}" loading="lazy">
                                @endif
                            </div>
                            <div class="work-card__shade"></div><span>{{ $project['category'] }}</span><div class="work-card__copy"><h3>{{ $project['title'] }}</h3><p>{{ $project['description'] }}</p></div><flux:icon.arrow-up-right />
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contacto" class="section contact-section">
            <div class="container">
                <div class="contact-card card reveal"><div class="bg-grid"></div><div class="contact-glow"></div>
                    <div class="contact-copy"><p class="eyebrow">Hablemos</p><h2>¿Tienes una idea?<br><em>La hacemos realidad.</em></h2>
                        <ul>@foreach (['Un solo equipo, sin intermediarios','Entregas en semanas, no en meses','Comunicación directa con quien construye'] as $benefit)<li><flux:icon.check />{{ $benefit }}</li>@endforeach</ul>
                    </div>
                    <div class="contact-links">
                        <a href="mailto:duoestudio.contacto@gmail.com"><span class="icon-box"><flux:icon.envelope /></span><span><small>Escríbenos</small><strong>duoestudio.contacto@gmail.com</strong></span><flux:icon.arrow-up-right /></a>
                        <a href="https://wa.me/56966372809" target="_blank" rel="noopener"><span class="icon-box"><flux:icon.chat-bubble-left-right /></span><span><small>WhatsApp</small><strong>+56 9 6637 2809</strong></span><flux:icon.arrow-up-right /></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer><div class="container"><div><x-logo class="footer-logo"/><span>© {{ now()->year }} DUO Estudio</span></div><p>Diseñado y construido en casa.</p></div></footer>
</div>
