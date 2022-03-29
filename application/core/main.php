<?php
require_once 'application/core/blade.php';
require_once 'application/config/config.php';
require_once 'application/config/routes.php';

$routing_result =  route();
$name = $routing_result['name'];
$params = $routing_result['params'];
if ($params != null) extract($params);
require "application/$name.php";

 ?>
