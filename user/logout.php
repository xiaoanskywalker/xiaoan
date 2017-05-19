<?php
session_start();
require "../model/Site.php";
require "../model/User.php";
User::logout();
$gotoo=Site::gotoo(@$_REQUEST["goto"]."&welcome=3");
header("location:$gotoo");
?>
