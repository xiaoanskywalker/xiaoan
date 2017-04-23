<footer>
    <div class="copyright">
        Powered By <a href="http://xiaoanbbs.cn" target="_blank">Xiaoanbbs</a>&nbsp;V0.3.2
        <p><?php
        $etime=microtime(true);//程序执行结束的时间
        $total=$etime-$stime;   //计算差值1
        ?>
        页面执行时间：<?= round($total,3) ?>秒
    </div>

</footer>
