<div x-data="{open_add: false}">
  <div
  class="toggler"
  style="height: 0px" x-bind:style="open_add ? 'height: ' + $refs.container.scrollHeight + 'px' : 'height: 0px'"
  x-on:window.livewire.addVokabel="open_add = false"
  x-ref="container">
    <div class="card ">
      <div class="card-header d-flex justify-content-between">
        <h2>Add Vokabel</h2>
        <button @click="open_add = false" class="btn btn-secondary">
          <i class="material-icons">close</i>
        </button>
      </div>
      <div class="card-body">
        <livewire:vokabels.add-vokabel />
      </div>
    </div>

  </div>
<div class="card-header">
  <h2 >list ({{$total_vokabels}}) Vokabels</h2>
  <div class="row">
    <div class="col-6">
      <input class="form-control" wire:model.lazy="search" placeholder="search"/>

    </div>
    <div class="col-6">
      <button type="button" @click="open_add = true" class="btn btn-primary btn-raised btn-block">add vokabel</button>
    </div>
  </div>
</div>
<div class="card-body">
<div>
    <ul>
      @foreach($vokabels as $key => $vokabel)
      <li class="vokabeln">
        <livewire:vokabels.single-vokabel :vokabel="$vokabel" key="vokabel-id-{{$vokabel->getKey()}}" />
      </li>
        @endforeach
    </ul>
  </div>
  @if($page_start - 1 != $last_page)
  <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item {{$page == 1 ? 'disabled' : ''}}"><a class="page-link" wire:click="previousPage">Previous</a></li>
    <li class="page-item {{$page == 1 ? 'active' : ''}}"><a class="page-link" wire:click="setPage(1)">1</a></li>
    @if($page_start > 2)
    <li class="page-item disabled"><a  class="page-link" >...</a></li>
    @endif
    @for($i = $page_start; $i <= $page_end; $i++)
    <li class="page-item {{$page == $i ? 'active' : ''}}"><a class="page-link " wire:click="setPage({{$i}})">{{$i}}</a></li>
    @endfor
    @if($page_end < $last_page - 1)
    <li class="page-item disabled"><a  class="page-link" >...</a></li>
    @endif
    <li class="page-item {{$page == $last_page ? 'active' : ''}}"><a class="page-link" wire:click="setPage({{$last_page}})">{{$last_page}}</a></li>
    <li class="page-item {{$page == $last_page ? 'disabled' : ''}}"><a class="page-link" wire:click="nextPage">Next</a></li>
  </ul>
  @endif
</nav>
</div>
</div>
