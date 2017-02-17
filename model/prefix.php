<?php
/*
 *
 class prefix{
    public $prefix;
    public $row;
    function _contrast($prefix){
        $this->prefix=$prefix;
    }
*/
    function showprefix(){
        global $con;
        global $row;
        $row = mysqli_fetch_row(mysqli_query($con,"SELECT * FROM wtb_topic_settings where tsid=1"));
    }
//}