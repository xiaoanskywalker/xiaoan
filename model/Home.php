<?php
class Home{

    static function Upload($dir){
        if($dir==null){
            return 0;
        }
        $show=array();
        array_push($show,$_FILES['myFile']['name']);
        array_push($show,$_FILES['myFile']['size']);
        array_push($show,$_FILES['myFile']['type']);
        array_push($show,$_FILES['myFile']['error']);
        move_uploaded_file($_FILES["myFile"]["tmp_name"],$dir.$_FILES["myFile"]["name"]);
        array_push($show,$dir.$_FILES["myFile"]["name"]);
        return $show;
    }
}