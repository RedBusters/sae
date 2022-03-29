<?php
function url_token($pseudo,$token){
  return htmlspecialchars(BASE_URL."?action=invitation&pseudo=$pseudo&token=$token");
}

function url_token_raw($pseudo,$token){
  return BASE_URL."?action=invitation&pseudo=$pseudo&token=$token";
}
?>
