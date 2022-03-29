@extends('templates.main')
@section('content')
  <h2>404 Page introuvable</h2>
  @isset($log)
    <h3>Log</h3>
     <p>{!!$log!!}</p>
  @endisset
@endsection
