@props(["route" => "#", "name" => "Name"])
<div class="px-4 py-2 hover:bg-green-500 hover:text-white transition @if(\Route::current()->getName() == $route) text-white bg-green-400 @endif">
    <a href="{{route($route)}}">{{$name}}</a>
</div>