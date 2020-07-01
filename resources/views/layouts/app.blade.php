<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('public/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <style>
      * {
        font-family: 'Cairo', sans-serif;
      }
      .navbar {
        background:  #4b4bfb !important
      }
      .navbar .nav-item .nav-link, .navbar .navbar-brand{
        color:#fff !important
      }
      .py-4 {
        direction: rtl;
        text-align: right;
      }
    </style>
    @stack('css')
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <ul class="navbar-nav ml-auto">
                      <!-- start Gloval links --->
                      <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          الصحفات
                          </button>
                          <div class="text-center dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('challenges.view') }}">التحديات</a>
                              <a class="dropdown-item" href="{{ route('Users.index') }}">الاعضاء</a>
                              <a class="dropdown-item" href="{{ route('Teams') }}">الفرق</a>
                              <a class="dropdown-item" href="{{ route('news') }}">اخر الاخبار</a>
                              <a class="dropdown-item" href="{{ route('contact') }}">اتصل بنا</a>
                            </div>
                          </div>
                      <!--- end Gloval Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">دخول
                                  <i class="fas fa-door-closed"></i>
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">حساب جديد
                                      <i class="fa fa-user-plus"></i>
                                    </a>
                                </li>
                            @endif
                        @else

                        <div class="dropdown" style="margin-left:10px">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }} <i class="fa fa-user"></i>
                            </button>
                            <div class="text-center dropdown-menu bg-light" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('User.index') }}">  صفحتي <i class="fa fa-user"></i></a>
                                <a class="dropdown-item" href="{{ route('Team.index') }}">     فريقي <i class="fab fa-teamspeak"></i></a>
                                <a class="dropdown-item" href="{{ route('Team.create') }}">
                                  أنشاء فرق
                                  <i class="fab fa-teamspeak"></i></a>
                              </div>
                            </div>

                            <li class="nav-item dropdown">
                              <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }} <i class="fas fa-door-open"></i>
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
              @include('layouts.msgs')
            </div>
            @yield('content')
        </main>
    </div>

      @yield('chart')

      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="{{asset('public/js/all.min.js')}}"></script>
      @stack('js')
</body>
</html>
