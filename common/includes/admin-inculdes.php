<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
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

if (!empty($_POST['recovertopics'])) {
    $chk = $_POST["chk"];
    $retid = array();
    if(count($chk) == 0){
        array_push($page['message']['error'], '请至少选择一个帖子');
    }
    if (empty($page['message']['error'])) {
        try{
            foreach ($chk as $key=>$value){
                array_push($retid,$key);
            }
            foreach($retid as $value){
                Admin::changetopictype($value,1);
            }
            array_push($page['message']['accept'], '帖子恢复成功');
        }catch (Exception $e) {
            array_push($page['message']['error'], $e->getMessage());
        }
    }
}