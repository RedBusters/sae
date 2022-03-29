@php($url = URL_ICON."bx-$icon.png")
@if(isset($text))
<span class="icon @isset($class){{$class}}@endisset"><img src="{{$url}}" alt="icone {{$icon}}">{{$text}}</span>
@else
<img class="icon @isset($class){{$class}}@endisset" src="{{$url}}" alt="icone {{$icon}}">
@endif
