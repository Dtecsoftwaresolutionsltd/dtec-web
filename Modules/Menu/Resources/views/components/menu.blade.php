@props(['menu', 'class' => 'nav-links'])

@php
    $menuItems = $menu->menuItems()->where('parent_id', null)->with(['children', 'translations'])->orderBy('sort_order')->get();
@endphp

<ul class="{{ $class }}">
    @foreach($menuItems as $menuItem)
        <x-menu::components.menu-item :menuItem="$menuItem" />
    @endforeach
</ul> 