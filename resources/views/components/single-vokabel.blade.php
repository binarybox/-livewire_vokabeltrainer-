@props(['key' => null, "vokabel" => null])
@php
use Carbon\Carbon;
@endphp

<form wire:submit.prevent="save" class="flex justify-between px-4 py-4">
  <div class="w-1/12">
      {{$vokabel['counter']}}
  </div>
  <div class="w-1/12">
    @if ($vokabel['solved'])
      {{Carbon::create($vokabel['solved'])->format('j.m.Y')}}
    @else
      {{"---"}}
    @endif
  </div>
    <div class="w-4/12 px-4">
      <x-input type="text" value="vokabels.{{$key}}.word" />

    </div>
    <div class="w-4/12">
      <ul>
        @foreach($vokabel['answers'] as $answer)
        <li>
          <a href="#ans-{{$answer['id']}}">{{$answer['word']}}</a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="w-1/12">
      <x-button type="submit"><i class="material-icons">save</i></x-button>
    </div>
    <div class="w-1/12">
      <x-button type="button" variant="danger" click="remove"><i class="material-icons">delete</i></x-button>
    </div>
</form>
