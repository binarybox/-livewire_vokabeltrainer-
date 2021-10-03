@props(
[
  'type' => 'button', 
  'block' => false, 
  "wireClick" => null, 
  "click" => null, 
  "variant" => null, 
  "block" => false, 
  'round' => false,
  'outline' => false 
  ]
)
@php
$color = 'green';
switch($variant){
  case "secondary":
    $color = "blue";
    break;
  case 'gray': 
    $color = "gray";
    break;
  case 'danger':
    $color = 'red';
    break;
}
if($outline){
  $variant_class = "text-$color-500 hover:bg-$color-100";
}
else{
  $variant_class = "bg-$color-500 hover:shadow shadow-lg text-white";
}
@endphp
<button
  class="py-2 @if($round) px-2 rounded-full leading-none @else px-4 @endif font-semibold rounded transition @if($block) block w-full @endif {{$variant_class}}"
  @if($wireClick) wire:click="{{$wireClick}}" @endif
  @if($click) @click="{{$click}}" @endif
  type="{{$type}}"
  >{{$slot}}</button>
