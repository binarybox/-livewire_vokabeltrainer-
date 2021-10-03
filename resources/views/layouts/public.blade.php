<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      @include("header")
      <link rel="stylesheet" href="/css/app.css?v={{ env('APP_VERSION') }}" >
        <title>{{env('APP_NAME')}}</title>
        @livewireStyles
    </head>
    <body>
      <div class="w-screen h-screen pt-16 lg:justify-center flex items-center flex-col">
         {{$slot}}
    </div>

        @livewireScripts
    </body>
</html>
