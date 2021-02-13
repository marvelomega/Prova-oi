<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Oi Clientes</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
            .oi-logo{width: 30px;}
            .purble-nav{background: #9c27b0 !important}
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 60px;
                line-height: 60px;
                background-color: #f5f5f5;
            }

            .footer .text-purple a{
             color: #9c27b0 !important;
             text-decoration: none;
            }

            .pre-footer{
                margin-top: 100px;
            }

            .white-nav a{
                color: #FFFFFF !important;
                text-decoration: none;
            }
            .name-login{
                margin-bottom: 0;
            }

            .nav-item.white-nav{
                margin-left: 10px
            }
        </style>

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-light purble-nav">
            
            @auth
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="https://logodownload.org/wp-content/uploads/2014/02/oi-logo-d4.png" class="oi-logo">
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://logodownload.org/wp-content/uploads/2014/02/oi-logo-d4.png" class="oi-logo">
                </a>
            @endauth
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    @auth
                    <li class="nav-item white-nav"><a href="{{ url('/clientes') }}">Clientes</a></li>
                    <li class="nav-item white-nav"><a href="{{ url('/clientes-ativos') }}">Relatórios de Clientes ativos</a></li>
                    @else

                    @endauth
                </ul>
                <ul class="navbar-nav">

                    @guest
                        <li class="nav-item  white-nav"><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="nav-item  white-nav">
                            <p class="text-center name-login">
                                <a>Olá {{ Auth::user()->name }}</a>
                                <br>
                                <a class="btn btn-dark btn-sm" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Sair <i class="fa fa-sign-out"></i>
                                </a>
                            </p>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="pre-footer"></div>
        <footer class="footer">
          <div class="container">
            <p class="text-muted text-center text-purple">
                Oi {{ date('Y')}}
                <span class="pull-right">
                    Siga-nos:&nbsp;&nbsp;&nbsp;
                    <a href="https://www.facebook.com/OiOficial" target="_blank" ><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/oi_oficial/?hl=pt-br" target="_blank"><i class="fa fa-instagram"></i></a>
                </span>

            </p>
            
          </div>
        </footer>
    </div>
</body>
</html>
