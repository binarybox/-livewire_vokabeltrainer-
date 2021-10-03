<?php
use Carbon\Carbon;

?>

<form wire:submit.prevent="save" id="ans-{{ $vokabel->id }}" class="flex justify-between px-4 py-4">
  <div class="w-1/12">
      {{$vokabel->counter}}
  </div>
  <div class="w-1/12">
    @if ($vokabel->solved)
      {{Carbon::create($vokabel->solved)->format('j.m.Y')}}
    @else
      {{"---"}}
    @endif
  </div>
    <div class="w-4/12 px-4">
      <x-input type="text" value="vokabel.word" />

    </div>
    <div class="w-4/12">
      <ul class="flex flex-wrap">
        @foreach($vokabel->answers as $key => $answer)
        <li>
          {{$answer->word}}{{$key == count($vokabel->answers) - 1 ? '': ', '}}
        </li>
        @endforeach
      </ul>
    </div>
    <div class="w-1/12">
      <x-button type="submit"><i class="material-icons">save</i></x-button>
    </div>
    <div class="w-1/12">
      <x-button type="button" variant="danger" wire-click="remove"><i class="material-icons">delete</i></x-button>
    </div>
</form>
