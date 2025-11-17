@php
    $menu = getMenuByLocation($location ?? 'header');
    $options = array_merge(
        [
            'ul_class' => 'menu',
            'li_class' => '',
            'a_class' => '',
            'submenu_class' => 'submenu',
            'active_class' => 'active',
            'current_url' => request()->url(),
        ],
        $options ?? [],
    );
@endphp

@if ($menu)
    <ul class="{{ $options['ul_class'] }}">
        @foreach ($menu->menuItems as $item)
            @if ($item->is_active)
                @php
                    $isActive =
                        request()->url() === $item->url ||
                        (str_starts_with(request()->url(), $item->url) && $item->url !== '/');
                    $liClass = $options['li_class'];
                    $aClass = $options['a_class'];

                    if ($isActive) {
                        $liClass .= ' ' . $options['active_class'];
                        $aClass .= ' ' . $options['active_class'];
                    }

                    if ($item->hasChildren()) {
                        $liClass .= ' has-dropdown';
                    }
                @endphp

                <li class="{{ $liClass }}">
                    <a href="{{ $item->url }}" class="{{ $aClass }}"
                        @if ($item->target) target="{{ $item->target }}" @endif
                        @if ($item->css_class) class="{{ $aClass }} {{ $item->css_class }}" @endif>

                        {{ $item->translated_title }}
                    </a>

                    @if ($item->hasChildren())
                        <ul class="{{ $options['submenu_class'] }}">
                            @foreach ($item->children as $child)
                                @if ($child->is_active)
                                    @php
                                        $childIsActive =
                                            request()->url() === $child->url ||
                                            (str_starts_with(request()->url(), $child->url) && $child->url !== '/');
                                        $childLiClass = $options['li_class'];
                                        $childAClass = $options['a_class'];

                                        if ($childIsActive) {
                                            $childLiClass .= ' ' . $options['active_class'];
                                            $childAClass .= ' ' . $options['active_class'];
                                        }
                                    @endphp

                                    <li class="{{ $childLiClass }}">
                                        <a href="{{ $child->url }}" class="{{ $childAClass }}"
                                            @if ($child->target) target="{{ $child->target }}" @endif
                                            @if ($child->css_class) class="{{ $childAClass }} {{ $child->css_class }}" @endif>
                                            @if ($child->icon)
                                                <i class="{{ $child->icon }}"></i>
                                            @endif
                                            {{ $child->translated_title }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
@else
    {{-- Fallback to static menu if no dynamic menu found --}}
    <ul class="{{ $options['ul_class'] }}">
        <li>
            <a href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
        <li>
            <a href="{{ route('search') }}">{{ __('Products') }}</a>
        </li>
        <li>
            <a href="{{ route('about') }}">{{ __('About') }}</a>
        </li>
        <li>
            <a href="{{ route('offer') }}">{{ __('Offer') }}</a>
        </li>
        <li>
            <a href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
        </li>
        <li>
            <a href="{{ route('blog') }}">{{ __('Blog') }}</a>
        </li>
    </ul>
@endif
