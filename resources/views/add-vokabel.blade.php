<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css" >
        <title>Laravel</title>
        @livewireStyles
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">Random Vokabel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/vokabels">Vokabels</a>

            </li>
          </ul>
      </nav>
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
