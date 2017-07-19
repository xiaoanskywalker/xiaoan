<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /user/index.php
 */
session_start();
if($_SESSION["user"]==null){
    header("location:./login.php");
}
else{
    header("location:./myhome.php");
}