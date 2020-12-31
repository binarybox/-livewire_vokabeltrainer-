<div>
<div class="card-header">
  <div class="row">

    <h2 class="col-6">List Vokabel ({{$vokabels->count()}})</h2>
    <div class="col-6">
        <input class="form-control" wire:model.debounce.1000ms="search" placeholder="search"/>
    </div>
  </div>
</div>
<div class="card-body">
<div>
    <ul>
      @foreach($vokabels as $key => $vokabel)
      <li class="vokabeln">
        <livewire:single-vokabel :vokabel="$vokabel" key="vokabel-id-{{$vokabel->getKey()}}" />
      </li>
        @endforeach
    </ul>
  </div>
</div>
</div>
