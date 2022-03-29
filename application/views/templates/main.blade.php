<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Qui offre à qui ?</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota&family=Monoton&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL_CSS}}normalize.css">
    <link rel="stylesheet" href="{{URL_CSS}}icon.css">
    <link rel="stylesheet" href="{{URL_CSS}}elements.css">
    <link rel="stylesheet" href="{{URL_CSS}}style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{URL_IMG}}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL_IMG}}favicon-32x32.png">

  </head>
  <body>

    <nav>
      <a href="{{URL_INDEX}}">@icon(['icon'=>'home','text'=>'Accueil'])</a>
      <a href="{{URL_INDEX}}?action=create">@icon(['icon'=>'calendar-plus','text'=>'Créer un évènement'])</a>

      @if(isset($_SESSION['id']))
        <a href="{{URL_INDEX}}?action=profile">@icon(['icon'=>'user','text'=>$_SESSION['email']])</a>
        <a href="{{URL_INDEX}}?action=logout">@icon(['icon'=>'user-x','text'=>"Logout"])</a>
      @else
      <a href="{{URL_INDEX}}?action=login">@icon(['icon'=>'user','text'=>"login"])</a>
      @endif
    </nav>

    <div class="container-h">
      <h1>Qui <br> Offre <br>À Qui ?
        <img src="{{URL_IMG}}qoaq2.png"/></h1>

      <div class="container-v">
        <main>
            @isset($titre)<h2>{{$titre}}</h2>@endisset
            @yield("content")
        </main>

        <div class="cta">
            @yield("cta")
        </div>
      </div>
    </div>

    <footer>&copy; MMI Création 2022 -- tous droits réservés
    <a href="{{URL_INDEX}}?action=legal">Mentions légales</a>
    </footer>
  </body>
</html>
