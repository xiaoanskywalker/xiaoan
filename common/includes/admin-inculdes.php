<?php
/**
 * Xiaoanbbs 0.4.0
 * Created by Xiaoan
 * File: /common/includes/admin-includes.php
 */
if (!empty($_POST['login'])) {
    /*管理员二次登录操作*/
    $pwd = $_POST["password"];
    $code = $_POST["checkcode"];

    if (empty($pwd)) {
        array_push($page['message']['error'], '密码为空');
    }
    $check = Site::checkcode($code);
    if ($check==0){
        array_push($page['message']['error'], '验证码错误');
    }

    if (empty($page['message']['error'])) {
        try {
            $user = User::login($user->name, $pwd);
            $_SESSION["admin"] = $user;
            $_SESSION["welcome"] = 1;
            header("location:./");
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }

    }
}

if (!empty($_POST['settings'])) {
    $ifopen = $_POST["ifopen"];
    $webname = $_POST["webname"];
    $keywords = $_POST["keywords"];
    $description = $_POST["description"];

    if ($ifopen != 1 and $ifopen != 0) {
        array_push($page['message']['error'], '是否开启站点选项填写错误');
    }

    if (empty($page['message']['error'])) {
        try {
            Admin::changesettings($ifopen, $webname, $keywords, $description);
        } catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
        array_push($page['message']['accept'], '设置已经保存');
    }
}