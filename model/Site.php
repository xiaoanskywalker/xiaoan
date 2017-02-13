<?php



class Site
{

    public $title;
    public $keywords;
    public $description;

    function __construct($title, $keywords, $description)
    {
        $this->title = $title;
        $this->keywords = $keywords;
        $this->description = $description;
    }

    static function from($row)
    {
        return new Site($row['name'], $row['keywords'], $row['description']);
    }

    static function get()
    {
        global $con;
        $result = $con->query("SELECT * FROM wtb_general_settings where gid=1") or die("连接到数据库时出现错误。");
        $row = $result->fetch_array();
        return Site::from($row);
    }


}