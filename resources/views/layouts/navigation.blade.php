<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="{{ asset('js/loading-bar.min.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/loading-bar.css') }}" >

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>
@yield('css')

<body class="bg-gray-100">
    <nav class="bg-purple-900 flex flex-wrap items-center justify-between px-2 py-2">
        <div class="w-full block flex-grow flex items-center w-auto">
            <div class="flex items-center flex-shrink-0 text-white mr-6 ">
                <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
                </svg>
                <span class="font-semibold text-xl tracking-tight">ResQ</span>
            </div>
            <div class="text-sm flex-grow">
                @auth
                    <a href="{{ url('navigation/')}}" class="border border-white hover:bg-pink-700 hover:border-transparent hover:text-white inline-block leading-none px-4 py-2 rounded text-sm text-white">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="#responsive-header"
                        class="block inline-block text-teal-200 hover:text-white mr-4" style="display: none;">
                        Diario
                    </a>
                @endauth
            </div>
            <div>
                @guest
                    <a href="{{ route('login') }}" class="border border-white hover:bg-pink-700 hover:border-transparent hover:text-white inline-block leading-none px-4 py-2 rounded text-sm text-white">
                        {{ __('Iniciar sesión') }}
                    </a>
                    @if (Route::has('register'))
                        <a class="border border-white hover:bg-pink-700 hover:border-transparent hover:text-white inline-block leading-none px-4 py-2 rounded text-sm text-white"
                        href="{{ route('register') }}"> {{ __('Registrarse') }}
                    </a>
                    @endif
                @else
                <a href="{{ url('chat')}}" class="notific block hover:text-pink-700 hover:text-white inline-block p-2 text-white">
                    <i class="fas fa-comment-dots"></i>
                </a>
                <a href='#notificcion' onclick="event.preventDefault();notificaciones();"
                    class="notific block hover:text-pink-700 hover:text-white inline-block p-2 text-white">
                    <i class="fas fa-bell"></i>
                <span class="bg-pink-700 rounded-full text-xs">@if(@isset($n_not)){{ $n_not }} @else {{ 0 }}@endisset</span>
                </a>
                <a href="{{ url('perfil/'.Auth::user()->id) }}"
                    class="block hover:text-pink-700 hover:text-white inline-block mr-4 p-2 text-white">
                    <i class="fas fa-user"></i>
                </a>

                <a class="border border-white hover:bg-pink-700 hover:border-transparent hover:text-white inline-block leading-none px-4 py-2 rounded text-sm text-white" onclick="event.preventDefault();desplegar('menu');"><i class="fas fa-cog"></i>
                </a>
                <div id="menu" class="menu">
                    @yield('menu')
                    <a class="w-full border hover:border-white bg-pink-700 border-transparent text-white inline-block leading-none px-4 py-2 rounded text-sm hover:text-white"
                    href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest

            </div>
        </div>
    </nav>
    <main class="">
        @include('partial.error')
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
  function desplegar(modulo) {
    if (!document.getElementById(modulo).classList.contains("activo")) {
      document.getElementById(modulo).classList.add("activo");
    } else {
      document.getElementById(modulo).classList.remove("activo");
    }
  }
</script>
    @yield('js')
</body>

</html>
