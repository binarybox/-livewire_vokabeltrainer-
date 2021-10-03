@props(['variable' => '', "name" => 'name'])

<div x-ref="{{$name}}"
x-bind:style="{{$variable}} ? 'height: ' + $refs.{{$name}}.scrollHeight + 'px' : 'height: 0px'"
class="overflow-hidden transition-all">
    {{$slot}}
</div>