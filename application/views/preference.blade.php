@extends('templates.main')
@section('links')
    <link rel="stylesheet" href="public/css/preference.css">
@endsection
@section('content')


<h2>Mes préférences</h2>

<p>Ce que je souhaite et/ou préfère éviter</p>


<form method="get" action="{{URL_INDEX}}?action=preference">
        <textarea name="commentaire" id="commentaire"></textarea>
        <button type="submit">Valider</button>

        <div class="preference">
            @php 
                $preference = ['Animaux' => 'gift', 'Cuisine' => 'gift', 'Enfants' => 'gift', 'Livres et journaux' => 'gift', 'Maison' => 'home', 'Mode et accessoires' => 'gift', 'Passions et loisirs' => 'gift', 'Vins et spiritueux' => 'gift']
            @endphp

            @foreach($preference as $categorie => $icon)
                <div class="categorie">
                    <div class="name">
                        <p>@icon(['icon'=> $icon]) {{ $categorie }}</p>
                    </div>
                    <div class="select">
                        <input type="radio" name="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}" id="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}_0" value="0">
                        <label for="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}0">x</label>
                        @for($i = 1; $i < 6; $i++)
                            <input type="radio" name="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}" id="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}{{ $i }}" value="{{ $i }}">
                            <label for="{{ pregreplace('/\s+/', '', strtolower($categorie)) }}_{{ $i }}">{{$i}}</label>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>

</form>
@endsection