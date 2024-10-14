@props(['active' => true, 'icon' => '', 'showIcon' => false])

<li {{ $attributes(['class' => $active ? 'link_name active' : 'link_name']) }}>
    <div {{ $attributes(['class' => $active ? 'line active' : 'line']) }}></div>
    <a {{ $attributes(['class' => $active ? 'link_name active' : 'link_name']) }}>
        <i class="{{ $icon }}"></i>
        <span class="link_name">{{ $slot }}</span>
        @if($showIcon == 'true')
            <div class="position-absolute fs-4 d-flex" style="right: 20px">
                <i class='bx bx-chevron-down arrow'></i>
            </div>
        @endif
    </a>
</li>


