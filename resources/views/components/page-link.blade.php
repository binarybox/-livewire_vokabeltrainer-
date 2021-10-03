@props(['click' => null, "disabled" => false, "active" => false])

<div class="transition py-2 px-4 rounded-full @if(!$disabled)cursor-pointer hover:bg-green-500 @endif @if($active) bg-green-500 text-white @endif" @if($click) wire:click="{{$click}}" @endif>{{$slot}}</div>