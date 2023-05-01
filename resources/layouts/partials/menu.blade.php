@props(['menu' => []])

@foreach ($menu as $item)
    <li @class(['nav-item', 'active' => $item['active'], 'dropdown' => isset($item['children'])])>
        <a @class(['nav-link', 'dropdown-toggle' => isset($item['children'])]) href="{{ $item['url'] }}"  @if ($item['external']) target="_blank" rel="noopener noreferrer" @endif @if (isset($item['children'])) data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" @endif>
            @if ($item['icon'])
                <span class="nav-link-icon"><i class="ti ti-{{ $item['icon'] }}"></i></span>
            @endif

            {!! $item['title'] !!}
        </a>

        @if (isset($item['children']))
            <div @class(['dropdown-menu', 'show' => $item['active']])>
                @foreach ($item['children'] as $child)
                    <a @class(['dropdown-item', 'active' => $child['active']]) href="{{ $child['url'] }}" @if ($child['external']) target="_blank" rel="noopener noreferrer" @endif>
                        {!! $child['title'] !!}
                    </a>
                @endforeach
            </div>
        @endif
    </li>
@endforeach
