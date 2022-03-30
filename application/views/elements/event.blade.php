<div class="event">
  <a href="{{URL_INDEX}}?action=event&amp;id={{$event['idInvitation']}}">
    <h3>@icon(['icon'=>'calendar','class'=>'icon-neutral']) {{format_date($event['event_dt'])}}</h3>
        <h4>Organisé par {{$event['mail']}}</h4>
    <p>{{$event['description']}}</p>
      <?php
     
      if( has_passed($event["reveal_dt"]) ) {
        echo "<h4>Apportez un cadeau pour ".$event['pseudoTarget']."</h4>";
      } else {
        echo "<h4>Reveal la cible le : ".$event["reveal_dt"]."</h4>";
        
      }

        ?>
    <h4>
      @icon(['icon'=>'gift','text'=>" < $event[max] €"])
    </h4>

  </a>
</div>
