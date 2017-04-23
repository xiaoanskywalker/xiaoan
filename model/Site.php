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
}