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

            @if ($user->hasRole($link->guard->roles))
                <li class="menu-header">{{ $link->header_page_name }}</li>
                @foreach ($link->data_pages as $data_page)
                    @if (!$data_page->is_multi_page)
                        @if ($user->hasRole($data_page->guard->roles) && $user->hasAnyDirectPermission($data_page->guard->permissions))
                            <li class="{{ Request::routeIs($data_page->page_route) ? 'active' : '' }}">

                                <a class="nav-link" href="{{ route($data_page->page_route) }}">
                                    <i class="{{ $data_page->page_icon }}"></i>
                                    <span>{{ $data_page->page_name }}</span>
                                </a>
                            </li>
                        @endif
                    @elseif ($data_page->is_multi_page)
                        @if ($user->hasRole($data_page->guard->roles) && $user->hasAnyDirectPermission($data_page->guard->permissions))
                            @php
                                $routes = collect($data_page->data_multi_pages)->map(function ($child) {
                                    return Request::routeIs($child->page_route);
                                })->toArray();

                                $is_active = in_array(true, $routes);
                            @endphp

                            <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                    <i class="{{ $data_page->icon }}"></i>
                                    <span>{{ $data_page->title }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($data_page->data_multi_pages as $child)
                                    <li class="{{ Request::routeIs($child->page_route) ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route($child->page_route) }}">{{ $child->page_name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
