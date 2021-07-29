<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include("header")
        <link rel="stylesheet" href="/css/app.css?v={{ env('APP_VERSION') }}" >
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <script  src="/js/app.js?v={{ env('APP_VERSION') }}" ></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>Laravel</title>
        @livewireStyles
    </head>
    <body>
      @include("navigation")

      {{$slot}}
        @livewireScripts
    </body>
</html>
