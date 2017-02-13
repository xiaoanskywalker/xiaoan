<?php
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
session_start();
/*帖子分页预处理*/
$page = @$_REQUEST["page"];
if ($page == null) {
    $page = 1;
}
is_numeric($page) or die("<script> alert('无效的参数!');window.navigate('./');</script>");
if ($page <= 0) {
    $page = 1;
    die("<script> alert('page参数非正整数!');window.navigate('./');</script>");
}
$pagestart = round(($page - 1) * 40);
$pageend = round($page * 40 + 1);


/**
 * 未实现内容
 * 获取每个发帖用户的头像
 * 获取每个帖子评论数量
 */


/**
 * 站点信息
 */

require_once './common/config.php';
require_once './common/conn.php';
$rs = mysqli_query($con,"SELECT * FROM wtb_general_settings where gid=1");
$row = mysqli_fetch_row($rs);

$site_info = array('title' => $row[1], 'keywords' => $row[2], 'description' => $row[3]);

/**
 * 用户
 */

$user = array('name' => $_SESSION["user"]);

if ($user['name'] != null) {
    $file = "./common/images/avatar/" . $user['name'] . ".png";
    if (file_exists($file)) {
        $user['avatar'] = $file;
    } else {
        $user['avatar'] = './static/img/avatar.jpg';
    }
} else {
    $user['avatar'] = './static/img/avatar.jpg';
}

/**
 * 帖子
 */
$discussions = array();

$rs = mysqli_query($con,"SELECT * FROM wtb_titles ORDER BY tid DESC limit $pagestart,$pageend");
while ($row = mysqli_fetch_row($rs)) {
    $discussion = array();
    $discussion['tid'] = $row[0];
    $discussion['author'] = $row[1];
    $discussion['title'] = $row[2];
    $discussion['time'] = $row[3];
    $discussion['preview'] = $row[4];

    $discussion['url'] = 'showtopic.php?tid=' . $row[0];

    $temp = explode("-", $row[3]);
    $discussion['time'] = date('m月d日', mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]));


    array_push($discussions, $discussion);
}

/**
 * 页码
 */
$pagination = array();

for ($i = -5; $i <= 5; $i++) {
    $id = $page + $i;
    if ($id >= 1) {
        $temp = array('id' => $id, 'url' => './?page=' . $id);
        array_push($pagination, $temp);
    }
}
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    echo "<title>$site_info[title]</title>";
    echo "<meta name='keywords' content='$site_info[keywords]' />";
    echo "<meta name='description' content='$site_info[description]' />";
    ?>
    <link href="./static/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./static/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./static/css/style.css">

</head>
<body>

<div class="layout">
    <div class="top-bar">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">小安社区</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if ($user['name'] == null) {
                            ?>
                            <li><a href="./user/login.php">登录</a></li>
                            <li><a href="./user/register.php">注册</a></li>
                            <?php
                        } else {
                            ?>
                            <li class="dropdown user-nav-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <span><?= $user['name'] ?></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu user-nav">
                                    <li class="user-profile">
                                        <img src="<?= $user['avatar'] ?>" class="avatar">
                                        <span class="username"><?= $user['name'] ?></span>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">我的空间</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
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
                    <li><a href="#"><i class="zmdi zmdi-comments"></i>话题</a></li>
                    <li><a href="#"><i class="zmdi zmdi-star"></i>关注</a></li>
                    <li><a href="#"><i class="zmdi zmdi-view-list"></i>分类</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="discussion-list">
                    <div id="search">
                        <ol>
                            <a href="#"><a href="./">首页</a>
                        </ol>
                    </div>
                    <ul class="discussions">

                        <?php
                        foreach ($discussions as $discussion) {
                            ?>
                            <li>
                                <div class="discussion">
                                    <div class="avatar-area">
                                        <?php
                                        //TODO 获取每个发帖用户的头像
                                        //TODO 点击头像、名称进入用户主页
                                        ?>
                                        <a href="#"><img src="./static/img/avatar.jpg" class="avatar"
                                                         alt="<?= $discussion['author'] ?>"></a>
                                    </div>

                                    <div class="profile">
                                        <h3 class="title"><a href="<?= $discussion['url'] ?>"><?= $discussion['title'] ?></a></h3>
                                        <div class="preview">
                                            <?= $discussion['preview'] ?>
                                        </div>
                                        <div class="info">
                                            <a href="#" class="author"><?= $discussion['author'] ?></a>
                                            <span class="time"><?= $discussion['time'] ?></span>
                                        </div>
                                    </div>

                                    <?php
                                    //TODO 获取每个帖子评论数量
                                    ?>
                                    <div class="count"><i class="zmdi zmdi-comments"></i>NaN</div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div id="addtopic">
                    发表主题 New Topic
                    <form method="POST" action="">
                        <input type=text id="mytext1" onKeyUp="keypress1()" name="title" placeholder="请输入标题...不能超过50个字" maxlength="50" size="50%" id="addtopictitle" >
                        <font color="gray">
                            <label id="name">你还可以输入50个字</label>
                        </font> <p>
                        <textarea class="form-control" id="myarea" name = "topic" required nKeyUp="keypress2()" onblur="keypress2()" placeholder="请输入内容...不能超过10000个字" maxlength="10000"></textarea>
                        <p><input type="submit" value="发帖" name="ok" class="btn btn-primary">
                            <font color="gray">
                                &nbsp;&nbsp;<label id="pinglun">你还可以输入10000个字</label>
                            </font>
                    </form>
                </div>
                <div class="toorbar">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                            foreach ($pagination as $temp) {
                                ?>
                                <li><a href="<?= $temp['url'] ?>"><?= $temp['id'] ?></a></li>
                                <?php
                            }
                            ?>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>


<script src="./static/js/jquery-2.2.4.min.js"></script>
<script src="./static/js/bootstrap.min.js"></script>
<script src="./static/js/addtopic.js"></script>
</body>
</html>

