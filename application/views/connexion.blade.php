@extends('templates.main')
@section('content')
<form action="{{URL_INDEX}}?action=create" method="post">
    <label for="mail">@icon(['icon'=>'user']) Email </label>
    <input type="text" name="mail" id="mail" required/></h3>
    <label for="pass"> password </label>
    <input type="password" name="pass" id="pass" required/></h3>
      
    <h2><input type="submit" value="login"></h2>
    </form>
@endsection