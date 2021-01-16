<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("header")
        <link rel="stylesheet" href="/css/app.css" >
        <title>Laravel</title>
        @livewireStyles
    </head>
    <body>
      @include("navigation")
      <div class="container-center">
      <div class="card">
        <div class="card-body">
          <livewire:random-vokabel />
        </div>
      </div>
    </div>

        @livewireScripts
    </body>
</html>
