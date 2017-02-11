<meta http-equiv="content-type" content="text/html;charset=gb2312">
<?php 
session_start();
if(@$_SESSION["user"]==null or @$_SESSION["admin"]==null){header("Location:../");}
phpinfo();
?>
