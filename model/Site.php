<?php
class Site
{

    public $title;
    public $keywords;
    public $description;
    public $code;

    function __construct($title, $keywords, $description)
    {
        $this->title = $title;
        $this->keywords = $keywords;
        $this->description = $description;
    }

    static function from($row)
    {
        if (!$row) {
            return null;
        }
        return new Site($row['name'], $row['keywords'], $row['description']);
    }

    static function get()
    {
        global $con;
        $result = $con->query("SELECT * FROM wtb_general_settings where gid=1");
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
            return "../";
        }else{
            return $url;
        }
    }

    static function welcome($type,$user,$site){
        /*首页欢迎信息 type数值意义：
        1表示登录成功欢迎信息，2表示注册成功欢迎信息，3表示退出登录成功欢迎信息
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
            default:
                return null;
        }
    }
}