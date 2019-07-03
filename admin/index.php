<?php
include_once('config/main.php');
include_once("config/autoload.php");

$cn = isset($_GET["ctl"])? $_GET["ctl"]: "posts";
$c = $cn."_controller";
$controller = new $c();
?>
