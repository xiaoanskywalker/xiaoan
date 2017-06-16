<center><h4>我的帖子</h4></center>
<script language="JavaScript">
    function mytopic(){
        $('#newid2').css('display','none');
        $('#newid').css('display','none');
        $('#adminid').css('display','');
    }
    function myreply(){
        $('#newid').css('display','');
        $('#adminid').css('display','none');
        $('#newid2').css('display','none');
    }
</script>

<?php
$mytopic = Home::mytopic($user->name,$pge);
$myreply = Home::myreply($user->name,$pge);
//print_r($myreply);
?>
<div id="fundetail">
    <div class="col-md-9" role="main">
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="mytopic()" aria-expanded="true">我的主题</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="myreply()" aria-expanded="false">我的回复</a></li>
        </ul><br>
        <div class="tab-pane fade active in" id="adminid">
            <table class="table">
                <tr>
                    <td>帖子ID</td>
                    <td>帖子标题</td>
                    <td>帖子内容</td>
                    <td>发帖时间</td>
                    <td>帖子回复数</td>
                </tr>
                <?php
                foreach ($mytopic as $value){
                    require'myhome-topicpreview.php';
                }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="newid" style="display: none;">
            <table class="table">
                <tr>
                    <td>回复ID</td>
                    <td>主题帖ID</td>
                    <td>主题帖标题</td>
                    <td>回帖内容</td>
                    <td>发帖时间</td>
                </tr>
                <?php
                foreach ($myreply as $value){
                    require'myhome-replypreview.php';
                }
                ?>
            </table>
        </div>
        <?php require 'pagination.php';?>
    </div>
</div>

