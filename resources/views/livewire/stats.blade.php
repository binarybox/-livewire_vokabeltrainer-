<div class="w-screen h-screen pt-16">
  <div class="px-4 py-2">

    <x-h1>Stats</x-h1>
    <div>
      <div class="card" x-data="{elem: 1}">
        <div class="card-head">
          <ul class="flex justify-between text-center" >
            <li class="w-full" >
              <a class="w-full block py-2 hover:bg-green-500 transition" x-bind:class="elem == 1 ? 'bg-green-400' : 'bg-green-100'" @click="elem = 1" href="#">Vokabel</a>
            </li>
            <li class="w-full" >
              <a class="w-full block py-2 hover:bg-green-500 transition" x-bind:class="elem == 2 ? 'bg-green-400' : 'bg-green-100'" @click="elem = 2" href="#">Numbers</a>
            </li>
          </ul>
        </div>
        <div class="w-full">
          <div class="nav-tabs-cards" x-show="elem == 1" x-transition>
            <livewire:vokabels.list-vokabels />
          </div>
          <div class="nav-tabs-cards" x-show="elem == 2" x-transition>
            <livewire:numbers.list-numbers />
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
