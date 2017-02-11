<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<?php 
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
phpinfo();
?>
