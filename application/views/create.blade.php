@extends('templates.main')
@section('content')
    <h2>Nouvel évènement</h2>
    <form action="{{URL_INDEX}}?action=create" method="post">
      <h3>@icon(['icon'=>'user']) Organisé par
          <input type="text" name="pseudo" id="pseudo1" placeholder="Mon nom ou pseudo" required/></h3>
      <h3>@icon(['icon'=>'calendar']) <label for="datee">Évènement le </label>
          <input type="date" name="event_dt" id="datee" required/></h3>
      <h3>@icon(['icon'=>'notepad']) <label for="description">Description </label>
           <input type="text" name="description" id="description" placeholder="C'est Noël (ou pas)" required/></h3>
      <h3>@icon(['icon'=>'gift']) <label for="max">Montant max </label>
           <input type="number" name="max" id="max" required/> €</h3>
    <h3>@icon(['icon'=>'calendar']) <label for="reveal">Reveal le : </label>
          <input type="date" name="reveal_dt" id="reveal" required/></h3>
      <h3>@icon(['icon'=>'group']) <label for="pseudos">Invités <small>(Un par ligne)</small></label>   <br>
         <textarea id="pseudos" name="pseudos" required rows="5" cols="25"></textarea>
      </h3>
      <h2><input type="submit" value="Créer cet évènement"></h2>
    </form>
@endsection
