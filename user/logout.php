<?php
session_start();
require "../model/Site.php";
require "../model/User.php";
User::logout();
$gotoo=Site::gotoo(@$_REQUEST["goto"]);
$_SESSION["welcome"]=3;
header("location:$gotoo");
?>
