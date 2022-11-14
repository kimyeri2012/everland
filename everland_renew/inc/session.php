<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
//isset(조건)?  값1 : 값2;

$s_idx = isset($_SESSION["s_idx"])? $_SESSION["s_idx"] : "";
$s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"] : "";
$s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"] : "";


?>