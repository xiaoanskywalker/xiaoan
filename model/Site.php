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

    static function checkcode($code){
        $code=md5($code);
        if($code==$_SESSION["verification"]){
            return true;
        }else{
            return false;
        }
    }

}