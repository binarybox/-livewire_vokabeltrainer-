<!-- <nav class="navbar navbar-expand-lg navbar-primary">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('random.vokabel')}}">Random vokabel</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('random.number')}}">Random numbers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('stats')}}">Stats</a>
    </li>
  </ul>
  <div>
      <a class="nav-link" href="/logout">Logout</a>
  </div>
</nav> -->

<nav class="navbar navbar-expand-md navbar-light " x-data="{collapse: true}">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" @click="collapse = !collapse">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" x-bind:class="{collapse: collapse}">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(\Route::current()->getName() == 'random.vokabel') active @endif">
        <a class="nav-link" href="{{route('random.vokabel')}}">Random vokabel</a>
      </li>
      <li class="nav-item @if(\Route::current()->getName() == 'random.number') active @endif">
        <a class="nav-link" href="{{route('random.number')}}">Random numbers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(\Route::current()->getName() == 'stats') active @endif" href="{{route('stats')}}">Stats</a>
      </li>
    </ul>
  </div>
</nav>
