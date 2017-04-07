<?php
error_reporting (E_ALL &~E_NOTICE &~E_DEPRECATED);
require_once 'config.php';
//require_once 'error.php';
$con = new mysqli(constant("mysql_servername"), constant("mysql_username"), constant("mysql_password"), constant("mysql_database"));
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
/*数据库编码及时区*/
$con->query("SET NAMES 'utf8'");
$con->query("SET time_zone = '+8:00'");
