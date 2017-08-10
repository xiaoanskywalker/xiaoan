<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/forbid--post.php
 */
if ($user == null){
    echo "请登录后再发帖";
}else{
    if(Site::ifopen()->allowpost == 0){
        echo "管理员已关闭发帖回帖功能，目前只有站点管理员才能发帖回帖";
    }
    if( $page["endblock"] != null){
        echo "您已经被管理员封禁账号，封禁至". $page["endblock"]."，被封禁期间您不能发帖或回帖";
    }
}