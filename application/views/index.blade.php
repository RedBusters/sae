@extends('templates.main')
@section('content')
    <h2>Le site pour organiser simplement vos évènements avec remise de cadeaux !</h2>
    <ul>
      <li>Pas d'incription nécessaire, la liste des invités suffit pour créer l'évènement</li>
      <li>Vous récupérez directement une liste de liens indiquant à chacun à qui il offrira son cadeau</li>
      <li>Ce service est entièrement gratuit !</li>
    </ul>
@endsection

@section('cta')
<h3><a href="{{URL_INDEX}}?action=create">@icon(['icon'=>'calendar-plus', 'text'=>' Créez votre évènement maintenant !', 'class'=>'icon-neutral'])</a></h3>

     

@endsection
