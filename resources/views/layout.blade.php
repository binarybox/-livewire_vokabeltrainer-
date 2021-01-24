<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include("header")
        <link rel="stylesheet" href="/css/app.css?v={{ env('APP_VERSION') }}" >
        <title>Laravel</title>
        @livewireStyles
    </head>
    <body>
      @include("navigation")

      <div class="container">
        @yield('content')
      </div>
        @livewireScripts
    </body>
</html>
