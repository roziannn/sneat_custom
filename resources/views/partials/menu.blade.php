<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/dankos.png" width="120" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @php
            $menus = [
                ['route' => 'dashboard', 'icon' => 'bx-home-circle', 'label' => 'Dashboard'],
                ['route' => 'datatable', 'icon' => 'bx-table', 'label' => 'Master Table'],
                ['route' => 'rolePermission', 'icon' => 'bx-check-shield', 'label' => 'Role Permission'],
            ];
        @endphp

        @foreach ($menus as $menu)
            <li class="menu-item {{ Request::routeIs($menu['route']) ? 'active' : '' }}">
                <a href="{{ route($menu['route']) }}" class="menu-link">
                    <i class="menu-icon tf-icons bx {{ $menu['icon'] }}"></i>
                    <div data-i18n="Analytics">{{ $menu['label'] }}</div>
                </a>
            </li>
        @endforeach
    </ul>

</aside>
