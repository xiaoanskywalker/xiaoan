<?php
if ((file_exists("./common/config.php")) == false) {
    header("location:./install/");
}
session_start();
/*帖子分页预处理31*/
$page = @$_REQUEST["page"];
if ($page == null) {
    $page = 1;
}
is_numeric($page) or die("<script> alert('无效的参数!');window.navigate('./');</script>");
if ($page <= 0) {
    $page = 1;
    die("<script> alert('page参数非正整数!');window.navigate('./');</script>");
}


/**
 * 站点信息
 */
require_once './common/conn.php';
require_once './model/Site.php';
require_once './model/User.php';
require_once './model/Post.php';
//require_once './model/prefix.php';

$site = Site::get();
//showprefix();
/**
 * 用户
 */

if ($_SESSION["user"]) {
    $user = User::getByName($_SESSION["user"]);
}


/**
 * 帖子
 */

$discussions = Post::getPage($page);

/**
 * 页码
 */
$pagination = array();

for ($i = -5; $i <= 5; $i++) {
    $id = $page + $i;
    if ($id >= 1) {
        $temp = array('id' => $id, 'url' => './?page=' . $id);
        array_push($pagination, $temp);
    }
}

$baseurl = '.';
$body = 'index.partial.php';

$page = array();

$page['body'] = array();
$page['body']['class'] = 'index';

$page['header'] = array();
$page['header']['title'] = $site->description;

?>

<?php require './template/layout.php' ?>

