<?php

require_once '../common/conn.php';
require "../model/User.php";
$user=User::getByName("a");
echo $user->id;