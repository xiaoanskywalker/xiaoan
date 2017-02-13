<?php


class Post
{
    public static $page_count = 40;

    public $id;
    public $title;
    public $username;
    public $date;
    public $content;
    public $url;


    function __construct($id, $title, $username, $date, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->username = $username;
        $this->date = $date;
        $this->content = $content;
        $this->url = '/showtopic.php?tid=' . $id;
    }

    function getDate()
    {
        $temp = explode(" ", $this->date);
        $date = explode("-", $temp[0]);
        $time = explode(":", $temp[1]);
        return date('m月d日', mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]));
    }

    static function from($row)
    {
        return new Post($row['tid'], $row['titles'], $row['users'], $row['date'], $row['posts']);
    }

    static function get($id)
    {
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_titles where tid=?");
        $stat->bind_param('i', $id);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Post::from($row);
    }

    /**
     * @param int $offset 从第几条记录开始，0开始数
     * @param int $limit
     * @return array
     */
    static function getPosts($offset, $limit = 1)
    {


        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_titles ORDER BY tid DESC limit ?,?");
        $stat->bind_param('ii', $offset, $limit);
        $stat->execute();
        $result = $stat->get_result();

        $arr = array();

        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }

//        echo '<script>alert' . '(' . $arr[0]->title . ')' . '</script>';

        return $arr;
    }

    /**
     * @param int $num 从第几页开始，1开始数
     * @return array
     */
    static function getPage($num = 1)
    {
        return Post::getPosts(($num - 1) * Post::$page_count, Post::$page_count);
    }

}