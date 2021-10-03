@props(['class' => null])
<div class="py-2 mb-2 @if($class) {{$class}} @endif">{{$slot}}</div>
