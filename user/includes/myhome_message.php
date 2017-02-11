<style>
a img{border:none}
.testdiv *{
vertical-align:middle;
}
</style>
<div id="fundetail">
    <center><h4>我的消息</h4></center>
    <div class="col-md-9" role="main">
    <!-- NAVI -->
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="$(&#39;#newid2&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#newid&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#adminid&#39;).css(&#39;display&#39;,&#39;&#39;);" aria-expanded="true">回复我的</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="$(&#39;#newid&#39;).css(&#39;display&#39;,&#39;&#39;);$(&#39;#adminid&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#newid2&#39;).css(&#39;display&#39;,&#39;none&#39;);" aria-expanded="false">系统通知</a></li>
        </ul><br>
        <!-- END NAVI -->
        <!-- PAGE1: ADMINID-->
        <div class="tab-pane fade active in" id="adminid">
            <table class="table">
                <tr><td>用户</td><td>内容</td><td>时间</td></tr>
                <?php
                session_start();
                $user=@$_SESSION["user"];
                if(user==null){header("Location:../");}	
                $rs = mysql_query("SELECT * FROM wtb_messages WHERE getuser='$user' AND ifread=0 ORDER BY tid DESC");
                while($row = mysql_fetch_row($rs)){
                    $file = "../common/images/avatar/".$row[0].".png";
                    echo "<tr><td><div class='testdiv' ><img src='../common/images/avatar/";
                    if(file_exists($file)){echo $row[0];}
                    else{echo "default_avatar";}
                    echo(".png' height='50' width='50' /><b>");
	            echo $row[0]."</b></div></td><td><b><a href='../showtopic.php?tid=$row[5]";
                    echo"' target='_blank'>";
	            echo substr($row[2],0,50)."</a></b></td><td><b>".substr($row[4],5,11)."</b></td></tr>";
                }
                mysql_query("UPDATE wtb_messages SET ifread=1 WHERE ifread=0");
                $rs = mysql_query("SELECT * FROM wtb_messages WHERE getuser='$user' AND ifread=1 ORDER BY tid DESC");
                while($row = mysql_fetch_row($rs)){
                    $file = "../common/images/avatar/".$row[0].".png";
                    echo "<tr><td><div class='testdiv' ><img src='../common/images/avatar/";
                    if(file_exists($file)){echo $row[0];}
                    else{echo "default_avatar";}
                    echo(".png' height='50' width='50' />");
	            echo $row[0]."</div></td><td><a href='../showtopic.php?tid=$row[5]";
                    echo"' target='_blank'>";
	            echo substr($row[2],0,50)."</a></td><td>".substr($row[4],5,11)."</td></tr>";
                }
            ?>
            </table>
        </div>
        <div class="tab-pane fade" id="newid" style="display: none;">
            <table>
                
            </table>
        </div>
    </div>
</div>