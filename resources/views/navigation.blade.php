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

<nav class="block fixed w-full px-6 z-50 bg-white  border-b-2" x-data="{collapse: true}">
  <a sm:hidden href="#"></a>
  <div class="hidden">
    <x-button type="button" @click="collapse = !collapse">
      <span class="material-icons-outlined">menu</span>
    </x-button>
  </div>

  <div class="block w-full" x-bind:class="{collapse: collapse}">
    <div class="flex justify-between">
    <div class="flex">
      <x-nav-link route="random.vokabel" name="Random vokabel"/>
      <x-nav-link route="random.number" name="Random number"/>
      <x-nav-link route="stats" name="Stats"/>
    </div>
    <x-nav-link route="logout" name="Logout"/>
    </div>
  </div>
</nav>
