@php
    $menu = getMenuByLocation($location ?? 'footer');
    $options = array_merge(
        [
            'ul_class' => 'footer_link',
            'li_class' => '',
            'a_class' => '',
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
                @endphp

                <li class="{{ $liClass }}">
                    <a href="{{ $item->url }}" class="{{ $aClass }}"
                        @if ($item->target) target="{{ $item->target }}" @endif
                        @if ($item->css_class) class="{{ $aClass }} {{ $item->css_class }}" @endif>
                        <span>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.5625 0.414062C0.679688 0.296875 0.84375 0.296875 0.960938 0.414062L5.88281 5.3125C5.97656 5.42969 5.97656 5.59375 5.88281 5.71094L0.960938 10.6094C0.84375 10.7266 0.679688 10.7266 0.5625 10.6094L0.09375 10.1641C0 10.0469 0 9.85938 0.09375 9.76562L4.33594 5.5L0.09375 1.25781C0 1.16406 0 0.976562 0.09375 0.859375L0.5625 0.414062Z" />
                            </svg>
                        </span>
                        {{ $item->translated_title }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@else
    {{-- Fallback to static footer menu if no dynamic menu found --}}
    <ul class="{{ $options['ul_class'] }}">
        <li>
            <a href="{{ route('terms.and.conditions') }}">
                <span>
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.5625 0.414062C0.679688 0.296875 0.84375 0.296875 0.960938 0.414062L5.88281 5.3125C5.97656 5.42969 5.97656 5.59375 5.88281 5.71094L0.960938 10.6094C0.84375 10.7266 0.679688 10.7266 0.5625 10.6094L0.09375 10.1641C0 10.0469 0 9.85938 0.09375 9.76562L4.33594 5.5L0.09375 1.25781C0 1.16406 0 0.976562 0.09375 0.859375L0.5625 0.414062Z" />
                    </svg>
                </span>
                {{ __('Terms & Conditions') }}
            </a>
        </li>
        <li>
            <a href="{{ route('privacy.policy') }}">
                <span>
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.5625 0.414062C0.679688 0.296875 0.84375 0.296875 0.960938 0.414062L5.88281 5.3125C5.97656 5.42969 5.97656 5.59375 5.88281 5.71094L0.960938 10.6094C0.84375 10.7266 0.679688 10.7266 0.5625 10.6094L0.09375 10.1641C0 10.0469 0 9.85938 0.09375 9.76562L4.33594 5.5L0.09375 1.25781C0 1.16406 0 0.976562 0.09375 0.859375L0.5625 0.414062Z" />
                    </svg>
                </span>
                {{ __('Privacy Policy') }}
            </a>
        </li>
        <li>
            <a href="{{ route('blog') }}">
                <span>
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.5625 0.414062C0.679688 0.296875 0.84375 0.296875 0.960938 0.414062L5.88281 5.3125C5.97656 5.42969 5.97656 5.59375 5.88281 5.71094L0.960938 10.6094C0.84375 10.7266 0.679688 10.7266 0.5625 10.6094L0.09375 10.1641C0 10.0469 0 9.85938 0.09375 9.76562L4.33594 5.5L0.09375 1.25781C0 1.16406 0 0.976562 0.09375 0.859375L0.5625 0.414062Z" />
                    </svg>
                </span>
                {{ __('Our Blog') }}
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}">
                <span>
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.5625 0.414062C0.679688 0.296875 0.84375 0.296875 0.960938 0.414062L5.88281 5.3125C5.97656 5.42969 5.97656 5.59375 5.88281 5.71094L0.960938 10.6094C0.84375 10.7266 0.679688 10.7266 0.5625 10.6094L0.09375 10.1641C0 10.0469 0 9.85938 0.09375 9.76562L4.33594 5.5L0.09375 1.25781C0 1.16406 0 0.976562 0.09375 0.859375L0.5625 0.414062Z" />
                    </svg>
                </span>
                {{ __('Contact us') }}
            </a>
        </li>
    </ul>
@endif
