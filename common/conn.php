<?php
ini_set('date.timezone','Asia/Shanghai');//PHP时区
$con=mysqli_connect(constant("mysql_servername"),constant("mysql_username"),constant("mysql_password"),constant("mysql_database"));
mysqli_query($con,"SET NAMES 'utf8'");//数据库编码
mysqli_query($con,"SET time_zone = '+8:00'")//数据库时区
?>