<li class="">
    <a href="#" class="navItem">
        <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="{{ $icon }}"></iconify-icon>
            <span>{{ $list_name }}</span>
        </span>
        <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
    </a>
    <ul class="sidebar-submenu">
        @foreach ($elements as $element)
            {{-- @dd($element['name']) --}}
            <li>
                <a href="{{ route($element['route']) }}"
                    class="@if (Route::currentRouteName() == $element['route']) active @endif">{{ $element['name'] }}</a>
            </li>
        @endforeach
    </ul>
</li>
