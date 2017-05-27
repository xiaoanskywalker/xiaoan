<?php
session_start();
if($_SESSION["user"]==null){
    header("location:./login.php");
}
else{
    header("location:./myhome.php");
}