@props(['active' => false])

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $active ? 'nav-link active mx-lg-2' : 'nav-link mx-lg-2']) }}>
        {{ $slot }}
    </a>
</li>
