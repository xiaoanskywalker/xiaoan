<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/forbid--post.php
 */
if ($user == null){
    echo "请登录后再发帖";
}else{
    if(Site::ifopen()->allowpost == 0){
        echo "管理员已关闭发帖功能，目前只有站点管理员才能发帖";
    }
}