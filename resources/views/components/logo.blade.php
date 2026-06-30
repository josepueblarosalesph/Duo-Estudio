@props(['class' => 'h-8', 'variant' => 'dark'])

<img
    src="{{ asset($variant === 'light' ? 'logo-duo-dark.png' : 'logo-duo-light.png') }}"
    alt="DUO Estudio"
    {{ $attributes->class(['duo-logo', $class]) }}
    width="808"
    height="415"
>
