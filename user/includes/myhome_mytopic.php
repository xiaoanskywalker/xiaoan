<div id="fundetail">
    <center><h4>我的帖子</h4></center>
    <div class="col-md-9" role="main">
    <!-- NAVI -->
        <ul class="nav nav-tabs" id="PageTab">
            <li class="active">
                <a href="#adminid" data-toggle="tab" onclick="$(&#39;#newid2&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#newid&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#adminid&#39;).css(&#39;display&#39;,&#39;&#39;);" aria-expanded="true">我的主题</a>
            </li>
            <li class="">
                <a href="#newid" data-toggle="tab" onclick="$(&#39;#newid&#39;).css(&#39;display&#39;,&#39;&#39;);$(&#39;#adminid&#39;).css(&#39;display&#39;,&#39;none&#39;);$(&#39;#newid2&#39;).css(&#39;display&#39;,&#39;none&#39;);" aria-expanded="false">我的回复</a></li>
        </ul><br>
    <!-- END NAVI -->
    <!-- PAGE1: ADMINID-->
    <div class="tab-pane fade active in" id="adminid">
        <table>
            <?php
            if(@$_SESSION["user"]==null){header("Location:../");}
            $user=$_SESSION["user"];
            $rs=mysql_query("SELECT * FROM wtb_titles WHERE users='$user'");
            while($row = mysql_fetch_row($rs)) {
                echo "<tr><td><a href='../showtopic.php?tid=$row[0]";
                echo"' target='_blank'>".substr($row[2],0,36)."</a></td></tr>";
            }
            ?>
        </table>
    </div>
    <!-- END PAGE1 -->
    <!-- PAGE2: NEWID -->
    <div class="tab-pane fade" id="newid" style="display: none;">
        <table>
            <?php
            $rs = mysql_query("SELECT * FROM wtb_reply WHERE user='$user'");
            while($row = mysql_fetch_row($rs)) 
            {
                echo "<tr><td><a href='../showtopic.php?tid=$row[1]";
                echo"' target='_blank'>".substr($row[3],0,50)."</a></td></tr>";
            }
            ?>
        </table>
    </div>
    <!-- END PAGE2 -->
</div>
</div>