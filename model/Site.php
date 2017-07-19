<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /model/Site.php
 */
class Site
{
    public static $page_count = 40;
    public $title;
    public $keywords;
    public $description;
    public $replynumber;
    public $ifopen;
    public $allowpost;
    public $allowreg;

    function __construct($title, $keywords, $description,$replynumber,$ifopen,$allowpost,$allowreg)
    {
        $this->title = $title;
        $this->keywords = $keywords;
        $this->description = $description;
        $this->replynumber = $replynumber;
        $this->ifopen = $ifopen;
        $this->allowpost = $allowpost;
        $this->allowreg = $allowreg;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Site($row['webname'], $row['keywords'], $row['description'],$row['count( * )'],$row['opened'],$row["allowpost"],$row["allowreg"]);
    }

    static function get()
    {
        global $con;
        $result = $con->query("SELECT * FROM wtb_settings where sid=1");
        $row = $result->fetch_array();
        return Site::from($row);
    }

    static function checkcode($code)
    {
        $code = md5($code);
        if ($code == $_SESSION["verification"]) {
            return 1;
        } else {
            return 0;
        }
    }

    static function pagefirst($page)
    {
        if (@$page == null) {
            return 1;
        }
        if (!is_numeric($page)) {
            return 1;
        };
        if ($page <= 0) {
            return 1;
        }
        return round($page);
    }

    static function pagination($page,$url)
    {
        global $pagination;
        for ($i = -5; $i <= 5; $i++) {
            $id = $page + $i;
            if ($id >= 1) {
                $temp = array('id' => $id, 'url' => $url. $id);
                array_push($pagination, $temp);
            }
        }
        return null;
    }

    static function gotoo($url){
        if ($url==null){
            return "../index.php?";
        }else{
            return $url;
        }
    }

    static function welcome($type,$user,$site){
        /*首页欢迎信息 type数值意义：
        1表示登录成功欢迎信息，2表示注册成功欢迎信息，3表示退出登录成功欢迎信息。
        4表示请先退出登录后再重新登录，5表示您已经登录，请先退出登录后再注册新账号， 6表示请登录后再进入个人中心。
        7表示没有权限进入管理中心，8表示管理员退出登录成功信息。
        */
        switch ($type){
            case 1:
                return "欢迎回来，<b>$user->name</b>";
                break;
            case 2:
                return "<b>$user->name</b>，欢迎加入$site->description 的大家庭";
                break;
            case 3:
                return "您已经成功退出登录";
                break;
            case 4:
                return "您已经登录，请先退出登录后再重新登录";
                break;
            case 5:
                return "您已经登录，请先退出登录后再注册新账号";
                break;
            case 6:
                return "您尚未登录，请登录后再进入个人中心/管理中心";
                break;
            case 7:
                return "您不是站点管理员，没有权限进入管理中心";
                break;
            case 8:
                return "您已经成功退出管理中心";
                break;
            default:
                return null;
        }
    }

    static function replynumber($tid){
        global $con;
        $stat = $con->prepare("SELECT count( * ) FROM wtb_reply WHERE tid =?");
        $stat->bind_param('i', $tid);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Site::from($row);
    }

    static function ifopen(){
        global $con;
        $row = $con->query("SELECT * FROM wtb_settings WHERE sid =1")->fetch_array();
        return Site::from($row);
    }
}