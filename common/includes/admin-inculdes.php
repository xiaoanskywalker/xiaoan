<?php
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