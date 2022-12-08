<x-layouts.base>

    @if(in_array(request()->route()->getName(), ['dashboard', 'profile', 'profile-example', 'users', 'bootstrap-tables', 'transactions',
    'buttons',
    'forms', 'modals', 'notifications', 'typography', 'upgrade-to-pro','countries.index']))

    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        @stack('custom-styles')
        @yield('content')
        {{-- Footer --}}
        @include('layouts.footer')
    </main>

    @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login', 'login-example',
    'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))

    {{ $slot }}
   
    {{-- Footer --}}
    @include('layouts.footer2')


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif

    @stack('custom-scripts')
</x-layouts.base>