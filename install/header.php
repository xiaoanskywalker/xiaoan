<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /install/header.php
 */
?><head>
    <meta charset="UTF-8">
    <title>小安社区-安装向导</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/style.css">
</head>
<body>
<div class="install">
    <center>
        <h1 class="text-primary">Xiaoanbbs V0.5.0--安装向导</h1><p>
    </center>
    <hr>
    <?php
    if(file_exists("../common/config.php")) {
    die ("请删除配置文件./common/config.php 后才能安装！<a href='../' class='btn btn-primary'>返回</a>");}