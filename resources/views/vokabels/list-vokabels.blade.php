<div x-data="{open_add: false}">
<div class="pt-4 flex justify-center">
<div>
  <x-h2>List ({{$total_vokabels}}) Vokabels</x-h2>
  <div class="row">
    <x-form-group>
      <x-input value="search" placeholder="search"/>

    </x-form-group>
    <x-form-group>
      <x-button type="button" click="open_add = true">Add vokabel</x-button>
    </x-form-group>
  </div>
  <div class="overflow-hidden transition-all duration-1000 m-y-4"
  style="height: 0px" x-bind:style="open_add ? 'height: calc( 1rem + ' + $refs.container.scrollHeight + 'px)' : 'height: 0px'"
  x-on:window.livewire.addVokabel="open_add = false"
  x-ref="container">
    <x-card>
      <div class="flex justify-between ">
        <h2>Add Vokabel</h2>
        <x-button click="open_add = false" variant="gray" outline round>
          <i class="material-icons">close</i>
        </x-button>
      </div>
      <div class="card-body">
        <livewire:vokabels.add-vokabel />
      </div>
    </x-card>

  </div>
</div>
</div>
<div class="card-body">
<div>
    <ul class="flex lg:flex-wrap items-center flex-col lg:flex-row">
      @foreach($vokabels as $key => $vokabel)
      <li class="w-full lg:w-1/2">
        <livewire:vokabels.single-vokabel :vokabel="$vokabel" key="vokabel-id-{{$vokabel->getKey()}}" />
      </li>
        @endforeach
    </ul>
  </div>
  @if($page_start - 1 != $last_page)
  <nav class="flex justify-center m-2 py-4 gap-4">
    <x-page-link click="previousPage" disabled="{{$page == 1}}" >Previous</x-page-link>
    <x-page-link click="setPage(1)" active="{{$page == 1}}" >1</x-page-link>
    @if($page_start > 2)
    <x-page-link  disabled >...</x-page-link>
    @endif
      @for($i = 2; $i <= $last_page - 1; $i++)
      @if($page -3 < $i && $page +3 > $i)
      <x-page-link active="{{$page == $i}}" click="setPage({{$i}})">{{$i}}</x-page-link>
      @endif
      @endfor
    @if($page + 3 < $last_page)
    <x-page-link disabled>...</x-page-link>
    @endif
    <x-page-link active="{{$page == $last_page}}" click="setPage({{$last_page}})">{{$last_page}}</x-page-link>
    <x-page-link disabled="{{$page == $last_page}}" click="nextPage">Next</x-page-link>
  
</nav>
@endif
</div>
</div>
