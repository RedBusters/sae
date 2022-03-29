<div class="invitation">
  @switch($p['status'])
    @case(ADMIN) @icon(['icon'=>'cog','class'=>'icon-ok'])
      @break
    @case(INVITE) @icon(['icon'=>'user-plus','class'=>'icon-neutral'])
      @break
  @endswitch
  <p>{{$p['pseudo']}}</p>
  <textarea type="url"  readonly>{!!url_token($p['pseudo'],$p['token'])!!}</textarea>
</div>
