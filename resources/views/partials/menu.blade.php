<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('/assets/img/dankos.png') }}" width="120" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-3">
        {{-- @php
            $menus = [
                ['url_route' => 'dashboard', 'icon' => 'bx-home-circle', 'menu_name' => 'Dashboard'],
                ['url_route' => 'datatable', 'icon' => 'bx-table', 'menu_name' => 'Master Table'],
                ['url_route' => 'rolePermission', 'icon' => 'bx-check-shield', 'menu_name' => 'Role Permission'],
                [
                    'url_route' => 'dashboardPPIC',
                    'icon' => 'bxs-user-circle',
                    'menu_name' => 'PPIC Role',
                    'submenus' => [
                        ['url_route' => 'dashboardPPIC', 'icon' => 'bxs-dashboard', 'menu_name' => 'Dashboard'],
                        ['url_route' => 'mstBn', 'icon' => 'bx-credit-card-front', 'menu_name' => 'Master BN'],
                        ['url_route' => 'historyBn', 'icon' => 'bx-history', 'menu_name' => 'History BN'],
                    ],
                ],
                [
                    'url_route' => 'dashboardQC',
                    'icon' => 'bxs-user-circle',
                    'menu_name' => 'QC Role',
                    'submenus' => [
                        ['url_route' => 'dashboardQC', 'icon' => 'bxs-dashboard', 'menu_name' => 'Dashboard'],
                        ['url_route' => 'dataSampleQC', 'icon' => 'bx-transfer', 'menu_name' => 'Data Sample'],
                    ],
                ],
                [
                    'url_route' => 'dashboardMSTD',
                    'icon' => 'bxs-user-circle',
                    'menu_name' => 'MSTD Role',
                    'submenus' => [
                        ['url_route' => 'dashboardMSTD', 'icon' => 'bxs-dashboard', 'menu_name' => 'Dashboard'],
                        ['url_route' => 'mstProduct.mstd', 'icon' => 'bxs-box', 'menu_name' => 'Master Product'],
                        ['url_route' => 'mstPengujian.mstd', 'icon' => 'bxs-box', 'menu_name' => 'Master Pengujian'],
                        // ['url_route' => 'dataSampleQC', 'icon' => 'bx-transfer', 'menu_name' => 'Data Sample'],
                    ],
                ],
                [
                    'url_route' => 'dashboardPPIC',
                    'icon' => 'bx-cog',
                    'menu_name' => 'Settings',
                    'submenus' => [
                        ['url_route' => 'settings.roleIndex', 'icon' => 'bx-group', 'menu_name' => 'Role'],
                        ['url_route' => 'settings.menuIndex', 'icon' => 'bx-customize', 'menu_name' => 'Menu'],
                        ['url_route' => 'settings.permissionIndex', 'icon' => 'bx-user-check', 'menu_name' => 'Permission'],
                    ],
                ],
            ];
        @endphp --}}

        {{-- @foreach ($menus as $menu)
            <li
                class="menu-item {{ Request::routeIs($menu['url_route']) || (isset($menu['submenus']) && collect($menu['submenus'])->contains(fn($sub) => Request::routeIs($sub['url_route']))) ? 'active open' : '' }}">
                <a href="{{ isset($menu['submenus']) ? '#' : route($menu['url_route']) }}"
                    class="menu-link {{ isset($menu['submenus']) ? 'menu-toggle' : '' }}">
                    <i class="menu-icon tf-icons bx {{ $menu['icon'] }}"></i>
                    <div data-i18n="Analytics">{{ $menu['menu_name'] }}</div>
                </a>
                @if (isset($menu['submenus']))
                    <ul class="menu-sub">
                        @foreach ($menu['submenus'] as $submenus)
                            <li class="menu-item {{ Request::routeIs($submenus['url_route']) ? 'active' : '' }}">
                                <a href="{{ route($submenus['url_route']) }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx {{ $submenus['icon'] }}"></i>
                                    <div data-i18n="Analytics">{{ $submenus['menu_name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach --}}

        @foreach ($menus as $menu)
            <li class="menu-item
            {{ Request::routeIs($menu['url_route'] . '*') ? 'active open' : '' }}">
                <a href="{{ isset($menu['submenus']) ? '#' : route($menu['url_route']) }}"
                    class="menu-link {{ isset($menu['submenus']) ? 'menu-toggle' : '' }}">
                    <i class="menu-icon tf-icons bx {{ $menu['icon'] }}"></i>
                    <div data-i18n="{{ $menu['menu_name'] }}">{{ $menu['menu_name'] }}</div>
                </a>
                @if (isset($menu['submenus']))
                    <ul class="menu-sub">
                        @foreach ($menu['submenus'] as $submenus)
                            <li class="menu-item {{ Request::routeIs($submenus['url_route'] . '*') ? 'active' : '' }}">
                                <a href="{{ route($submenus['url_route']) }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx {{ $submenus['icon'] }}"></i>
                                    <div data-i18n="Analytics">{{ $submenus['menu_name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach



    </ul>

</aside>
