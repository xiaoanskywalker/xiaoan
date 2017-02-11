<?php
ini_set('date.timezone','Asia/Shanghai');
mysql_connect(constant("mysql_servername") ,constant("mysql_username") , constant("mysql_password"));
mysql_select_db(constant("mysql_database")); 
mysql_query("SET NAMES 'gbk'");//数据库编码
mysql_query("SET time_zone = '+8:00'")//数据库时区
?>