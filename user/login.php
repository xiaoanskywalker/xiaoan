<?php
if ((file_exists("../common/config.php")) == false) {
    header("location:../install/");
}
session_start();
require_once '../common/conn.php';
$action = $_REQUEST["action"];
?>

<?php
/*
if ($action == "login") {
    //require_once "./includes/passport_login.php";
} elseif ($action == "register") {
    //require_once "./includes/passport_register.php";
} else {
    unset($_SESSION["user"]);
    header("location:../");
}
*/

require_once '../common/conn.php';
require_once '../model/Site.php';
require_once '../model/User.php';

$site = Site::get();

if ($_SESSION["user"]) {
    $user = User::getByName($_SESSION["user"]);
}


$baseurl = '..';
$body = 'login.partial.php';

$page = array();

$page['body'] = array();
$page['body']['class'] = 'login';

$page['header'] = array();
$page['header']['title'] = '登录，享受更多精彩!';

$page['sidebar'] = array();
$page['sidebar']['content'] = 'sidebar-login.php';

?>


<?php require '../template/layout.php'; ?>