@extends('templates.main')

@section('content')

@include('elements.event',$event)

@if($event['status']==ADMIN)
<h2>Invités</h2>
  @each('elements.invitation',$invitations,'p')
@endif

@endsection


@section('cta')
<h3><a href="{{URL_INDEX}}?action=list&id={{ $event['id'] }}" download="liste.txt">@icon(['icon'=>"import", 'text'=>"Télécharger", 'class'=>"icon-neutral"])</a></h3>



@if($event['status']==ADMIN)
<h3>Envoyez à chaque invité le lien correspondant</h3>



@else

<h3>Merci de votre participation !</h3>
@endif
@endsection
