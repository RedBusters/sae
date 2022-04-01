@extends('templates.main')

@section('content')


<h2>Mes préférences</h2>

<p>Ce que je souhaite et/ou préfère éviter</p>


<form method="get" action="{{URL_INDEX}}?action=preference">

        <input type="hidden" name="action" value="preference">
        @php
            $user_pref = get_all_preferences($_SESSION["id"]);
            $comm ="";
            $prefs_titre = [];
        
            foreach($user_pref as $pref){
                

                if($pref["description"] == "commentaire"){
                    $comm = $pref["score"];
                }else{
                    $prefs_titre[$pref["description"]] = $pref["score"];
                }
            }
            
          
        @endphp
        <textarea name="commentaire" id="commentaire">{{ $comm }}</textarea>
        <button type="submit">Valider</button>

        <div class="preference">
            @php 
                $preference = [];
                foreach($user_pref as $pref){
                    if($pref["description"] != "commentaire"){
                        $preference[$pref["description"]] = 'gift';
                    }
                }
                
            @endphp

            @foreach($preference as $categorie => $icon)
                <div class="categorie">
                    <div class="name">
                        <p>@icon(['icon'=> $icon]) {{ preg_replace(["(_)"], [" "], strtolower($categorie)) }}</p>
                    </div>

                    <div class="select">
                        <input type="radio" name="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}" id="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}_0" value="0" 
                        @if($prefs_titre[$categorie]== '0')
                        checked="true"
                        @endif>
                        <label for="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}_0">x</label>
                        @for($i = 1; $i < 6; $i++)
                            <input type="radio" name="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}" id="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}_{{ $i }}" value="{{ $i }}" 
                            @if($prefs_titre[$categorie]== $i)
                            checked="true"
                            @endif>
                            <label for="{{ preg_replace('/\s+/', '_', strtolower($categorie)) }}_{{ $i }}">{{$i}}</label>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>

</form>
@endsection