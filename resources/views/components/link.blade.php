@props(['class' => null, 'href'])
<a class="border-b-2 transition hover:border-green-500 @if($class) {{$class}} @endif" href="{{$href}}">{{$slot}}</a>
