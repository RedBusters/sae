@extends('templates.main')
@section('content')

<form action="{{URL_INDEX}}?action=preference" method="post">
<h3>@icon(['icon'=>'notepad']) <label for="pref">Ce que je souhaite/ou préfère éviter </label>
           <input type="text" name="pref" id="pref" placeholder="j'aimerais ..." required/></h3>
<h2><input type="submit" value="valider"></h2>
</form>

<?php
$preferences = get_all_preferences($_SESSION["id"]); 
?>
@endsection