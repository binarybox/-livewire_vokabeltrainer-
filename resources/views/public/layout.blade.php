<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include("header")
      <link rel="stylesheet" href="/css/login.css?v={{ env('APP_VERSION') }}" >
        <title>{{$title}}</title>
        @livewireStyles
    </head>
    <body>
      <div class="login-wrapper">
        <div class="card-body">
         @yield('content')
       </div>
    </div>

        @livewireScripts
    </body>
</html>
