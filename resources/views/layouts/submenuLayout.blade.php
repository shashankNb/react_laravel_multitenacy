<li class="nav-item {{ str_contains(request()->url(), $parent['url']) ? 'menu-open' : '' }}">
    <a href="{{ $parent['url'] }}" class="nav-link{{ str_contains(request()->url(), $parent['url']) ? ' active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $parent['label'] }}
            @if(count($children) > 0)
            <i class="right fas fa-angle-left"></i>
            @endif
        </p>
    </a>
    @if(count($children) > 0)
    <ul class="nav nav-treeview" {{ str_contains(request()->url(), $parent['url']) ? 'style="display:block"' : '' }}>
        @foreach($children as $child)
        <li class="nav-item">
            <a href="{{ $child['url'] }}" class="nav-link{{ request()->url() === $child['url'] ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ $child['label'] }}</p>
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
