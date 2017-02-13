<?php
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
session_start();
/*帖子分页预处理31*/
$page = @$_REQUEST["page"];
if ($page == null) {
    $page = 1;
}
is_numeric($page) or die("<script> alert('无效的参数!');window.navigate('./');</script>");
if ($page <= 0) {
    $page = 1;
    die("<script> alert('page参数非正整数!');window.navigate('./');</script>");
}


/**
 * 站点信息
 */
require_once './common/conn.php';
require_once './model/Site.php';
require_once './model/User.php';
require_once './model/Post.php';


$site = Site::get();

/**
 * 用户
 */

if ($_SESSION["user"]) {
    $user = User::getByName($_SESSION["user"]);
}


/**
 * 帖子
 */

$discussions = Post::getPage($page);

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


    <title><?= $site->title ?></title>
    <meta name='keywords' content='<?= $site->keywords ?>'/>
    <meta name='description' content='<?= $site->description ?>'/>

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
                                    <span><?= $user->name ?></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu user-nav">
                                    <li class="user-profile">
                                        <img src=".<?= $user->avatar ?>" class="avatar">
                                        <span class="username"><?= $user->name ?></span>
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
                                                         alt="<?= $discussion->username ?>"></a>
                                    </div>

                                    <div class="profile">
                                        <h3 class="title"><a
                                                    href=".<?= $discussion->url ?>"><?= $discussion->title ?></a>
                                        </h3>
                                        <div class="preview">
                                            <?= $discussion->content ?>
                                        </div>
                                        <div class="info">
                                            <a href="#" class="author"><?= $discussion->username ?></a>
                                            <span class="time"><?= $discussion->getDate() ?></span>
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

</body>
</html>

