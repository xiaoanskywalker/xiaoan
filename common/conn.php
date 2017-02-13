<?php

//ini_set('date.timezone', 'Asia/Shanghai');//PHP时区
//$con = mysqli_connect(constant("mysql_servername"), constant("mysql_username"), constant("mysql_password"), constant("mysql_database"));
//mysqli_query($con, "SET NAMES 'utf8'");//数据库编码
//mysqli_query($con, "SET time_zone = '+8:00'")//数据库时区

require_once 'config.php';

$con = new mysqli(constant("mysql_servername"), constant("mysql_username"), constant("mysql_password"), constant("mysql_database"));
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$con->query("SET NAMES 'utf8'");//数据库编码
$con->query("SET time_zone = '+8:00'");
