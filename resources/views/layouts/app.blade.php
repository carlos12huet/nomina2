<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nomina SCHRTyC</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <img src="https://img.icons8.com/material-sharp/24/000000/home.png"/>
                    {{ __('Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown"> <!-- Catalogos -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Catalogos') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('regime.index') }}">
                                    {{ __('Regimen') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('tax.index') }}">
                                    {{ __('Regimen Fiscal') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('workday.index') }}">
                                    {{ __('Jornadas') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('tcontract.index') }}">
                                    {{ __('Tipos de contratos') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('period.index') }}">
                                    {{ __('Periodicidad de pago') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><!-- Recursos Humanos -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Recursos Humanos') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('worker.index') }}">
                                    {{ __('Trabajadores') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('position.index') }}">
                                    {{ __('Puestos') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('project.index') }}">
                                    {{ __('Proyectos') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('department.index') }}">
                                    {{ __('Departamentos') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('municipality.index') }}">
                                    {{ __('Municipios') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('contract.index') }}">
                                    {{ __('Contratos') }}
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><!-- Ley ISR -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('ISR') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('subsidy.index')}}">
                                    {{ __('Subsidio') }}</a>
                                <!--<a class="dropdown-item" href="{{route('subdetail.index')}}">
                                    {{ __('Tablas subsidio') }}</a>-->
                                <a class="dropdown-item" href="{{route('isr.index')}}">
                                    {{ __('ISR') }}</a>
                                <!--<a class="dropdown-item" href="{{route('isrdetail.index')}}">
                                    {{ __('Tablas ISR') }}</a>-->
                            </div>
                        </li>
                        <li class="nav-item dropdown"><!-- PER/DED -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Percepciones y Deduciones') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('sihae.index')}}">
                                    {{ __('SIHAE') }}</a>
                                <a class="dropdown-item" href="{{route('satperception.index')}}">
                                    {{ __('Percepciones SAT') }}</a>
                                <a class="dropdown-item" href="{{route('satdeduction.index')}}">
                                    {{ __('Deduciones SAT') }}</a>
                                <a class="dropdown-item" href="{{route('perception.index')}}">
                                    {{ __('Percepciones') }}</a>
                                <a class="dropdown-item" href="{{route('deduction.index')}}">
                                    {{ __('Deducciones') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown"><!-- Tabuladores de pago -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Tabuladores') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('tab.index')}}">
                                    {{ __('Tabulador') }}</a>
                                <a class="dropdown-item" href="{{route('tabdetail.index')}}">
                                    {{ __('Tabulacion') }}</a>
                            </div>
                        </li>
                        <li class="nav-item float-right"><!-- Nomina -->
                            <a class="nav-link text-black btn btn-sm " href="{{route('payroll.index')}}" target="_blank" rel="noopener noreferrer">
                                {{ __('Crear Nomina') }}</a>
                        </li>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <img src="https://img.icons8.com/external-flat-icons-inmotus-design/67/000000/external-login-man-and-woman-flat-icons-inmotus-design.png" width="20" height="20"/>
                                        {{ __('Iniciar sesion') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <img src="https://img.icons8.com/external-others-iconmarket/64/000000/external-register-online-learning-others-iconmarket-2.png" width="20" height="20"/>
                                        {{ __('Registrar') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown"> <!--Usuario-->
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('setting.index') }}">
                                        {{ __('Variables') }}
                                    </a>
                                    @if (auth()->user()->role_id == 1)
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            {{ __('Usuarios') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('role.index') }}">
                                            {{ __('Roles') }}
                                        </a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-gray-100 dark:bg-gray-900">
            @yield('content')
        </main>
    </div>
</body>
</html>
