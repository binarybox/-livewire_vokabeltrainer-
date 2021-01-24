<?php
use Carbon\Carbon;
 ?>

<form wire:submit.prevent="save" id="ans-{{ $vokabel->id }}" class="row">
  <div class="col-6 col-md-1">
      {{$vokabel->counter}}
  </div>
  <div class="col-6 col-md-2">
    @if ($vokabel->solved)
      {{Carbon::create($vokabel->solved)->format('j.m.Y H:i')}}
    @else
      {{"---"}}
    @endif
  </div>
    <div class="form-group col-6 col-md-3">
      <input type="text" class="form-control" wire:model="vokabel.word" value="vokabel.word" />

    </div>
    <div class="col-6 col-md-2">
      <ul>
        @foreach($vokabel->answers as $answer)
        <li>
          <a href="#ans-{{$answer->id}}">{{$answer->word}}</a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="col-6 col-md-2">
      <button type="submit" class="btn btn-primary btn-raised btn-block">update</button>
    </div>
    <div class="col-6 col-md-2">
      <button type="button" class="btn btn-danger btn-raised btn-block" wire:click="remove">remove</button>
    </div>
</form>
