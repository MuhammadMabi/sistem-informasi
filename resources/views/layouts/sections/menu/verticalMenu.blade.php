<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo ms-5">
                @include('_partials.macros', ['width' => 25, 'withbg' => '#696cff'])
            </span>
            <span class="app-brand-text demo fw-bold ms-2 ms-4">S I S</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelas</span>
        </li> --}}

        <li class="menu-item {{ e($__env->yieldContent('menu')) == 'dashboard' ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->role == 'Admin')
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'sekolah' ? 'active' : '' }}">
                <a href="/sekolah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                    <div>Sekolah</div>
                </a>
            </li>
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'user' ? 'active' : '' }}">
                <a href="/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>User</div>
                </a>
            </li>
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'guru' ? 'active' : '' }}">
                <a href="/guru" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-crown"></i>
                    <div>Guru</div>
                </a>
            </li>
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'siswa' ? 'active' : '' }}">
                <a href="/siswa" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div>Siswa</div>
                </a>
            </li>
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'kelas' ? 'active' : '' }}">
                <a href="/kelas" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div>Kelas</div>
                </a>
            </li>
        @endif
        @if (auth()->user()->role == 'Siswa')
            <li class="menu-item {{ e($__env->yieldContent('menu')) == 'kelas-siswa' ? 'active' : '' }}">
                <a href="/kelas-siswa" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-box"></i>
                    <div>Kelas</div>
                </a>
            </li>
        @endif

        {{-- @foreach ($menuData[0]->menu as $menu)

            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">{{ $menu->menuHeader }}</span>
                </li>
            @else
                @php
                    $activeClass = null;
                    $currentRouteName = Route::currentRouteName();
                    
                    if ($currentRouteName === $menu->slug) {
                        $activeClass = 'active';
                    } elseif (isset($menu->submenu)) {
                        if (gettype($menu->slug) === 'array') {
                            foreach ($menu->slug as $slug) {
                                if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                    $activeClass = 'active open';
                                }
                            }
                        } else {
                            if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
                                $activeClass = 'active open';
                            }
                        }
                    }
                @endphp

                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
                        class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                        @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                        @isset($menu->icon)
                            <i class="{{ $menu->icon }}"></i>
                        @endisset
                        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
                    </a>

                    @isset($menu->submenu)
                        @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
                    @endisset
                </li>
            @endif
        @endforeach --}}
    </ul>

</aside>
