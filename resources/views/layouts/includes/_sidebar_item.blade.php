@php
    $hasChilds = $menu->childs()->exists()
@endphp

@if($menu->isAccessibleBy($login_user))
    <li class="nav-item {{ $hasChilds ? 'nav-dropdown' : '' }}">
        <a class="nav-link {{ $hasChilds ? 'nav-dropdown-toggle' : '' }}"
           href="{{ $hasChilds ? '#' : url($menu->url ?? '#') }}"
        >
            <i class="{{ $menu->icon }}"></i> {{ $menu->name }}
        </a>

        @if($hasChilds)
            <ul class="nav-dropdown-items">
                @each('layouts.includes._sidebar_item', $menu->childs, 'menu')
            </ul>
        @endif
    </li>
@endif