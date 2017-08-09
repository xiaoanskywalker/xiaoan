<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.2
 * Author: Xiaoan
 * File: /template/partial/footer.php
 */
?>
<footer>
    <div class="copyright">
        Powered By <a href="http://xiaoanbbs.cn" target="_blank">Xiaoanbbs</a>&nbsp;V0<?= $page["version"] ?>
        <p>
            <?php
            if($user->admingp != 0){
                echo "<a href='admin' target='_blank'>管理中心</a>";
            }
            $etime = microtime(true);//程序执行结束的时间
            $total = $etime - $stime;   //计算差值
            ?>
            <!--
        页面执行时间：<?= round($total,3) ?>秒
        -->
    </div>

</footer>
