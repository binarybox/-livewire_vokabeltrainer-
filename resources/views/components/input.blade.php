@props(['type' => 'text', 'value' => null, "placeholder" => null, "block" => false, "class" => ''])

<input
  class="focus:outline-none transition border-b-2 focus:border-green-500 max-w-full @if($block) block w-100 @endif {{$class}}"
  placeholder="{{$placeholder}}"
  wire:model.lazy="{{$value}}"
  type="{{$type}}"
/>
