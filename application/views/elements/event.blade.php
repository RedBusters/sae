<div class="event">
  <a href="{{URL_INDEX}}?action=event&amp;id={{$event['idInvitation']}}">
    <h3>@icon(['icon'=>'calendar','class'=>'icon-neutral']) {{format_date($event['event_dt'])}}</h3>
        <h4>Organisé par {{$event['pseudoAdmin']}}</h4>
    <p>{{$event['description']}}</p>
      <?php
     
      if( has_passed($event["reveal_dt"]) ) {
        echo "<h4>Apportez un cadeau pour ".$event['pseudoTarget']."</h4>";
      } else {
        echo "<h4>Reveal la cible le : ".$event["reveal_dt"]."</h4>";

      }

        ?>
    <h4>
    @if($event['status'] =='accepted' && has_passed($event["reveal_dt"]) )
    @icon(['icon'=>'gift','text'=>" < $event[max] €"])
    @endif
    @if($event['status'] =='invite' && !has_passed($event["reveal_dt"]) )
    <a href="{{URL_INDEX}}?action=inv_process&accept=1&inv_id={{ $event['id'] }}"> @icon(['icon'=>'user-check','class'=>'icon-neutral', 'text'=>" Accepter "])</a>
    <a href="{{URL_INDEX}}?action=inv_process&accept=0&inv_id={{ $event['id'] }}"> @icon(['icon'=>'user-x','class'=>'icon-neutral', 'text'=>" Refuser "])</a>
    @endif
    </h4>

  </a>
</div>
