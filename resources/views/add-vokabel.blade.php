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
      
      <div class="container">
      <div class="card">
        <div class="card-header">
            <h2>Add Vokabel</h2>
        </div>
        <div class="card-body">
          <livewire:add-vokabel />
        </div>
      </div>
      <div class="card">

            <livewire:list-vokabels />
      </div>
    </div>

        @livewireScripts
    </body>
</html>
