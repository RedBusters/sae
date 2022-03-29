<?php
function make_icon($name,$text=null,$class=''){
  $url = URL_ICON."bx-$name.png";
  if ($text==null)   return "<img class=\"icon $class\" src=\"$url\" alt=\"icone $name\">";
  return "<span class=\"icon $class\"><img src=\"$url\" alt=\"icone $name\"/>$text</span>";
}
 ?>
