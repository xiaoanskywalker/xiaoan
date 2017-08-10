<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /common/includes/newpost.php
 */

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

/*解封模块*/
$page["endblock"] = User::ifblock($user->id)->endblock;
if($page["endblock"] != null ){
    if(strtotime("now") >= strtotime($page["endblock"])){
        User::endblock($user->id);
        $page["endblock"] = null;
    }
}