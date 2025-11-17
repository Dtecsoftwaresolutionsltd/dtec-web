@props(['menuItem', 'level' => 0])

@php
    $hasChildren = $menuItem->children && $menuItem->children->count() > 0;
    $isActive = request()->url() == $menuItem->url || request()->is(ltrim($menuItem->url, '/'));
@endphp

<li class="{{ $hasChildren ? 'dropdown' : '' }} {{ $isActive ? 'active' : '' }}">
    @if($hasChildren)
        <a href="{{ $menuItem->url }}" target="{{ $menuItem->target }}" class="{{ $menuItem->css_class }}">
            @if($menuItem->icon)
                <i class="{{ $menuItem->icon }}"></i>
            @endif
            {{ $menuItem->translated_title }}
            <span>
                <i class="fa-solid fa-angle-down"></i>
            </span>
        </a>
        <ul class="d-menu">
            @foreach($menuItem->children->sortBy('sort_order') as $child)
                <x-menu::components.menu-item :menuItem="$child" :level="$level + 1" />
            @endforeach
        </ul>
    @else
        <a href="{{ $menuItem->url }}" target="{{ $menuItem->target }}" class="{{ $menuItem->css_class }}">
          
            {{ $menuItem->translated_title }}
        </a>
    @endif
</li>
