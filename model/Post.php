<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /model/Post.php
 */
class Post{
    public static $page_count = 40;
    public $id;
    public $title;
    public $username;
    public $date;
    public $content;
    public $topictype;
    public $lzuser;
    public $reply;
    public $replytime;
    public $rid;
    public $url;

    function __construct($id, $title, $username, $date, $content,$topictype,$lzuser,$reply,$replytime,$rid){
        $this->id = $id;
        $this->title = $title;
        $this->username = $username;
        $this->date = $date;
        $this->content = $content;
        $this->topictype = $topictype;
        $this->lzuser = $lzuser;
        $this->reply = $reply;
        $this->replytime = $replytime;
        $this->rid = $rid;
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
        if (!$row) {
            return null;
        }
        return new Post($row['tid'], $row['titles'], $row['users'], $row['date'], $row['posts'],$row['topictype'],$row['user'],
            $row['reply'],$row['date'],$row['rid']);
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
        $stat = $con->prepare("SELECT * FROM wtb_titles WHERE topictype=1 OR topictype=3 ORDER BY tid DESC limit ?,?");
        $stat->bind_param('ii', $offset, $limit);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }
        return $arr;
    }

    static function getStickTop()
    {
        global $con;
        $result = $con->query("SELECT * FROM wtb_titles WHERE topictype=2 OR topictype=4");

        $arr = array();

        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }
        return $arr;
    }

    /**
     * @param int $num 从第几页开始，1开始数
     * @return array
     */
    static function getPage($num = 1)
    {

        $res = Post::getPosts(($num - 1) * Post::$page_count, Post::$page_count);
        /**
         * 得到置顶帖
         */
        if ($num == 1) {
            $top = Post::getStickTop();
            return array_merge($top, $res);
        }
        return $res;
    }

    static function newtopic($title,$topic){
        global $con;
        global $user;
        $usr = $user->name;
        $time = date('Y-m-d h:m:s');
        $stat = $con->prepare("INSERT INTO wtb_titles VALUES (null,?,?,?,?,1)");
        $stat->bind_param('ssss',$usr,$title,$time,$topic);
        $stat->execute();
        throw new Exception('发帖成功！');
    }

    static function getreplys($tid,$page){
        global $con;
        $limit[0] = ($page-1) * Post::$page_count;
        $limit[1] = $page * Post::$page_count;
        $stat = $con->prepare("SELECT * FROM wtb_reply WHERE tid=? AND deleted=0 ORDER BY rid DESC limit ?,?");
        $stat->bind_param('iii',$tid,$limit[0], $limit[1]);
        $stat->execute();
        $result = $stat->get_result();
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }
        return $arr;
    }

    static function getReplyTopic($tid){
        global $con;
        $stat=$con->prepare("SELECT * FROM wtb_titles WHERE tid=?");
        $stat->bind_param('i',$tid);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Post::from($row);
    }

    static function newReply($tid,$reply){
        global $con;
        global $user;
        $usr = $user->name;
        $time = date('Y-m-d h:m:s');
        $stat = $con->prepare("INSERT INTO wtb_reply VALUES (null,?,?,?,?,0)");
        $stat->bind_param('ssss',$tid,$usr,$reply,$time);
        $stat->execute();
        throw new Exception('回帖成功！');
    }

    static function show_prefix()
    {
        global $con;
        $row = $con->query("SELECT * FROM wtb_settings where sid=1")->fetch_row();
        return $row[4];
    }
    static function topictype ($type){
        switch ($type){
            case 1:
                return null;
                break;
            case 2:
                return "[置顶]";
                break;
            case 3:
                return "[精华]";
                break;
            case 4:
                return "[置顶][精华]";
                break;
            default:
                return null;
        }
    }

    static function gettype($tid){
        global $con;
        $stat = $con->prepare("SELECT * FROM wtb_titles where tid=?");
        $stat->bind_param('i', $tid);
        $stat->execute();
        $row = $stat->get_result()->fetch_array();
        return Post::from($row);
    }
    static function listnewreply(){
        global $con;
        $result = $con->query("SELECT * FROM wtb_reply WHERE ifread=0");
        $arr = array();
        while ($row = $result->fetch_array()) {
            array_push($arr, Post::from($row));
        }
        return $arr;
    }

    static function newreplynun(){
        global $user;
        $newreplyids = array();
        foreach (Post::listnewreply() as $value){
            $lzuid = Post::gettype($value->id);
            if($lzuid->username == $user->name){
                array_push($newreplyids,$lzuid->username);
            }
        }
        return $newreplyids;
    }
}