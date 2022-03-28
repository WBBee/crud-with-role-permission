@php
$user = auth()->user();

$links = ViewDisplay();

$navigation_links = array_to_object($links);

@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            @role($link->role_access)
            <li class="menu-header">{{ $link->header }}</li>
            @if (!$link->is_multi)
                <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span>{{ $link->name }}</span></a>
                </li>
            @else
                @foreach ($link->href as $section)
                    @role($section->role_access)
                    @php
                        $routes = collect($section->section_list)->map(function ($child) {
                            return Request::routeIs($child->href);
                        })->toArray();

                        $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icon }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                            <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route($child->href) }}">{{ $child->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endrole
                @endforeach
            @endif
            @endrole
        </ul>
        @endforeach
    </aside>
</div>
