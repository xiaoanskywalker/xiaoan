<?php
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
session_start();
require_once '../common/conn.php';
$action=$_REQUEST["action"];
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../static/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../static/css/style.css">

</head>
<body>

<div class="layout">
    <div class="top-bar">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">小安社区</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">

        <header class="header jumbotron">
            <p>小安社区，追求简单、极致</p>
        </header>

        <main class="main">
            <aside class="sidebar">
                <ul>
                    <li><a href="#"><i class="zmdi zmdi-comments"></i>登录</a></li>
                    <li><a href="#"><i class="zmdi zmdi-star"></i>注册</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="discussion-list">
                    <?php
                    if ($action=="login"){
                        require_once "./includes/passport_login.php";
                    }
                    elseif ($action=="register"){
                        require_once "./includes/passport_register.php";
                    }
                    else{
                        unset($_SESSION["user"]);
                        header ("location:../");
                    }
                    ?>


                </div>
            </div>
        </main>
    </div>
</div>


<script src="../static/js/jquery-2.2.4.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script>

</body>
</html>

