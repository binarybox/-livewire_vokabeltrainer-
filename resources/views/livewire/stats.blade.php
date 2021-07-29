<div>
  <div class="container">

    <h1 class="mt-4 mb-4">Stats</h1>
    <div>
      <div class="card" x-data="{elem: 1}">
        <div class="card-head">
          <ul class="nav nav-tabs nav-fill" >
            <li class="nav-item" >
              <a class="nav-link" x-bind:class="elem == 1 ? 'active' : ''" @click="elem = 1" href="#">Vokabel</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" x-bind:class="elem == 2 ? 'active' : ''" @click="elem = 2" href="#">Numbers</a>
            </li>
          </ul>
        </div>
        <div class="d-flex cards-wrapper">
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
