<?php
/*发帖模块*/
if (!empty($_POST['sendtopic'])) {
    /*获取帖子参数*/
    $title = $_POST["title"];
    $topic = $_POST["topic"];
    /*帖子合法性检测*/
    if (empty($title)) {
        array_push($page['message']['error'], '帖子标题为空');
    }
    if (empty($topic)) {
        array_push($page['message']['error'], '帖子内容为空');
    }
    if (empty($user)) {
        array_push($page['message']['error'], '用户未登录');
    }
    /*执行数据库中的插入主题帖操作*/
    if (empty($page['message']['error'])) {
        try {
            $user = Post::newtopic($title,$topic);
        } catch (Exception $e) {
            array_push($page['message']['accept'], $e->getMessage());
        }

    }
}

/*回帖模块*/
if (!empty($_POST['sendreply'])) {
    $reply = $_POST["reply"];
    if (empty($reply)) {
        array_push($page['message']['error'], '回帖内容为空');
    }
    if (empty($user)) {
        array_push($page['message']['error'], '用户未登录');
    }
    /*执行数据库中的插入回复帖操作*/
    if (empty($page['message']['error'])) {
        try {
            $doreply = Post::newReply($tid,$reply);
        } catch (Exception $e) {
            array_push($page['message']['accept'], $e->getMessage());
        }

    }
}